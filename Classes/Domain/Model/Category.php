<?php

namespace Bm\RkwDigiKit\Domain\Model;

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
     * @return int
     */
    public function getUid(): int
    {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDigikitLevelOneTitleOverride(): string
    {
        return $this->digikitLevelOneTitleOverride;
    }

    /**
     * @param string $digikitLevelOneTitleOverride
     */
    public function setDigikitLevelOneTitleOverride(string $digikitLevelOneTitleOverride): void
    {
        $this->digikitLevelOneTitleOverride = $digikitLevelOneTitleOverride;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getDigikitLevelOneImage(): \TYPO3\CMS\Extbase\Domain\Model\FileReference
    {
        return $this->digikitLevelOneImage;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $digikitLevelOneImage
     */
    public function setDigikitLevelOneImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $digikitLevelOneImage): void
    {
        $this->digikitLevelOneImage = $digikitLevelOneImage;
    }

    /**
     * @return string
     */
    public function getDigikitLevelOneSettings(): string
    {
        return $this->digikitLevelOneSettings;
    }

    /**
     * @param string $digikitLevelOneSettings
     */
    public function setDigikitLevelOneSettings(string $digikitLevelOneSettings): void
    {
        $this->digikitLevelOneSettings = $digikitLevelOneSettings;
    }

    /**
     * @return string
     */
    public function getDigikitLevelTwoTitleOverride(): string
    {
        return $this->digikitLevelTwoTitleOverride;
    }

    /**
     * @param string $digikitLevelTwoTitleOverride
     */
    public function setDigikitLevelTwoTitleOverride(string $digikitLevelTwoTitleOverride): void
    {
        $this->digikitLevelTwoTitleOverride = $digikitLevelTwoTitleOverride;
    }

    /**
     * @return string
     */
    public function getDigikitLevelTwoPosition(): string
    {
        return $this->digikitLevelTwoPosition;
    }

    /**
     * @param string $digikitLevelTwoPosition
     */
    public function setDigikitLevelTwoPosition(string $digikitLevelTwoPosition): void
    {
        $this->digikitLevelTwoPosition = $digikitLevelTwoPosition;
    }

    /**
     * @return string
     */
    public function getDigikitLevelThreeTitleOverride(): string
    {
        return $this->digikitLevelThreeTitleOverride;
    }

    /**
     * @param string $digikitLevelThreeTitleOverride
     */
    public function setDigikitLevelThreeTitleOverride(string $digikitLevelThreeTitleOverride): void
    {
        $this->digikitLevelThreeTitleOverride = $digikitLevelThreeTitleOverride;
    }

    /**
     * @return string
     */
    public function getDigikitLevelThreePosition(): string
    {
        return $this->digikitLevelThreePosition;
    }

    /**
     * @param string $digikitLevelThreePosition
     */
    public function setDigikitLevelThreePosition(string $digikitLevelThreePosition): void
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
    public function setDigikitInfoImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $digikitInfoImage): void
    {
        $this->digikitInfoImage = $digikitInfoImage;
    }

    /**
     * @return string
     */
    public function getDigikitInfoTitle(): string
    {
        return $this->digikitInfoTitle;
    }

    /**
     * @param string $digikitInfoTitle
     */
    public function setDigikitInfoTitle(string $digikitInfoTitle): void
    {
        $this->digikitInfoTitle = $digikitInfoTitle;
    }

    /**
     * @return string
     */
    public function getDigikitInfoText(): string
    {
        return $this->digikitInfoText;
    }

    /**
     * @param string $digikitInfoText
     */
    public function setDigikitInfoText(string $digikitInfoText): void
    {
        $this->digikitInfoText = $digikitInfoText;
    }
}