<?php
defined('TYPO3_MODE') or die();

$ll = 'LLL:EXT:rkw_digi_kit/Resources/Private/Language/locallang_db.xlf:';

/**
 * Additional columns
 */
$additionalColumns = [
    'digikit_slider_images' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_slider_images',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'digikit_slider_images',
            [
                'maxitems' => 99,
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                ],
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                    ],
                ]
            ],
            'gif,jpg,jpeg,bmp,png'
        )
    ],
    'digikit_main_header' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_main_header',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim,required'
        ]
    ],
    'digikit_main_subheader' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_main_subheader',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim,required'
        ]
    ],
    'digikit_main_teaser' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_main_teaser',
        'config' => [
            'type' => 'text',
            'cols' => '40',
            'rows' => '10',
            'eval' => 'trim,required'
        ]
    ],
    'digikit_main_text' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_main_text',
        'config' => [
            'type' => 'text',
            'enableRichtext' => true
        ]
    ],
    'digikit_meta_company' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_meta_company',
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim,required'
        ]
    ],
    'digikit_meta_business' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_meta_business',
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim,required'
        ]
    ],
    'digikit_meta_employee' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_meta_employee',
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim,required'
        ]
    ],
    'digikit_meta_place' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_meta_place',
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim,required'
        ]
    ],
    'digikit_meta_website' => [
        'exclude' => 1,
        'label' => $ll . 'digikit_meta_website',
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim,required'
        ]
    ],
    'digikit_link_one_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_link_two_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_link_three_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_link_four_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_link_five_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_link_one' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'fieldControl' => [
                'linkPopup' => [
                    'options' => [
                        'blindLinkOptions' => 'file,mail,spec,folder,page'
                    ]
                ]
            ],
            'eval' => 'trim'
        ]
    ],
    'digikit_link_two' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'fieldControl' => [
                'linkPopup' => [
                    'options' => [
                        'blindLinkOptions' => 'file,mail,spec,folder,page'
                    ]
                ]
            ],
            'eval' => 'trim'
        ]
    ],
    'digikit_link_three' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'fieldControl' => [
                'linkPopup' => [
                    'options' => [
                        'blindLinkOptions' => 'file,mail,spec,folder,page'
                    ]
                ]
            ],
            'eval' => 'trim'
        ]
    ],
    'digikit_link_four' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'fieldControl' => [
                'linkPopup' => [
                    'options' => [
                        'blindLinkOptions' => 'file,mail,spec,folder,page'
                    ]
                ]
            ],
            'eval' => 'trim'
        ]
    ],
    'digikit_link_five' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'fieldControl' => [
                'linkPopup' => [
                    'options' => [
                        'blindLinkOptions' => 'file,mail,spec,folder,page'
                    ]
                ]
            ],
            'eval' => 'trim'
        ]
    ],
    'digikit_download_one_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_download_two_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_download_three_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_download_four_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_download_five_title' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download_title',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim'
        ]
    ],
    'digikit_download_one' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'digikit_download_one',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the image overlay palette instead of the basic overlay palette
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                    ],
                ],
            ],
            'pdf'
        ),
    ],
    'digikit_download_two' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'digikit_download_two',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the image overlay palette instead of the basic overlay palette
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                    ],
                ],
            ],
            'pdf'
        ),
    ],
    'digikit_download_three' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'digikit_download_three',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the image overlay palette instead of the basic overlay palette
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                    ],
                ],
            ],
            'pdf'
        ),
    ],
    'digikit_download_four' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'digikit_download_four',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the image overlay palette instead of the basic overlay palette
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                    ],
                ],
            ],
            'pdf'
        ),
    ],
    'digikit_download_five' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_download',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'digikit_download_five',
            [
                'appearance' => [
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ],
                // custom configuration for displaying fields in the overlay/reference table
                // to use the image overlay palette instead of the basic overlay palette
                'overrideChildTca' => [
                    'types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                    ],
                ],
            ],
            'pdf'
        ),
    ],
    'digikit_category' => [
        'exclude' => 1,
        'displayCond' => 'FIELD:doktype:=:' . \Bm\RkwDigiKit\Domain\Model\Page::DIGI_KIT_DOKTYPE,
        'label' => $ll . 'digikit_category',
        'config' => [
            'foreign_table' => 'sys_category',
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) AND sys_category.deleted = 0 ORDER BY sys_category.title ASC',
            'maxitems' => 1,
            'MM' => 'sys_category_record_mm',
            'MM_match_fields' => [
                'fieldname' => 'digikit_category',
                'tablenames' => 'pages'
            ],
            'MM_opposite_field' => 'items',
            'renderType' => 'selectTree',
            'size' => 15,
            'treeConfig' => [
                'appearance' => [
                    'expandAll' => 1,
                    'maxLevels' => 99,
                    'showHeader' => 1,
                    'nonSelectableLevels' => '0,1,2,3'
                ],
                'parentField' => 'parent',
            ],
            'type' => 'select',
            'eval' => 'required'
        ]
    ]
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $additionalColumns);

