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

/**
 * Class Contact
 * @package Bm\RkwDigiKit\Domain\Model
 */
class Contact extends AbstractEntity
{
    /**
     * @var string
     */
    protected $for = '';

    /**
     * @var bool
     */
    protected $global = false;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $street = '';

    /**
     * @var string
     */
    protected $city = '';

    /**
     * @var string
     */
    protected $phone = '';

    /**
     * @var string
     */
    protected $email = '';

    /**
     * @var string
     */
    protected $function = '';

    /**
     * @return string
     */
    public function getFor()
    {
        return $this->for;
    }

    /**
     * @param string $for
     */
    public function setFor(string $for)
    {
        $this->for = $for;
    }

    /**
     * @return bool
     */
    public function isGlobal()
    {
        return $this->global;
    }

    /**
     * @param bool $global
     */
    public function setGlobal(bool $global)
    {
        $this->global = $global;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param string $function
     */
    public function setFunction(string $function)
    {
        $this->function = $function;
    }
}