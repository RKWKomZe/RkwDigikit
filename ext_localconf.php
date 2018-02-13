<?php
defined('TYPO3_MODE') or die('Access denied!');

/**
 * Register CK Editor presets
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['digikittext'] = 'EXT:rkw_digi_kit/Configuration/RTE/DigikitText.yaml';

/**
 * Page TSconfig
 */
$pageTSconfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY)
    . 'Configuration/TSconfig/pageTSconfig.t3s'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($pageTSconfig);

/**
 * Configure Caching Framework
 */
$cacheKeys = [\Bm\RkwDigiKit\Service\StructureService::CACHING_KEY];
$defaultLifeTime = 60 * 60 * 24;

foreach ($cacheKeys as $cacheKey) {
    if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey])) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey] = [];
    }

    if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['frontend'])) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
    }

//    if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['backend'])) {
//        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['backend'] = \TYPO3\CMS\Core\Cache\Backend\Typo3DatabaseBackend::class;
//    }

    if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['options'])) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['options'] = [
            'defaultLifetime' => $defaultLifeTime
        ];
    }

    if (!isset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['groups'])) {
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['groups'] = [
            'pages'
        ];
    }
}