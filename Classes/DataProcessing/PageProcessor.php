<?php

namespace Bm\RkwDigiKit\DataProcessing;

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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Class PageProcessor
 * @package Bm\RkwDigiKit\DataProcessing
 */
class PageProcessor implements DataProcessorInterface
{
    /**
     * @param ContentObjectRenderer $cObj
     * @param array $contentObjectConfiguration
     * @param array $processorConfiguration
     * @param array $processedData
     * @return array
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        $as = $processorConfiguration['as'];
        $type = $processorConfiguration['type'];
        $doktype = intval($processorConfiguration['doktype']);

        if($doktype == $cObj->data['doktype'] && $type != '' && $as != '' && $doktype > 0) {
            /** @var PropertyMapper $propertyMapper */
            $propertyMapper = GeneralUtility::makeInstance(ObjectManager::class)->get(PropertyMapper::class);

            $input = [
                '__identity' => $cObj->data['uid']
            ];

            $page = false;

            try {
                $page = $propertyMapper->convert($input, $type);
            } catch (\Exception $e) {
                DebuggerUtility::var_dump('fail');
            }

            $processedData[$as] = $page;
        }

        return $processedData;
    }
}