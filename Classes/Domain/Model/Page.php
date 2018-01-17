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
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Page
 * @package Bm\RkwDigiKit\Domain\Model
 */
class Page extends AbstractEntity
{
    const DIGI_KIT_TYPE = 130;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $digikitSliderImages = null;

    /**
     * @var string
     */
    protected $digikitMainHeader = '';

    /**
     * @var string
     */
    protected $digikitMainSubheader = '';

    /**
     * @var string
     */
    protected $digikitMainTeaser = '';

    /**
     * @var string
     */
    protected $digikitMainText = '';

    /**
     * @var string
     */
    protected $digikitMetaCompany = '';

    /**
     * @var string
     */
    protected $digikitMetaBusiness = '';

    /**
     * @var string
     */
    protected $digikitMetaEmployee = '';

    /**
     * @var string
     */
    protected $digikitMetaPlace = '';

    /**
     * @var string
     */
    protected $digikitMetaWebsite = '';

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $digikitMetaMap = null;

    /**
     * @var \Bm\RkwDigiKit\Domain\Model\Category
     */
    protected $digikitCategory;

    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->digikitSliderImages = new ObjectStorage();
    }

    /**
     * @return ObjectStorage
     */
    public function getDigikitSliderImages(): ObjectStorage
    {
        return $this->digikitSliderImages;
    }

    /**
     * @param ObjectStorage $digikitSliderImages
     */
    public function setDigikitSliderImages(ObjectStorage $digikitSliderImages): void
    {
        $this->digikitSliderImages = $digikitSliderImages;
    }

    /**
     * @param FileReference $imageToAdd
     */
    public function addDigikitSliderImage(FileReference $imageToAdd): void
    {
        $this->digikitSliderImages->attach($imageToAdd);
    }

    /**
     * @param FileReference $imageToRemove
     */
    public function removeDigikitSliderImage(FileReference $imageToRemove): void
    {
        $this->digikitSliderImages->detach($imageToRemove);
    }

    /**
     * @return string
     */
    public function getDigikitMainHeader(): string
    {
        return $this->digikitMainHeader;
    }

    /**
     * @param string $digikitMainHeader
     */
    public function setDigikitMainHeader(string $digikitMainHeader): void
    {
        $this->digikitMainHeader = $digikitMainHeader;
    }

    /**
     * @return string
     */
    public function getDigikitMainSubheader(): string
    {
        return $this->digikitMainSubheader;
    }

    /**
     * @param string $digikitMainSubheader
     */
    public function setDigikitMainSubheader(string $digikitMainSubheader): void
    {
        $this->digikitMainSubheader = $digikitMainSubheader;
    }

    /**
     * @return string
     */
    public function getDigikitMainTeaser(): string
    {
        return $this->digikitMainTeaser;
    }

    /**
     * @param string $digikitMainTeaser
     */
    public function setDigikitMainTeaser(string $digikitMainTeaser): void
    {
        $this->digikitMainTeaser = $digikitMainTeaser;
    }

    /**
     * @return string
     */
    public function getDigikitMainText(): string
    {
        return $this->digikitMainText;
    }

    /**
     * @param string $digikitMainText
     */
    public function setDigikitMainText(string $digikitMainText): void
    {
        $this->digikitMainText = $digikitMainText;
    }

    /**
     * @return string
     */
    public function getDigikitMetaCompany(): string
    {
        return $this->digikitMetaCompany;
    }

    /**
     * @param string $digikitMetaCompany
     */
    public function setDigikitMetaCompany(string $digikitMetaCompany): void
    {
        $this->digikitMetaCompany = $digikitMetaCompany;
    }

    /**
     * @return string
     */
    public function getDigikitMetaBusiness(): string
    {
        return $this->digikitMetaBusiness;
    }

    /**
     * @param string $digikitMetaBusiness
     */
    public function setDigikitMetaBusiness(string $digikitMetaBusiness): void
    {
        $this->digikitMetaBusiness = $digikitMetaBusiness;
    }

    /**
     * @return string
     */
    public function getDigikitMetaEmployee(): string
    {
        return $this->digikitMetaEmployee;
    }

    /**
     * @param string $digikitMetaEmployee
     */
    public function setDigikitMetaEmployee(string $digikitMetaEmployee): void
    {
        $this->digikitMetaEmployee = $digikitMetaEmployee;
    }

    /**
     * @return string
     */
    public function getDigikitMetaPlace(): string
    {
        return $this->digikitMetaPlace;
    }

    /**
     * @param string $digikitMetaPlace
     */
    public function setDigikitMetaPlace(string $digikitMetaPlace): void
    {
        $this->digikitMetaPlace = $digikitMetaPlace;
    }

    /**
     * @return string
     */
    public function getDigikitMetaWebsite(): string
    {
        return $this->digikitMetaWebsite;
    }

    /**
     * @param string $digikitMetaWebsite
     */
    public function setDigikitMetaWebsite(string $digikitMetaWebsite): void
    {
        $this->digikitMetaWebsite = $digikitMetaWebsite;
    }

    /**
     * @return FileReference
     */
    public function getDigikitMetaMap(): FileReference
    {
        return $this->digikitMetaMap;
    }

    /**
     * @param FileReference $digikitMetaMap
     */
    public function setDigikitMetaMap(FileReference $digikitMetaMap): void
    {
        $this->digikitMetaMap = $digikitMetaMap;
    }

    /**
     * @return Category
     */
    public function getDigikitCategory(): Category
    {
        return $this->digikitCategory;
    }

    /**
     * @param Category $digikitCategory
     */
    public function setDigikitCategory(Category $digikitCategory): void
    {
        $this->digikitCategory = $digikitCategory;
    }

    /**
     * @return array
     */
    public function getDigiKitCompanyInformation(): array
    {
        return [
            'header' => $this->digikitMainHeader,
            'subheader' => $this->digikitMainSubheader,
            'teaser' => $this->digikitMainTeaser,
            'text' => $this->digikitMainText
        ];
    }

    /**
     * @return array
     */
    public function getDigiKitMetaInformation(): array
    {
        return [
            'company' => $this->digikitMetaCompany,
            'business' => $this->digikitMetaBusiness,
            'employee' => $this->digikitMetaEmployee,
            'place' => $this->digikitMetaPlace,
            'website' => $this->digikitMetaWebsite
        ];
    }
}