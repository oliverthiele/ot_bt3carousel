<?php
defined('TYPO3_MODE') or die();

// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    [
        'Bootstrap 3 Carousel',
        // 'LLL:EXT:your_extension_key/Resources/Private/Language/Tca.xlf:yourextensionkey_newcontentelement',
        'ot_bt3carousel',
        'EXT:ot_bt3carousel/Resources/Public/Icons/Extension.svg'
    ],
    'CType',
    'ot_bt3carousel'
);

// Configure the default backend fields for the content element
$GLOBALS['TCA']['tt_content']['types']['ot_bt3carousel'] = [
    'showitem' => '
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;header,subheader,assets,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
    ',
    'columnsOverrides' => [
        'assets' => [
            'config' => [
                'overrideChildTca' => [
                    'columns' => [
                        'crop' => [
                            'config' => [
                                'cropVariants' => [
                                    'default' => [
                                        'disabled' => true,
                                    ],
                                    'mobile' => [
                                        'disabled' => true,
                                    ],
                                    'desktop' => [
                                        'disabled' => true,
                                    ],
                                    'slider' => [
                                        'title' => 'Slider',
                                        // 'LLL:EXT:ext_key/Resources/Private/Language/locallang.xlf:imageManipulation.mobile',
                                        'cropArea' => [
                                            'x' => 0.1,
                                            'y' => 0.1,
                                            'width' => 0.8,
                                            'height' => 0.8,
                                        ],
                                        'allowedAspectRatios' => [
                                            '1170x450' => [
                                                'title' => '1170x450',
                                                'value' => 1170 / 450
                                            ],
                                            'NaN' => [
                                                'title' => 'LLL:EXT:lang/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
                                                'value' => 0.0
                                            ],
                                        ],
                                    ],
                                ],
                                'maxitems' => 10,
                                'filter' => [
                                    '0' => [
                                        'parameters' => [
                                            'allowedFileExtensions' => 'jpg,png'
                                        ]
                                    ]
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ]
    ]
];
