<?php

namespace Bm\RkwDigiKit\Controller;

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

use Bm\RkwDigiKit\Domain\Model\Page;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * Class SitemapController
 * @package Bm\RkwDigiKit\Controller
 */
class SitemapController extends ActionController
{

    /**
     * @var \Bm\RkwDigiKit\Domain\Repository\PageRepository
     * @inject
     */
    protected $pageRepository;


    public function listAction() {

        $this->request->setFormat('xml');


        $pages = $this->pageRepository->findByDoktype();
        $sitemap = array();
        /** @var Page $page */
        foreach($pages as $page) {
            $title = str_replace(' ', '-', $page->getDigikitMainHeader());
            $title = str_replace('/', '-', $title);
            $sitemap[] = array(
                'loc' => $this->settings['url'] . 'beispiel/' . $page->getUid() . '-' . $title,
                'lastmod' => strftime('%Y-%m-%d', $page->getTstamp())
            );
        }

        $this->view->assign('sitemap', $sitemap);
    }

}