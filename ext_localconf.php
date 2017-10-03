<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

/**
 * Add TypoScript without DB entries
 *
 * @see https://docs.typo3.org/typo3cms/Snippets/2017/Index.html#root-typoscript-without-database
 */
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['Core/TypoScript/TemplateService']['runThroughTemplatesPostProcessing'][] = \OliverThiele\OtBt3carousel\Hooks\TypoScriptHook::class . '->addCustomTypoScriptTemplate';

/**
 * Call hook for manipulation the BE preview
 */
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][$_EXTKEY] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Classes/Backend/View/OtBt3CarouselTtContentDrawItem.php:OtBt3CarouselTtContentDrawItem';

/**
 * Icon Factory
 *
 * @see https://docs.typo3.org/typo3cms/CoreApiReference/ApiOverview/Icon/Index.html
 */
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
    \TYPO3\CMS\Core\Imaging\IconRegistry::class
);
$iconRegistry->registerIcon(
    'ot-bt3carousel',
    \TYPO3\CMS\Core\Imaging\IconProvider\FontawesomeIconProvider::class,
    [
        'name' => 'exchange',
        'spinning' => false
    ]
);

// You can also include a file here: <INCLUDE_TYPOSCRIPT: source="FILE:EXT:ot_bt3carousel/Configuration/PageTS/PageTSConfigFile.t3s">
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
mod.wizards.newContentElement.wizardItems.extras {
    header = Extras
    elements {
        ot_bt3carousel {
            iconIdentifier = ot-bt3carousel
            
            # You can use: LLL:EXT:your_extension_key/Resources/Private/Language/Tca.xlf:yourextensionkey_newcontentelement.wizard.title
            title = Bootstrap 3 Carousel
             
            # same here: LLL:EXT:your_extension_key/Resources/Private/Language/Tca.xlf:yourextensionkey_newcontentelement.wizard.description
            description = Bootstrap 3 Carousel Description
            tt_content_defValues {
                CType = ot_bt3carousel
                header = Bootstrap 3 Carousel
                header_layout = 100
                # You can add more DB fields here with default values for this CType
                # bootstrap_col_xs = 12
                # bootstrap_col_sm = 6
                # …
            }
        }
   }
   show := addToList(ot_bt3carousel)
}
');

