<?php

namespace Bm\RkwDigiKit\Utility;

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
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;

/**
 * Class CachingUtility
 * @package Bm\RkwDigiKit\Utility
 */
class CachingUtility extends AbstractUtility
{

    /**
     * @var null|object|CacheManager
     */
    protected $cacheManager = null;

    /**
     * Caching Instance
     *
     * @var null|object|FrontendInterface
     */
    protected $cacheInstance = null;

    /**
     * CachingUtility constructor.
     * @param string $key
     * @throws \TYPO3\CMS\Core\Cache\Exception\NoSuchCacheException
     */
    public function __construct($key)
    {
        parent::__construct();
        $this->cacheManager = $this->objectManager->get(CacheManager::class);
        $this->cacheInstance = $this->cacheManager->getCache($key);
    }

    /**
     * @param array $identifiers
     * @param array $data
     * @param bool $force
     */
    public function cache(array $identifiers, array $data, $force = false)
    {
        $cacheIdentifier = self::createCacheIdentifier($identifiers);

        if ($force || !$this->cacheInstance->get($cacheIdentifier)) {
            $entry = [
                'timestamp' => time(),
                'data' => $data
            ];
            $this->cacheInstance->set($cacheIdentifier, $entry);
        }
    }

    /**
     * @param array $identifiers
     * @return mixed
     */
    public function loadCache(array $identifiers)
    {
        return $this->cacheInstance->get(self::createCacheIdentifier($identifiers));
    }

    /**
     * @param array $identifiers
     * @return string
     */
    private function createCacheIdentifier(array $identifiers)
    {
        $cacheIdentifiers = $identifiers;
        $cacheIdentifiers[] = $GLOBALS['TSFE']->rootLine[1]['uid'];
        $cacheIdentifier = md5(implode(',', $cacheIdentifiers));

        return $cacheIdentifier;
    }
}