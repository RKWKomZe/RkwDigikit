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
use Bm\RkwDigiKit\Domain\Repository\CategoryRepository;
use Bm\RkwDigiKit\Utility\CachingUtility;
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
        /** @var CachingUtility cachingUtility */
        $this->cachingUtility = $this->objectManager->get(CachingUtility::class,self::CACHING_KEY);
    }

    public function getJsonOutput()
    {
        $cache = $this->cachingUtility->loadCache([self::CACHING_KEY]);

        if (!$cache) {
            /** @var QueryResult $categories */
            $categories = $this->categoryRepository->findChildrenByParentId($this->settings['navigation']['rootCategoryId']);

            if (!empty($categories->toArray())) {

                self::fillModels($categories);

                if (!empty($this->modelIds)) {
                    self::fillMechanisms();
                }

                if (!empty($this->mechanismIds)) {
                    self::fillTasks();
                }

                $this->output['status'] = true;

                if (!empty($this->output)) {
                    $this->cachingUtility->cache([self::CACHING_KEY],$this->output);
                }

                return json_encode($this->output);
            }

            return json_encode($this->output);
        } else {
            return json_encode($cache['data']);
        }
    }

    /**
     * @param QueryResult $models
     */
    private function fillModels(QueryResult $models)
    {
        /** @var Category $model */
        foreach ($models as $model) {
            $modelSettings = explode(';', $model->getDigikitLevelOneSettings());

            $uid = $model->getUid();

            $array = [
                'id' => $uid,
                'title' => $model->getTitle(),
                'overrideTitle' => $model->getDigikitLevelOneTitleOverride(),
                'color' => $modelSettings[0],
                'order' => $modelSettings[1],
                'category' => $modelSettings[2],
                'position' => $modelSettings[3],
                'mechanisms' => []
            ];

            array_push($this->modelIds, $uid);

            $this->output['models'][$uid] = $array;
        }
    }

    /**
     * Fill mechanisms array with data from categories tree
     */
    private function fillMechanisms()
    {
        foreach ($this->modelIds as $modelId) {
            $mechanisms = $this->categoryRepository->findChildrenByParentId($modelId);

            /** @var Category $mechanism */
            foreach ($mechanisms as $mechanism) {
                $uid = $mechanism->getUid();

                $array = [
                    'id' => $uid,
                    'title' => $mechanism->getTitle(),
                    'overrideTitle' => $mechanism->getDigikitLevelTwoTitleOverride(),
                    'position' => $mechanism->getDigikitLevelTwoPosition(),
                    'tasks' => []
                ];

                $this->output['models'][$modelId]['mechanisms'][] = $uid;

                array_push($this->mechanismIds,$uid);

                $this->output['mechanisms'][$uid] = $array;
            }

            array_flip($this->output['models'][$modelId]['mechanisms']);
        }
    }

    /**
     * Fill tasks array with data from categories tree
     */
    private function fillTasks()
    {
        foreach ($this->mechanismIds as $mechanismId) {
            $tasks = $this->categoryRepository->findChildrenByParentId($mechanismId);

            /** @var Category $task */
            foreach ($tasks as $task) {
                $uid = $task->getUid();

                $array = [
                    'id' => $uid,
                    'title' => $task->getTitle(),
                    'overrideTitle' => $task->getDigikitLevelThreeTitleOverride(),
                    'position' => $task->getDigikitLevelThreePosition(),
                    'instances' => []
                ];

                $this->output['mechanisms'][$mechanismId]['tasks'][] = $uid;

                $this->output['tasks'][$uid] = $array;
            }

            array_flip($this->output['mechanisms'][$mechanismId]['tasks']);
        }
    }
}