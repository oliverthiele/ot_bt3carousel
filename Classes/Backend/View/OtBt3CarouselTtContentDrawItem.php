<?php

/**
 * Class which hooks into tx_cms_layout and do additional tt_content_drawItem processing.
 *
 * @package TYPO3
 * @subpackage ot_bt3carousel
 * @author Oliver Thiele
 */
class OtBt3CarouselTtContentDrawItem implements \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface
{

    /**
     * Preprocesses the preview rendering of a content element.
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject :  Calling parent object
     * @param boolean $drawItem :      Whether to draw the item using the default functionalities
     * @param string $headerContent :  Header content
     * @param string $itemContent :    Item content
     * @param array $row :             Record row of tt_content
     * @return void
     */
    public function preProcess(
        \TYPO3\CMS\Backend\View\PageLayoutView &$parentObject,
        &$drawItem,
        &$headerContent,
        &$itemContent,
        array &$row
    ) {

        switch ($row['CType']) {
            case 'ot_bt3carousel':
                $drawItem = false;
                $itemContent = $this->getPi1Preview($row);
                break;
        }
    }

    /**
     * Preview of a content element.
     *
     * @param array $row : Record row of tt_content
     * @return string
     */
    private function getPi1Preview($row)
    {
        if ($row['assets']) {
            $images = \TYPO3\CMS\Backend\Utility\BackendUtility::thumbCode(
                $row,
                'tt_content',
                'assets',
                $GLOBALS['BACK_PATH']
            );
        }

        return $row['subheader'] . '<br />' . $images;
    }
}
