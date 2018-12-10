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
    const DIGI_KIT_DOKTYPE = 130;

    /**
     * @var int
     */
    protected $doktype = 0;

    /**
     * @var int
     */
    protected $tstamp;

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
     * @var string
     */
    protected $digikitLinkOneTitle = '';

    /**
     * @var string
     */
    protected $digikitLinkTwoTitle = '';

    /**
     * @var string
     */
    protected $digikitLinkThreeTitle = '';

    /**
     * @var string
     */
    protected $digikitLinkFourTitle = '';

    /**
     * @var string
     */
    protected $digikitLinkFiveTitle = '';

    /**
     * @var string
     */
    protected $digikitLinkOne = '';

    /**
     * @var string
     */
    protected $digikitLinkTwo = '';

    /**
     * @var string
     */
    protected $digikitLinkThree = '';

    /**
     * @var string
     */
    protected $digikitLinkFour = '';

    /**
     * @var string
     */
    protected $digikitLinkFive = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $digikitDownloads = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bm\RkwDigiKit\Domain\Model\FileReference>
     */
    protected $digikitVideos = null;

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
        $this->digikitDownloads = new ObjectStorage();
        $this->digikitVideos = new ObjectStorage();
    }

    /**
     * @return int
     */
    public function getDoktype()
    {
        return $this->doktype;
    }

    /**
     * @param int $doktype
     */
    public function setDoktype(int $doktype)
    {
        $this->doktype = $doktype;
    }

    /**
     * @return mixed
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * @param mixed $tstamp
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @return ObjectStorage
     */
    public function getDigikitSliderImages()
    {
        return $this->digikitSliderImages;
    }

    /**
     * @param ObjectStorage $digikitSliderImages
     */
    public function setDigikitSliderImages(ObjectStorage $digikitSliderImages)
    {
        $this->digikitSliderImages = $digikitSliderImages;
    }

    /**
     * @param FileReference $imageToAdd
     */
    public function addDigikitSliderImage(FileReference $imageToAdd)
    {
        $this->digikitSliderImages->attach($imageToAdd);
    }

    /**
     * @param FileReference $imageToRemove
     */
    public function removeDigikitSliderImage(FileReference $imageToRemove)
    {
        $this->digikitSliderImages->detach($imageToRemove);
    }

    /**
     * @return string
     */
    public function getDigikitMainHeader()
    {
        return $this->digikitMainHeader;
    }

    /**
     * @param string $digikitMainHeader
     */
    public function setDigikitMainHeader(string $digikitMainHeader)
    {
        $this->digikitMainHeader = $digikitMainHeader;
    }

    /**
     * @return string
     */
    public function getDigikitMainSubheader()
    {
        return $this->digikitMainSubheader;
    }

    /**
     * @param string $digikitMainSubheader
     */
    public function setDigikitMainSubheader(string $digikitMainSubheader)
    {
        $this->digikitMainSubheader = $digikitMainSubheader;
    }

    /**
     * @return string
     */
    public function getDigikitMainTeaser()
    {
        return $this->digikitMainTeaser;
    }

    /**
     * @param string $digikitMainTeaser
     */
    public function setDigikitMainTeaser(string $digikitMainTeaser)
    {
        $this->digikitMainTeaser = $digikitMainTeaser;
    }

    /**
     * @return string
     */
    public function getDigikitMainText()
    {
        return $this->digikitMainText;
    }

    /**
     * @param string $digikitMainText
     */
    public function setDigikitMainText(string $digikitMainText)
    {
        $this->digikitMainText = $digikitMainText;
    }

    /**
     * @return string
     */
    public function getDigikitMetaCompany()
    {
        return $this->digikitMetaCompany;
    }

    /**
     * @param string $digikitMetaCompany
     */
    public function setDigikitMetaCompany(string $digikitMetaCompany)
    {
        $this->digikitMetaCompany = $digikitMetaCompany;
    }

    /**
     * @return string
     */
    public function getDigikitMetaBusiness()
    {
        return $this->digikitMetaBusiness;
    }

    /**
     * @param string $digikitMetaBusiness
     */
    public function setDigikitMetaBusiness(string $digikitMetaBusiness)
    {
        $this->digikitMetaBusiness = $digikitMetaBusiness;
    }

    /**
     * @return string
     */
    public function getDigikitMetaEmployee()
    {
        return $this->digikitMetaEmployee;
    }

    /**
     * @param string $digikitMetaEmployee
     */
    public function setDigikitMetaEmployee(string $digikitMetaEmployee)
    {
        $this->digikitMetaEmployee = $digikitMetaEmployee;
    }

    /**
     * @return string
     */
    public function getDigikitMetaPlace()
    {
        return $this->digikitMetaPlace;
    }

    /**
     * @param string $digikitMetaPlace
     */
    public function setDigikitMetaPlace(string $digikitMetaPlace)
    {
        $this->digikitMetaPlace = $digikitMetaPlace;
    }

    /**
     * @return string
     */
    public function getDigikitMetaWebsite()
    {
        return $this->digikitMetaWebsite;
    }

    /**
     * @param string $digikitMetaWebsite
     */
    public function setDigikitMetaWebsite(string $digikitMetaWebsite)
    {
        $this->digikitMetaWebsite = $digikitMetaWebsite;
    }

    /**
     * @return string
     */
    public function getDigikitLinkOneTitle()
    {
        return $this->digikitLinkOneTitle;
    }

    /**
     * @param string $digikitLinkOneTitle
     */
    public function setDigikitLinkOneTitle(string $digikitLinkOneTitle)
    {
        $this->digikitLinkOneTitle = $digikitLinkOneTitle;
    }

    /**
     * @return string
     */
    public function getDigikitLinkTwoTitle()
    {
        return $this->digikitLinkTwoTitle;
    }

    /**
     * @param string $digikitLinkTwoTitle
     */
    public function setDigikitLinkTwoTitle(string $digikitLinkTwoTitle)
    {
        $this->digikitLinkTwoTitle = $digikitLinkTwoTitle;
    }

    /**
     * @return string
     */
    public function getDigikitLinkThreeTitle()
    {
        return $this->digikitLinkThreeTitle;
    }

    /**
     * @param string $digikitLinkThreeTitle
     */
    public function setDigikitLinkThreeTitle(string $digikitLinkThreeTitle)
    {
        $this->digikitLinkThreeTitle = $digikitLinkThreeTitle;
    }

    /**
     * @return string
     */
    public function getDigikitLinkFourTitle()
    {
        return $this->digikitLinkFourTitle;
    }

    /**
     * @param string $digikitLinkFourTitle
     */
    public function setDigikitLinkFourTitle(string $digikitLinkFourTitle)
    {
        $this->digikitLinkFourTitle = $digikitLinkFourTitle;
    }

    /**
     * @return string
     */
    public function getDigikitLinkFiveTitle()
    {
        return $this->digikitLinkFiveTitle;
    }

    /**
     * @param string $digikitLinkFiveTitle
     */
    public function setDigikitLinkFiveTitle(string $digikitLinkFiveTitle)
    {
        $this->digikitLinkFiveTitle = $digikitLinkFiveTitle;
    }

    /**
     * @return string
     */
    public function getDigikitLinkOne()
    {
        return $this->digikitLinkOne;
    }

    /**
     * @param string $digikitLinkOne
     */
    public function setDigikitLinkOne(string $digikitLinkOne)
    {
        $this->digikitLinkOne = $digikitLinkOne;
    }

    /**
     * @return string
     */
    public function getDigikitLinkTwo()
    {
        return $this->digikitLinkTwo;
    }

    /**
     * @param string $digikitLinkTwo
     */
    public function setDigikitLinkTwo(string $digikitLinkTwo)
    {
        $this->digikitLinkTwo = $digikitLinkTwo;
    }

    /**
     * @return string
     */
    public function getDigikitLinkThree()
    {
        return $this->digikitLinkThree;
    }

    /**
     * @param string $digikitLinkThree
     */
    public function setDigikitLinkThree(string $digikitLinkThree)
    {
        $this->digikitLinkThree = $digikitLinkThree;
    }

    /**
     * @return string
     */
    public function getDigikitLinkFour()
    {
        return $this->digikitLinkFour;
    }

    /**
     * @param string $digikitLinkFour
     */
    public function setDigikitLinkFour(string $digikitLinkFour)
    {
        $this->digikitLinkFour = $digikitLinkFour;
    }

    /**
     * @return string
     */
    public function getDigikitLinkFive()
    {
        return $this->digikitLinkFive;
    }

    /**
     * @param string $digikitLinkFive
     */
    public function setDigikitLinkFive(string $digikitLinkFive)
    {
        $this->digikitLinkFive = $digikitLinkFive;
    }

    /**
     * @return ObjectStorage
     */
    public function getDigikitDownloads()
    {
        return $this->digikitDownloads;
    }

    /**
     * @param ObjectStorage $digikitDownloads
     */
    public function setDigikitDownloads(ObjectStorage $digikitDownloads)
    {
        $this->digikitDownloads = $digikitDownloads;
    }

    /**
     * @param FileReference $downloadToAdd
     */
    public function addDigikitDownloads(FileReference $downloadToAdd)
    {
        $this->digikitDownloads->attach($downloadToAdd);
    }

    /**
     * @param FileReference $downloadToRemove
     */
    public function removeDigikitDownloads(FileReference $downloadToRemove)
    {
        $this->digikitDownloads->detach($downloadToRemove);
    }

    /**
     * @return ObjectStorage
     */
    public function getDigikitVideos()
    {
        return $this->digikitVideos;
    }

    /**
     * @param ObjectStorage $digikitVideos
     */
    public function setDigikitVideos(ObjectStorage $digikitVideos)
    {
        $this->digikitVideos = $digikitVideos;
    }

    /**
     * @param \Bm\RkwDigiKit\Domain\Model\FileReference $videoToAdd
     */
    public function addDigikitVideos(\Bm\RkwDigiKit\Domain\Model\FileReference $videoToAdd)
    {
        $this->digikitVideos->attach($videoToAdd);
    }

    /**
     * @param \Bm\RkwDigiKit\Domain\Model\FileReference $videoToRemove
     */
    public function removeDigikitVideos(\Bm\RkwDigiKit\Domain\Model\FileReference $videoToRemove)
    {
        $this->digikitVideos->detach($videoToRemove);
    }

    /**
     * @return Category
     */
    public function getDigikitCategory()
    {
        return $this->digikitCategory;
    }

    /**
     * @param Category $digikitCategory
     */
    public function setDigikitCategory(Category $digikitCategory)
    {
        $this->digikitCategory = $digikitCategory;
    }

    /**
     * Summarized properties
     *
     * @return array
     */
    public function getDigiKitCompanyInformation()
    {
        return [
            'header' => $this->digikitMainHeader,
            'subheader' => $this->digikitMainSubheader,
            'teaser' => $this->digikitMainTeaser,
            'text' => $this->digikitMainText
        ];
    }

    /**
     * Summarized properties
     *
     * @return array
     */
    public function getDigiKitImages()
    {
        $images = [];
        if (!empty($this->digikitSliderImages->toArray())) {
            /** @var FileReference $sliderImage */
            foreach ($this->digikitSliderImages as $sliderImage) {
                array_push($images, $sliderImage->getOriginalResource()->getPublicUrl());
            }

            return $images;
        }
        return [];
    }

    /**
     * Summarized properties
     *
     * @return array
     */
    public function getDigiKitMetaInformation()
    {
        return [
            'company' => $this->digikitMetaCompany,
            'business' => $this->digikitMetaBusiness,
            'employee' => $this->digikitMetaEmployee,
            'place' => $this->digikitMetaPlace,
            'website' => $this->digikitMetaWebsite
        ];
    }

    /**
     * Summarized properties
     *
     * @return array|boolean
     */
    public function getDigiKitLinks()
    {
        $array = [];

        if ($this->digikitLinkOne !== '' && $this->digikitLinkOneTitle !== '') {
            array_push($array, ['title' => $this->digikitLinkOneTitle, 'url' => $this->digikitLinkOne]);
        }
        if ($this->digikitLinkTwo !== '' && $this->digikitLinkTwoTitle !== '') {
            array_push($array, ['title' => $this->digikitLinkTwoTitle, 'url' => $this->digikitLinkTwo]);
        }
        if ($this->digikitLinkThree !== '' && $this->digikitLinkThreeTitle !== '') {
            array_push($array, ['title' => $this->digikitLinkThreeTitle, 'url' => $this->digikitLinkThree]);
        }
        if ($this->digikitLinkFour !== '' && $this->digikitLinkFourTitle !== '') {
            array_push($array, ['title' => $this->digikitLinkFourTitle, 'url' => $this->digikitLinkFour]);
        }
        if ($this->digikitLinkFive !== '' && $this->digikitLinkFiveTitle !== '') {
            array_push($array, ['title' => $this->digikitLinkFiveTitle, 'url' => $this->digikitLinkFive]);
        }

        return (!empty($array)) ? $array : false;
    }
}