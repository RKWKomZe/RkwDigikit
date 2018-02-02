<?php

namespace Bm\RkwDigiKit\Service;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2018 Bastian Behr <behr@bergisch-media.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
use Bm\RkwDigiKit\Domain\Model\Category;
use Bm\RkwDigiKit\Domain\Model\Page;
use Bm\RkwDigiKit\Domain\Repository\CategoryRepository;
use Bm\RkwDigiKit\Domain\Repository\PageRepository;
use Bm\RkwDigiKit\Utility\CachingUtility;
use Bm\RkwDigiKit\Utility\StandaloneViewUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;

/**
 * Class StructureService
 * @package Bm\RkwDigiKit\Service
 */
class StructureService extends AbstractService
{
    const CACHING_KEY = 'rkwdigikit';

    /**
     * @var CategoryRepository|null|object
     */
    protected $categoryRepository = null;

    /**
     * @var PageRepository|null|object
     */
    protected $pageRepository = null;

    /**
     * @var StandaloneViewUtility|null|object
     */
    protected $standaloneViewUtility = null;

    /**
     * @var CachingUtility|null|object
     */
    protected $cachingUtility = null;

    /**
     * @var array
     */
    protected $output = [
        'models' => [],
        'mechanisms' => [],
        'tasks' => [],
        'instances' => [],
        'status' => false
    ];

    /**
     * @var array
     */
    protected $modelIds = [];

    /**
     * @var array
     */
    protected $mechanismIds = [];

    /**
     * StructureService constructor.
     */
    public function __construct()
    {
        parent::__construct();
        /** @var CategoryRepository categoryRepository */
        $this->categoryRepository = $this->objectManager->get(CategoryRepository::class);
        /** @var PageRepository pageRepository */
        $this->pageRepository = $this->objectManager->get(PageRepository::class);
        /** @var StandaloneViewUtility standaloneViewUtility */
        $this->standaloneViewUtility = $this->objectManager->get(StandaloneViewUtility::class);
        /** @var CachingUtility cachingUtility */
        $this->cachingUtility = $this->objectManager->get(CachingUtility::class, self::CACHING_KEY);
    }

    /**
     * Return JSON output for RKW Vue DigiKit application
     *
     * @return string
     */
    public function getJsonOutput()
    {
//        $cache = $this->cachingUtility->loadCache([self::CACHING_KEY]);
//
//        if (!$cache) {
            /** @var QueryResult $categories */
            $categories = $this->categoryRepository->findChildrenByParentId($this->settings['navigation']['rootCategoryId']);

            if (!empty($categories->toArray())) {

                self::createModels($categories);

                if (!empty($this->modelIds)) {
                    self::createMechanisms();
                }

                if (!empty($this->mechanismIds)) {
                    self::createTasks();
                }

                if (!empty($this->output['tasks'])) {
                    self::renderContent();
                }

                $this->output['status'] = true;

                if (!empty($this->output)) {
                    $this->cachingUtility->cache([self::CACHING_KEY], $this->output);
                }

                return json_encode($this->output);
            }

            return json_encode($this->output);
//        } else {
//            return json_encode($cache['data']);
//        }
    }

    /**
     * @param QueryResult $models
     */
    private function createModels(QueryResult $models)
    {
        /** @var Category $model */
        foreach ($models as $model) {
            array_push($this->modelIds, $model->getUid());
            $this->output['models']['uid'.$model->getUid()] = $model->getModelInformation();
        }
    }

    /**
     * Fill mechanisms array with data from categories tree
     */
    private function createMechanisms()
    {
        foreach ($this->modelIds as $modelId) {
            $mechanisms = $this->categoryRepository->findChildrenByParentId($modelId);

            /** @var Category $mechanism */
            foreach ($mechanisms as $mechanism) {
                $uid = $mechanism->getUid();

                $this->output['models']['uid'.$modelId]['mechanisms'][] = $uid;

                array_push($this->mechanismIds, $uid);

                $this->output['mechanisms'][$uid] = $mechanism->getMechanismInformation();
            }

            array_flip($this->output['models']['uid'.$modelId]['mechanisms']);
        }
    }

    /**
     * Fill tasks array with data from categories tree
     */
    private function createTasks()
    {
        foreach ($this->mechanismIds as $mechanismId) {
            $tasks = $this->categoryRepository->findChildrenByParentId($mechanismId);

            /** @var Category $task */
            foreach ($tasks as $task) {
                $uid = $task->getUid();

                $this->output['mechanisms'][$mechanismId]['tasks'][] = $uid;

                $this->output['tasks'][$uid] = $task->getTaskInformation();
            }

            array_flip($this->output['mechanisms'][$mechanismId]['tasks']);
        }
    }

    /**
     * Render Page Content for each Task
     */
    private function renderContent()
    {
        /** @var QueryResult $pages */
        $pages = $this->pageRepository->findByDoktype();
        if (!empty($pages->toArray())) {
            $taskIds = [];

            /** @var Page $page */
            foreach ($pages as $page) {
                $this->output['instances'][$page->getUid()] = [
                    'content' => $page->getDigiKitCompanyInformation(),
                    'metaContent' => $page->getDigiKitMetaInformation(),
                    'sliderImages' => $page->getDigiKitImages(),
                    'links' => $page->getDigiKitLinks(),
                    'downloads' => $page->getDigiKitDownloads()
                ];

                $taskId = $page->getDigikitCategory()->getUid();
                array_push($this->output['tasks'][$taskId]['instances'], $page->getUid());
                array_push($taskIds, $taskId);
            }

            foreach ($taskIds as $taskId) {
                array_flip($this->output['tasks'][$taskId]['instances']);
            }
        }
    }
}