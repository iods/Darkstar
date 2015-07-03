<?php
/**
 * Core methods for initiating the application.
 *
 * File is responsible for the setup and build methods which
 * handle errors, configuration options, package management, and
 * is responsible for initiation of the application.
 *
 * PHP version 5.4+
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future. If you wish to further customize for your
 * needs please contact the developer (Rye) <millerrye17@gmail.com>
 * for more information on how to contribute.
 *
 * @category   Core
 * @package    Darkstar
 * @author     Rye Miller <millerrye17@gmail.com>
 * @copyright  (c)2015 Rye Miller
 * @license    GNU General Public License (2.0)
 *
 * @link       http://github.com/iods/darkstarSDK
 * @version    0.1.0 Initial Development Release
 * @since      File available since release 0.1.0
 *
 * @filesource
 */

/**
 * The time the script started (Timestamped for sessions and DB)
 *
 * @return int The time the application was instantiated.
 * @since 0.1.0
 */
defined('START_TIME') || define('START_TIME', microtime(true));

/**
 * Sets the timezone for the application locale.
 *
 * @since 0.1.0
 */
date_default_timezone_set("America/Los_Angeles");

/**
 * Increases the max execution time to 5 mins (in secs)
 *
 * @since 0.1.0
 */
ini_set('max_execution_time', 300);

/**
 * Sets everything to UTF-8
 *
 * @since 0.1.0
 */
setlocale(LC_ALL, 'en_US.utf-8');
iconv_set_encoding("internal_encoding", "UTF-8");
mb_internal_encoding('UTF-8');



/* End of file Dark.php */
/* File located ./app/code/Dark.php */




