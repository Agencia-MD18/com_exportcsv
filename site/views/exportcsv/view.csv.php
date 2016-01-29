<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_exportcsv
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * CSV View class for the ExportCSV Component
 *
 * @since  0.0.1
 */
class ExportCSVViewExportCSV extends JViewLegacy 
{

    function display($tpl = null)
    {
        $model = $this->getModel();
        $ids = JRequest::getVar('ids', array(), 'get','array');

        $this->csv = $model->getCSV($ids);

        // Display the view
        parent::display($tpl);
    }

}
