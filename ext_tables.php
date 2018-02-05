<?php
defined('TYPO3_MODE') or die('Access denied!');

/**
 * Register plugins
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Bm.' . $_EXTKEY,
    'DigiKit',
    'RKW - DigitalisierungsKIT'
);
/**
 * Define new page type
 */
call_user_func(
    function ($extKey) {
        $digiKitDoktype = 130;

        $GLOBALS['PAGES_TYPES'][$digiKitDoktype] = [
            'type' => 'web',
            'allowedTables' => '*'
        ];

        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
            ->registerIcon(
                'apps-pagetree-digikit',
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                [
                    'source' => 'EXT:' . $extKey . '/page-icon.svg',
                ]
            );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
            'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $digiKitDoktype . ')'
        );
    },
    'rkw_digi_kit'
);