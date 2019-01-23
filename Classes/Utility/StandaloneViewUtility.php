<?php

namespace Bm\RkwDigiKit\Utility;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2019 Bastian Behr <digital@dcc.ruhr>
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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Class StandaloneViewUtility
 * @package Bm\RkwDigiKit\Utility
 */
class StandaloneViewUtility extends AbstractUtility
{
    /**
     * @var null|object|StandaloneView
     */
    protected $standaloneView = null;

    /**
     * StandaloneViewUtility constructor.
     */
    public function __construct()
    {
        parent::__construct();
        /** @var StandaloneView standaloneView */
        $this->standaloneView = $this->objectManager->get(StandaloneView::class);
    }

    /**
     * Create a StandaloneView with Extension Configuration
     * to render Content
     *
     * @param string $extKey
     * @param string $templateName
     * @param string $templateFolder
     * @param string $fileExtension
     *
     * @return bool|null|object|StandaloneView
     */
    public function createStandaloneView(
        string $extKey,
        string $templateName,
        string $templateFolder,
        string $fileExtension = 'html'
    ) {
        $settings = $this->getExtensionConfiguration($extKey);

        $templateRootPaths = $settings['view']['templateRootPaths'];
        krsort($templateRootPaths);

        $partialRootPaths = $settings['view']['partialRootPaths'];
        krsort($partialRootPaths);

        $layoutRootPaths = $settings['view']['layoutRootPaths'];
        krsort($layoutRootPaths);

        $templatePathAndFilename = '';

        foreach ($templateRootPaths as $templateRootPath) {
            $path = GeneralUtility::getFileAbsFileName($templateRootPath);
            $pathAndFilename = $path . $templateFolder . '/' . $templateName . '.' . $fileExtension;
            if (file_exists($pathAndFilename)) {
                $templatePathAndFilename = $pathAndFilename;
                break;
            }
        }

        if ($templatePathAndFilename !== '') {
            $this->standaloneView->setFormat($fileExtension);
            $this->standaloneView->setPartialRootPaths($partialRootPaths);
            $this->standaloneView->setLayoutRootPaths($layoutRootPaths);
            $this->standaloneView->setTemplatePathAndFilename($templatePathAndFilename);

            return $this->standaloneView;
        }

        return false;
    }
}