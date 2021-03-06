<?php
defined('TYPO3_MODE') or die('Access denied!');

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

$ll = 'LLL:EXT:rkw_digi_kit/Resources/Private/Language/locallang_db.xlf:';

return [
    'ctrl' => [
        'title' => 'DigiKit Contact',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => true,
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'origUid' => 't3_origuid',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,function,phone,email,for,global,street,city',
        'iconfile' => 'EXT:rkw_digi_kit/ext_icon.png'
    ],
    'interface' => [
        'showRecordFieldList' => '
            sys_language_uid, l10n_parent, l10n_diffsource, hidden,
            name,street,city,phone,email,for,global
        '
    ],
    'types' => [
        '0' => [
            'showitem' => '
                sys_language_uid, l10n_parent, l10n_diffsource, hidden,
                --linebreak--,
                for,global,
                --linebreak--,
                function,
                --linebreak--,
                name,street,city,
                --linebreak--,
                phone,email
            '
        ]
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => [
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1],
                    ['LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0]
                ]
            ]
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['',0]
                ],
                'foreign_table' => 'tx_rkwdigikit_domain_model_contact',
                'foreign_table_where' => 'AND tx_rkwdigikit_domain_model_contact.pid=###CURRENT_PID### AND tx_rkwdigikit_domain_model_contact.sys_language_uid IN (-1,0)',
                'default' => 0
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check'
            ]
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'renderType' => 'inputDateTime',
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ],
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'renderType' => 'inputDateTime',
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ],
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ]
            ]
        ],
        'for' => [
            'exclude' => 1,
            'label' => $ll . 'digikit_contact_for',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['',0],
                    ['Baden-Württemberg','BW'],
                    ['Bayern','BY'],
                    ['Berlin','BE'],
                    ['Brandenburg','BB'],
                    ['Bremen','HB'],
                    ['Hamburg','HH'],
                    ['Hessen','HE'],
                    ['Mecklenburg-Vorpommern','MV'],
                    ['Niedersachsen','NI'],
                    ['Nordrhein-Westfalen','NW'],
                    ['Rheinland-Pfalz','RP'],
                    ['Saarland','SL'],
                    ['Sachsen','SN'],
                    ['Sachsen-Anhalt','ST'],
                    ['Schleswig-Holstein','SH'],
                    ['Thüringen','TH']
                ],
                'default' => 0
            ]
        ],
        'name' => [
            'exclude' => 1,
            'label' => $ll . 'digikit_contact_name',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim,required'
            ]
        ],
        'street' => [
            'exclude' => 1,
            'label' => $ll . 'digikit_contact_street',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim'
            ]
        ],
        'city' => [
            'exclude' => 1,
            'label' => $ll . 'digikit_contact_city',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim'
            ]
        ],
        'phone' => [
            'exclude' => 1,
            'label' => $ll . 'digikit_contact_phone',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim,required'
            ]
        ],
        'email' => [
            'exclude' => 1,
            'label' => $ll . 'digikit_contact_email',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim,required'
            ]
        ],
        'global' => [
            'exclude' => 1,
            'label' => $ll . 'digikit_contact_global',
            'config' => [
                'type' => 'check',
                'items' => [
                    [ 'Is global contact?', '' ]
                ],
            ]
        ],
        'function' => [
            'exclude' => 1,
            'label' => $ll . 'digikit_contact_function',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'eval' => 'trim'
            ]
        ],
    ]
];