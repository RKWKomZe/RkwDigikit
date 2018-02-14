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
     * @var string
     */
    protected $title = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Bm\RkwDigiKit\Domain\Model\FileReference>
     */
    protected $media = null;

    /**
     * Tutorial constructor.
     */
    public function __construct()
    {
        $this->media = new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return ObjectStorage
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param ObjectStorage $media
     */
    public function setMedia(ObjectStorage $media)
    {
        $this->media = $media;
    }

    /**
     * @param \Bm\RkwDigiKit\Domain\Model\FileReference $mediaToAdd
     */
    public function addMedia(\Bm\RkwDigiKit\Domain\Model\FileReference $mediaToAdd)
    {
        $this->media->attach($mediaToAdd);
    }

    /**
     * @param \Bm\RkwDigiKit\Domain\Model\FileReference $mediaToRemove
     */
    public function removeMedia(\Bm\RkwDigiKit\Domain\Model\FileReference $mediaToRemove)
    {
        $this->media->detach($mediaToRemove);
    }
}