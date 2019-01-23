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
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Object\ObjectManager;

/**
 * Class AbstractUtility
 * @package Bm\RkwDigiKit\Utility
 */
class AbstractUtility
{
    /**
     * @var null|object|ObjectManager
     */
    protected $objectManager = null;

    /**
     * AbstractUtility constructor.
     */
    public function __construct()
    {
        /** @var ObjectManager objectManager */
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
    }

    /**
     * Get Extension Configuration by given ExtKey
     *
     * @param string $extKey
     * @return array
     */
    public function getExtensionConfiguration(string $extKey)
    {
        /** @var ConfigurationManagerInterface $configurationManagerInterface */
        $configurationManagerInterface = $this->objectManager->get(ConfigurationManagerInterface::class);
        $extensionConfiguration = $configurationManagerInterface->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK,$extKey);

        return $extensionConfiguration;
    }
}