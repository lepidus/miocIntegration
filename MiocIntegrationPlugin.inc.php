<?php

/**
 * @file plugins/generic/miocIntegration/MiocIntegrationPlugin.php
 *
 * Copyright (c) 2025 SciELO
 * Copyright (c) 2025 Lepidus Tecnologia
 * Distributed under the GNU GPL v3. For full terms see LICENSE or https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @class MiocIntegrationPlugin
 * @ingroup plugins_generic_miocIntegration
 *
 */

import('lib.pkp.classes.plugins.GenericPlugin');

class MiocIntegrationPlugin extends GenericPlugin
{
    public function register($category, $path, $mainContextId = null)
    {
        $success = parent::register($category, $path, $mainContextId);

        if ($success && $this->getEnabled($mainContextId)) {
            HookRegistry::register('Template::Workflow', array($this, 'addWorkflowModifications'));
        }

        return $success;
    }

    public function getDisplayName()
    {
        return __('plugins.generic.miocIntegration.displayName');
    }

    public function getDescription()
    {
        return __('plugins.generic.miocIntegration.description');
    }

    public function addWorkflowModifications($hookName, $params)
    {
        $templateMgr = &$params[1];
        $submission = $templateMgr->getTemplateVars('submission');
        $publication = $submission->getCurrentPublication();

        $sectionDao = DAORegistry::getDAO('SectionDAO');
        $section = $sectionDao->getById($publication->getData('sectionId'));
        $templateMgr->assign('submissionSection', $section->getLocalizedTitle());

        $templateMgr->registerFilter("output", [$this, 'addSectionViewerFilter']);
    }

    public function addSectionViewerFilter($output, $templateMgr)
    {
        $pattern = '/<tabs default-tab="workflow"/';
        if (preg_match($pattern, $output, $matches, PREG_OFFSET_CAPTURE)) {
            $posBeginning = $matches[0][1];

            $sectionViewerTemplate = $templateMgr->fetch($this->getTemplateResource('sectionViewer.tpl'));

            $output = substr_replace($output, $sectionViewerTemplate, $posBeginning, 0);
            $templateMgr->unregisterFilter('output', [$this, 'addSectionViewerFilter']);
        }
        return $output;
    }
}
