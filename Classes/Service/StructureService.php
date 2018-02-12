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
use Bm\RkwDigiKit\Domain\Model\Contact;
use Bm\RkwDigiKit\Domain\Model\Page;
use Bm\RkwDigiKit\Domain\Repository\CategoryRepository;
use Bm\RkwDigiKit\Domain\Repository\ContactRepository;
use Bm\RkwDigiKit\Domain\Repository\PageRepository;
use Bm\RkwDigiKit\Utility\CachingUtility;
use Bm\RkwDigiKit\Utility\StandaloneViewUtility;
use TYPO3\CMS\Core\Imaging\ImageManipulation\CropVariantCollection;
use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\QueryResult;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Service\ImageService;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class StructureService
 * @package Bm\RkwDigiKit\Service
 */
class StructureService extends AbstractService
{
    const CACHING_KEY = 'rkwdigikit';

    static $state = [
        'BW' => 'Baden-Württemberg',
        'BY' => 'Bayern',
        'BE' => 'Berlin',
        'BB' => 'Brandenburg',
        'HB' => 'Bremen',
        'HH' => 'Hamburg',
        'HE' => 'Hessen',
        'MV' => 'Mecklenburg-Vorpommern',
        'NI' => 'Niedersachsen',
        'NW' => 'Nordrhein-Westfalen',
        'RP' => 'Rheinland-Pfalz',
        'SL' => 'Saarland',
        'SN' => 'Sachsen',
        'ST' => 'Sachsen-Anhalt',
        'SH' => 'Schleswig-Holstein',
        'TH' => 'Thüringen'
    ];

    /**
     * @var CategoryRepository|null|object
     */
    protected $categoryRepository = null;

    /**
     * @var PageRepository|null|object
     */
    protected $pageRepository = null;

    /**
     * @var ContactRepository|null|object
     */
    protected $contactRepository = null;

    /**
     * @var StandaloneViewUtility|null|object
     */
    protected $standaloneViewUtility = null;

    /**
     * @var null|object|ImageService
     */
    protected $imageService = null;

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
        'contacts' => [
            'filtered' => [],
            'global' => [],
            'filter' => []
        ],
        'footer' => [],
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
     * @var bool
     */
    protected $debugMode = false;

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
        /** @var ContactRepository contactRepository */
        $this->contactRepository = $this->objectManager->get(ContactRepository::class);
        /** @var StandaloneViewUtility standaloneViewUtility */
        $this->standaloneViewUtility = $this->objectManager->get(StandaloneViewUtility::class);
        /** @var CachingUtility cachingUtility */
        $this->cachingUtility = $this->objectManager->get(CachingUtility::class, self::CACHING_KEY);
        /** @var ImageService imageService */
        $this->imageService = $this->objectManager->get(ImageService::class);
        // Debug Mode
        $this->debugMode = (GeneralUtility::_GP('debugmode') === 'true') ? GeneralUtility::_GP('debugmode') : false;
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

            $this->createModels($categories);

            if (!empty($this->modelIds)) {
                $this->createMechanisms();
            }

            if (!empty($this->mechanismIds)) {
                $this->createTasks();
            }

            if (!empty($this->output['tasks'])) {
                $this->createContent();
            }

            $this->createContacts();

            $this->createFooterLinks();

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
            $this->output['models']['uid' . $model->getUid()] = $model->getModelInformation();
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

                $this->output['models']['uid' . $modelId]['mechanisms'][] = $uid;

                array_push($this->mechanismIds, $uid);

