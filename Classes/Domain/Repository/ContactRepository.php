<?php

namespace Bm\RkwDigiKit\Domain\Repository;

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
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class PageRepository
 * @package Bm\RkwDigiKit\Domain\Repository
 */
class ContactRepository extends Repository
{
    /**
     * @param $storageId
     * @param $global
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findAllContactByStorage($storageId,$global = 0)
    {
        $query = $this->createQuery();

        $query->matching(
            $query->equals('global', $global)
        );

        $query->getQuerySettings()->setStoragePageIds([$storageId]);

        return $query->execute();
    }
}