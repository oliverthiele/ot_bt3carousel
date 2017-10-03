<?php

namespace OliverThiele\OtBt3carousel\Hooks;

/**
 * Class TypoScriptHook
 *
 * @package TYPO3
 * @subpackage ot_bt3carousel
 */
class TypoScriptHook
{

    /**
     * Hook into the default TypoScript to add custom typoscript template
     *
     * @param array $parameters
     * @param \TYPO3\CMS\Core\TypoScript\TemplateService $parentObject
     * @return void
     */
    public function addCustomTypoScriptTemplate($parameters, $parentObject)
    {
        // Add a custom "fake" sys_template record, if no template was found in rootline
        if ($parentObject->outermostRootlineIndexWithTemplate === 0) {
            $row = [
                'uid' => 'ot_bt3carousel',
                'constants' => '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:ot_bt3carousel/Configuration/TypoScript/constants.txt">' . LF,
                'config' => '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:ot_bt3carousel/Configuration/TypoScript/setup.txt">' . LF,
                'root' => 0,
                'clear' => 0,
                'nextlevel' => 0,
                'static_file_mode' => 1,
                'title' => 'Extension template ot_bt3carousel',
            ];
            $parentObject->processTemplate($row, 'sys_' . $row['uid'], $parameters['absoluteRootLine'][0]['uid'],
                'sys_' . $row['uid']);
            $parentObject->rootId = $parameters['absoluteRootLine'][0]['uid'];
            $parentObject->rootLine[] = $parameters['absoluteRootLine'][0];
        }
    }
}
