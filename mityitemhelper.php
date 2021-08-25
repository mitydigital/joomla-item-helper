<?php
/**
 * @package     MityItemHelper
 * @subpackage  plg_content_mityitemhelper
 *
 * @copyright   Copyright (C) 2020, Mity Digital. All rights reserved.
 * @license     GNU General Public License version 3
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

use Mity\ItemHelper;

/**
 * Mity Item Helper
 *
 * @package     ${NAMESPACE}
 * @subpackage  Plugins
 *
 * @since       version
 */
class plgContentMityitemhelper extends JPlugin
{
    public function onContentPrepare($context, &$item, &$params, $page = 0)
    {
        // Don't run this plugin when the content is being indexed
        if ($context === 'com_finder.indexer') {
            return true;
        }

        if (is_object($item)) {
            // require the Mity Item Helper
            require_once('ItemHelper.php');

            // process the item
            ItemHelper::process($item);
        }

        return true;
    }
}
