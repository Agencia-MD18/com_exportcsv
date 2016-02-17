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

header("Content-Type: application/csv");
header("Content-Disposition: attachment;Filename=matriculas.csv"); ?>

<?php echo utf8_decode($this->csv); ?>