                $this->output['mechanisms'][$uid] = $mechanism->getMechanismInformation();
            }

            array_flip($this->output['models']['uid' . $modelId]['mechanisms']);
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
    private function createContent()
    {
        /** @var QueryResult $pages */
        $pages = $this->pageRepository->findByDoktype();
        if (!empty($pages->toArray())) {
            $taskIds = [];

            /** @var Page $page */
            foreach ($pages as $page) {
                $parent = ($page->getDigikitCategory() instanceof Category) ? $page->getDigikitCategory()->getUid() : false;

                $this->output['instances'][$page->getUid()] = [
                    'content' => $page->getDigiKitCompanyInformation(),
                    'metaContent' => $page->getDigiKitMetaInformation(),
                    'sliderImages' => $this->createImages($page->getDigikitSliderImages()),
                    'links' => $this->createLinks($page->getDigiKitLinks()),
                    'downloads' => $this->createDownloads($page->getDigikitDownloads()),
                    'videos' => $this->createVideos($page->getDigikitVideos()),
                    'parent' => $parent
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

    /**
     * Fill Image array
     * @param $images
     * @return array|bool
     */
    private function createImages($images)
    {
        $array = [];

        /** @var \TYPO3\CMS\Extbase\Domain\Model\FileReference $image */
        foreach ($images as $image) {
            $resource = $image->getOriginalResource();
            $properties = $resource->getProperties();
            $resourceFile = $resource->getOriginalFile();

            $cropVariants = CropVariantCollection::create((string)$properties['crop']);
            $default = $cropVariants->getCropArea('default');
            $quadrat = $cropVariants->getCropArea('quadrat');

            $processingInstructionsDefault = [
                'width' => '1280',
                'height' => '720',
                'crop' => $default->makeAbsoluteBasedOnFile($resourceFile)
            ];

            $processingInstructionsQuadrat = [
                'width' => '400c',
                'height' => '400c',
                'crop' => $quadrat->makeAbsoluteBasedOnFile($resourceFile)
            ];

            $processedImageDefault = $this->imageService->applyProcessingInstructions($resourceFile,
                $processingInstructionsDefault);
            $processedImageQuadrat = $this->imageService->applyProcessingInstructions($resourceFile,
                $processingInstructionsQuadrat);

            array_push($array, [
                0 => $this->imageService->getImageUri($processedImageDefault, false),
                1 => $this->imageService->getImageUri($processedImageQuadrat, false)
            ]);
        }

        if (!empty($array)) {
            return $array;
        }

        return false;
    }

    /**
     * Fill contact array with data
     */
    private function createContacts()
    {
        /** @var QueryResult $contacts */
        $contactsResult = $this->contactRepository->findAllContactByStorage($this->settings['contact']['storage']);

        if (!empty($contactsResult->toArray())) {
            /** @var Contact $contact */
            foreach ($contactsResult as $contact) {

                $result = [
                    'for' => $contact->getFor(),
                    'forFull' => ($contact->isGlobal()) ? '' : self::$state[$contact->getFor()],
                    'name' => $contact->getName(),
                    'street' => $contact->getStreet(),
                    'city' => $contact->getCity(),
                    'phone' => $contact->getPhone(),
                    'email' => $contact->getEmail(),
                    'function' => $contact->getFunction()
                ];

                if ($contact->isGlobal()) {
                    array_push($this->output['contacts']['global'], $result);
                } else {
                    array_push($this->output['contacts']['filtered'], $result);
                }
            }

            array_push($this->output['contacts']['filter'], self::$state);
        }
    }

    /**
     * @param ObjectStorage $downloads
     * @return bool|array
     */
    private function createDownloads(ObjectStorage $downloads)
    {
        if (!empty($downloads->toArray())) {
            $array = [];

            /** @var \TYPO3\CMS\Extbase\Domain\Model\FileReference $download */
            foreach ($downloads as $download) {
                /** @var FileReference $resource */
                $resource = $download->getOriginalResource();

                $downloadTitle = ($resource->getTitle() !== '') ? $resource->getTitle() : $resource->getName();

                array_push($array, [0 => $downloadTitle, 1 => $resource->getPublicUrl()]);
            }

            if (!empty($array)) {
                return $array;
            }
        }
        return false;
    }

    /**
     * @param ObjectStorage $videos
     * @return array|bool
     */
    private function createVideos(ObjectStorage $videos)
    {
        if (!empty($videos->toArray())) {
            $array = [];

            /** @var \Bm\RkwDigiKit\Domain\Model\FileReference $video */
            foreach ($videos as $video) {
                /** @var FileReference $resource */
                $resource = $video->getOriginalResource();

                $embed = $resource->getPublicUrl();

                if ($resource->getExtension() === 'youtube') {
                    if (!strpos($embed, 'embed')) {
                        $mediaId = substr($embed, strpos($embed, '?v=') + 3, strlen($embed));
                        $embed = 'https://www.youtube.com/embed/' . $mediaId;
                    }

                }
                array_push($array,
                    ['flag' => $resource->getExtension(), 'embed' => $embed, 'url' => $resource->getPublicUrl()]);
            }

            if (!empty($array)) {
                return $array;
            }
        }
        return false;
    }

    /**
     * Clean Links
     *
     * @param array $links
     * @return bool|array
     */
    private function createLinks($links)
    {
        if (!empty($links) && $GLOBALS['TSFE']->cObj instanceof ContentObjectRenderer) {
            $cObj = $GLOBALS['TSFE']->cObj;

            foreach ($links as $key => $link) {
                $typoLink = $cObj->typoLink($link['title'], [
                    'parameter' => $link['url'],
                    'returnLast' => 'url'
                ]);

                $links[$key]['url'] = $typoLink;
            }
            return $links;
        }
        return false;
    }

    /**
     * Fill footer array with data
     */
    private function createFooterLinks()
    {
        foreach ($this->settings['footerLinks'] as $key => $value) {
            $input = [
                0 => LocalizationUtility::translate('digikit.'.$key,'rkwDigiKit'),
                1 => $value
            ];

            array_push($this->output['footer'],$input);
        }
    }

    /**
     * @param $var
     * @param string $title
     */
    private function debugMode($var, $title = __METHOD__)
    {
        if ($this->debugMode) {
            DebuggerUtility::var_dump($var, $title);
        }
    }
}