<?php

/**
 * @defgroup plugins_generic_miocIntegration
 */

/**
 * @file plugins/generic/miocIntegration/index.php
 *
 * Copyright (c) 2025 SciELO
 * Copyright (c) 2025 Lepidus Tecnologia
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @ingroup plugins_generic_miocIntegration
 * @brief Wrapper for MIOC Integration plugin.
 *
 */

require_once('MiocIntegrationPlugin.inc.php');

return new MiocIntegrationPlugin();
