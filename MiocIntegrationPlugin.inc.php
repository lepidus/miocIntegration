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

        /*if ($success && $this->getEnabled($mainContextId)) {
            // To be implemented
        }*/

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
}
