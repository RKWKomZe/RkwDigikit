<?php

namespace Bm\RkwDigiKit\Domain\Model;

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

/**
 * Class Category
 * @package Bm\RkwDigiKit\Domain\Model
 */
class Category extends \TYPO3\CMS\Extbase\Domain\Model\Category
{
    /**
     * @var string
     */
    protected $digikitLevelOneTitleOverride = '';

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $digikitLevelOneImage = null;

    /**
     * @var string
     */
    protected $digikitLevelOneSettings = '';

    /**
     * @var string
     */
    protected $digikitLevelTwoTitleOverride = '';

    /**
     * @var string
     */
    protected $digikitLevelTwoPosition = '';

    /**
     * @var string
     */
    protected $digikitLevelThreeTitleOverride = '';

    /**
     * @var string
     */
    protected $digikitLevelThreePosition = '';

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $digikitInfoImage = null;

    /**
     * @var string
     */
    protected $digikitInfoTitle = '';

    /**
     * @var string
     */
    protected $digikitInfoText = '';

    /**
     * @var int
     */
    protected $sorting = 0;

    /**
     * @return int
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @return int
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDigikitLevelOneTitleOverride()
    {
        return $this->digikitLevelOneTitleOverride;
    }

    /**
     * @param string $digikitLevelOneTitleOverride
     */
    public function setDigikitLevelOneTitleOverride(string $digikitLevelOneTitleOverride)
    {
        $this->digikitLevelOneTitleOverride = $digikitLevelOneTitleOverride;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getDigikitLevelOneImage()
    {
        return $this->digikitLevelOneImage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $digikitLevelOneImage
     */
    public function setDigikitLevelOneImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $digikitLevelOneImage)
    {
        $this->digikitLevelOneImage = $digikitLevelOneImage;
    }

    /**
     * @return string
     */
    public function getDigikitLevelOneSettings()
    {
        return $this->digikitLevelOneSettings;
    }

    /**
     * @param string $digikitLevelOneSettings
     */
    public function setDigikitLevelOneSettings(string $digikitLevelOneSettings)
    {
        $this->digikitLevelOneSettings = $digikitLevelOneSettings;
    }

    /**
     * @return string
     */
    public function getDigikitLevelTwoTitleOverride()
    {
        return $this->digikitLevelTwoTitleOverride;
    }

    /**
     * @param string $digikitLevelTwoTitleOverride
     */
    public function setDigikitLevelTwoTitleOverride(string $digikitLevelTwoTitleOverride)
    {
        $this->digikitLevelTwoTitleOverride = $digikitLevelTwoTitleOverride;
    }

    /**
     * @return string
     */
    public function getDigikitLevelTwoPosition()
    {
        return $this->digikitLevelTwoPosition;
    }

    /**
     * @param string $digikitLevelTwoPosition
     */
    public function setDigikitLevelTwoPosition(string $digikitLevelTwoPosition)
    {
        $this->digikitLevelTwoPosition = $digikitLevelTwoPosition;
    }

    /**
     * @return string
     */
    public function getDigikitLevelThreeTitleOverride()
    {
        return $this->digikitLevelThreeTitleOverride;
    }

    /**
     * @param string $digikitLevelThreeTitleOverride
     */
    public function setDigikitLevelThreeTitleOverride(string $digikitLevelThreeTitleOverride)
    {
        $this->digikitLevelThreeTitleOverride = $digikitLevelThreeTitleOverride;
    }

    /**
     * @return string
     */
    public function getDigikitLevelThreePosition()
    {
        return $this->digikitLevelThreePosition;
    }

    /**
     * @param string $digikitLevelThreePosition
     */
    public function setDigikitLevelThreePosition(string $digikitLevelThreePosition)
    {
        $this->digikitLevelThreePosition = $digikitLevelThreePosition;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getDigikitInfoImage(): \TYPO3\CMS\Extbase\Domain\Model\FileReference
    {
        return $this->digikitInfoImage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $digikitInfoImage
     */
    public function setDigikitInfoImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $digikitInfoImage)
    {
        $this->digikitInfoImage = $digikitInfoImage;
    }

    /**
     * @return string
     */
    public function getDigikitInfoTitle()
    {
        return $this->digikitInfoTitle;
    }

    /**
     * @param string $digikitInfoTitle
     */
    public function setDigikitInfoTitle(string $digikitInfoTitle)
    {
        $this->digikitInfoTitle = $digikitInfoTitle;
    }

    /**
     * @return string
     */
    public function getDigikitInfoText()
    {
        return $this->digikitInfoText;
    }

    /**
     * @param string $digikitInfoText
     */
    public function setDigikitInfoText(string $digikitInfoText)
    {
        $this->digikitInfoText = $digikitInfoText;
    }

    /**
     * Summarized properties
     *
     * @return array
     */
    public function getModelInformation()
    {
        $modelSettings = explode(';', $this->digikitLevelOneSettings);
        $image = ($this->digikitLevelOneImage) ? $this->digikitLevelOneImage->getOriginalResource()->getPublicUrl() : false;

        return [
            'sorting' => $this->sorting,
            'id' => $this->uid,
            'title' => $this->title,
            'overrideTitle' => $this->digikitLevelOneTitleOverride,
            'color' => $modelSettings[0],
            'order' => $modelSettings[1],
            'category' => $modelSettings[2],
            'position' => $modelSettings[3],
            'image' => $image,
            'parent' => $this->parent->getUid(),
            'mechanisms' => []
        ];
    }

    /**
     * Summarized properties
     *
     * @return array
     */
    public function getMechanismInformation()
    {
        return [
            'id' => $this->uid,
            'title' => $this->title,
            'overrideTitle' => $this->digikitLevelTwoTitleOverride,
            'position' => $this->digikitLevelTwoPosition,
            'parent' => $this->parent->getUid(),
            'tasks' => []
        ];
    }

    /**
     * Summarized properties
     *
     * @return array
     */
    public function getTaskInformation()
    {
        $image = ($this->digikitInfoImage) ? $this->digikitInfoImage->getOriginalResource()->getPublicUrl() : false;

        return [
            'id' => $this->uid,
            'title' => $this->title,
            'overrideTitle' => $this->digikitLevelThreeTitleOverride,
            'position' => $this->digikitLevelThreePosition,
            'infoTitle' => $this->digikitInfoTitle,
            'infoText' => $this->digikitInfoText,
            'infoImage' => $image,
            'parent' => $this->parent->getUid(),
            'instances' => []
        ];
    }
}