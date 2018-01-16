<?php
defined('TYPO3_MODE') or die('Access denied!');

$extGlobalConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['rkw_digi_kit']);

if ((bool) $extGlobalConfiguration['isDev']) {
    $developTSconfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)
        . 'Configuration/TSconfig/developTSconfig.t3s'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($developTSconfig);
}