/**
 * Palettes
 */
$palettes = [
    'DigiKitSlider' => [
        'showitem' => '
            digikit_slider_images
        '
    ],
    'DigiKitMain' => [
        'showitem' => '
            digikit_main_header,
            digikit_main_subheader,
            --linebreak--,
            digikit_main_teaser,
            digikit_main_text
        '
    ],
    'DigiKitMeta' => [
        'showitem' => '
            digikit_meta_company,
            digikit_meta_business,
            --linebreak--,
            digikit_meta_employee,
            digikit_meta_place,
            --linebreak--,
            digikit_meta_website          
        '
    ],
    'DigiKitLinks' => [
        'showitem' => '
            digikit_link_one_title,
            digikit_link_one,
            --linebreak--,
            digikit_link_two_title,
            digikit_link_two,
            --linebreak--,
            digikit_link_three_title,
            digikit_link_three,
            --linebreak--,
            digikit_link_four_title,
            digikit_link_four,
            --linebreak--,
            digikit_link_five_title,
            digikit_link_five
        '
    ],
    'DigiKitDownloads' => [
        'showitem' => '
            digikit_download_one_title,
            digikit_download_one,
            --linebreak--,
            digikit_download_two_title,
            digikit_download_two,
            --linebreak--,
            digikit_download_three_title,
            digikit_download_three,
            --linebreak--,
            digikit_download_four_title,
            digikit_download_four,
            --linebreak--,
            digikit_download_five_title,
            digikit_download_five
        '
    ],
    'DigiKitMenu' => [
        'showitem' => '
            digikit_category
        '
    ]
];

$GLOBALS['TCA']['pages']['palettes'] = array_merge($GLOBALS['TCA']['pages']['palettes'], $palettes);

/**
 * Add additional columns|palettes to sys_category
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;DigiKit,
        --palette--;Slider Settings;DigiKitSlider,
        --palette--;Main Information;DigiKitMain,
        --palette--;Meta Information;DigiKitMeta,
        --palette--;Links;DigiKitLinks,
        --palette--;Downloads;DigiKitDownloads,
        --palette--;Bind Page to navigation endpoint (Category Level 4);DigiKitMenu 
    '
);

/**
 * Add new fields to search fields
 */
$GLOBALS['TCA']['pages']['ctrl']['searchFields'] .= trim('
    ,digikit_meta_company,digikit_meta_business,digikit_meta_employee,digikit_meta_place
    ,digikit_meta_website,digikit_meta_map,digikit_category,digikit_main_header,digikit_main_subheader
    ,digikit_main_teaser,digikit_main_text,digikit_link_one_title,digikit_link_one,digikit_link_two_title
    ,digikit_link_two,digikit_link_three_title,digikit_link_three,digikit_link_four_title,digikit_link_four
    ,digikit_link_five_title,digikit_link_five,digikit_download_one_title,digikit_download_one
    ,digikit_download_two_title,digikit_download_two,digikit_download_three_title
    ,digikit_download_three,digikit_download_four_title,digikit_download_four
    ,digikit_download_five_title,digikit_download_five
');

/**
 * New page type
 */
call_user_func(
    function ($extKey, $table) {
        $digiKitDoktype = 130;

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            $table,
            'doktype',
            [
                'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang.xlf:page_types.digikit',
                $digiKitDoktype,
                'EXT:' . $extKey . '/page-icon.svg'
            ],
            '1',
            'after'
        );

        \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
            $GLOBALS['TCA']['pages'],
            [
                'ctrl' => [
                    'typeicon_classes' => [
                        $digiKitDoktype => 'apps-pagetree-digikit'
                    ]
                ]
            ]
        );
    },
    'rkw_digi_kit',
    'pages'
);