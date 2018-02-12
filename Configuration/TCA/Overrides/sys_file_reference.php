<?php

/**
 * Additional columns
 */
$additionalColumns = [
    'columns' => [
        'thumbnail' => [
            'exclude' => 1,
            'label' => 'Thumbnail',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'thumbnail',
                [
                    'maxitems' => 1,
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
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;;basicoverlayPalette
								,--palette--;;filePalette
							'
                            ],
                        ],
                    ]
                ]
            )
        ]
    ]
];

$GLOBALS['TCA']['sys_file_reference'] = array_replace_recursive($GLOBALS['TCA']['sys_file_reference'], $additionalColumns);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette('sys_file_reference', 'videoOverlayPalette',
    '--linebreak--,thumbnail');