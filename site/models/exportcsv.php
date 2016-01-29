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
 * ExportCSV Model
 *
 * @since  0.0.1
 */
class ExportCSVModelExportCSV extends JModelItem
{
    
    protected $csv;
    protected $ids;
 
    public function getCSV($ids = array())
    {

        if (!isset($this->csv))
        {
            $this->csv = $this->buildCSV($ids);
        }
 
        return $this->csv;
    }


    protected function buildCSV($ids = array())
    {

        $output = NULL;

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from($db->quoteName('#__table'));

        if ($ids) {
            $query->where('id IN ('. join(',',$ids) .')');
        }

        $db->setQuery($query);
        $results = $db->loadObjectList();

        if ($results) {
            
            $result = $results[0];
            // Header
            foreach ($result as $key => $value) {
                $output.= $key.';';
            }
            $output = substr($output, 0, -1)."\n";

            foreach ($results as $index => $row) {
                foreach ($row as $key => $value) {
                    $output .= $value . ";";
                }
                $output .= "\n";
            }
        }

        return $output;

    }

}

