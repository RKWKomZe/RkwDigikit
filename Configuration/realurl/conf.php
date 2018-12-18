<?php

$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array(
    'init' => array(
        'emptyUrlReturnValue' => '/',
        'appendMissingSlash' => 'ifNotFile, redirect[301]',
        'respectSimulateStaticURLs' => 0,
        'reapplyAbsRefPrefix' => true,
    ),
    'preVars' => array(
        array(
            'GETvar' => 'L',
            'valueMap' => array(// 'de' => '1'
            ),
            'noMatch' => 'bypass',
        ),
        array(
            'GETvar' => 'no_cache',
            'valueMap' => array(
                'nc' => 1,
            ),
            'noMatch' => 'bypass',
        ),
    ),
    'pagePath' => array(
        'type' => 'user',
        'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
        'spaceCharacter' => '-',
        'languageGetVar' => 'L',
        'expireDays' => 0,
        'firstHitPathCache' => 1,
        'rootpage_id' => '1',
        'segTitleFieldList' => 'alias,tx_realurl_pathsegment,title,nav_title',
    ),
    'fileName' => array(
        'defaultToHTMLsuffixOnPrev' => 0,
        'acceptHTMLsuffix' => 1,
        'index' => array(
            'sitemap.xml' => array(
                'keyValues' => array(
                    'type' => 100,
                ),
            )
        ),
    )
);