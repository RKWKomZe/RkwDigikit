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
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class Tutorial
 * @package Bm\RkwDigiKit\Domain\Model
 */
class Tutorial extends AbstractEntity
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images = null;

    /**
     * Tutorial constructor.
     */
    public function __construct()
    {
        $this->images = new ObjectStorage();
    }

    /**
     * @return ObjectStorage
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ObjectStorage $images
     */
    public function setImages(ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * @param FileReference $imageToAdd
     */
    public function addImage(FileReference $imageToAdd)
    {
        $this->images->attach($imageToAdd);
    }

    /**
     * @param FileReference $imageToRemove
     */
    public function removeImage(FileReference $imageToRemove)
    {
        $this->images->detach($imageToRemove);
    }
}