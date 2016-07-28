<?php
/**
 * Initiates the application.
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
 * PHP version compatibility check.
 *
 * @since 0.1.0
 */
if (version_compare(phpversion(), '5.4.0', '<') === true)
{
    exit('PHP v5.4+ is required when running this experience.');
}

/**
 * @TODO Error reporting setups.
 */

/**
 * @TODO Config loader and developer mode.
 */

/**
 * Includes the main file for collecting all the application defaults.
 *
 * @since 0.1.0
 */
require 'app/code/Dark.php';

/**
 * @TODO Setup maintenance mode and 404 redirection.
 */

/**
 * @TODO Setup best way of instantiating the application.
 */

/* End of file index.php */
/* File location /index.php */