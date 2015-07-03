<?php
/**
 * The Autoloader for the application's Library.
 *
 * File is responsible for autoloading the main important library
 * files from the DarkstarSDK library.
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

namespace Darkstar;

/**
 * Darkstar Autoloader Class
 *
 * @author Rye Miller
 * @since  Class available since release 0.1.0
 *
 * @example
 * require_once 'Darkstar/Autoload.php';
 * new Autoload('Path/to/Classes');
 */
class Autoload implements Api
{
    /**
     * @access private
     * @var string $_directory The directory to Autoload.
     */
    private $_directory;

    /**
     * @access private
     * @var boolean $_isLoaded Flagged so the loader won't load the class twice.
     */
    private $_isLoaded;

    /**
     * @access private
     * @var string $_className Class name w/o a namespace.
     */
    private $_className;

    /**
     * Initializes the SPL autoloader, the class constructor.
     *
     * @param string $directory Location of where to load.
     */
    public function __construct($directory)
    {
        /**
         * Ensure a trailing slash always exists.
         */
        $this->_directory = rtrim($directory, '/') . '/';

        /**
         * Sets the variable for use in identifying if the
         * autoload queue is already running to prevent any
         * collisions when running the darkstarSDK autoloader.
         */
        $loaded = spl_autoload_functions();

        /**
         * Generates the classname w/o the namespace.
         */
        $this->_className = explode('\\', __CLASS__);
        $this->_className = end($this->_className);

        /**
         * Checks if an array exists of any registered __autoload
         * functions exist. If so, load those first.
         */
        if (is_array($loaded))
        {
            if (in_array('__autoload', $loaded))
            {
               spl_autoload_register('__autoload');
            }
        }

        /**
         * Otherwise run the class method of autoloading the application
         * libraries and classes.
         */
        spl_autoload_register(array($this, '_autoload'));
    }

    private function _autoload($class)
    {

        // Ensures this is only running once.
        if ($this->_isLoaded == true)
        {
            return;
        }

        // Run the iterator as there is no loader running.
        $this->_iterate($this->_directory);

        // Now the loader is flagged as running.
        $this->_isLoaded = true;
    }

    /**
     * Loops through the directory being called.
     *
     * @param $directory
     * @TODO Remove the nested statements and elseif controls
     *
     */
    private function _iterate($directory)
    {
        // create the iterator object
        $iterator = new \DirectoryIterator($directory);

        // loop through the files in the directories called
        foreach ($iterator as $file)
        {
            // require the files
            if ($file->isFile())
            {
                // do not include the classname (autoload)
                if ($file->getFilename() == strtolower($this->_className) . '.php')
                {
                    continue;
                }
                else
                {
                    // requires the files and ensures they are PHP only.
                    $_file = pathinfo($directory . '/' . $file->getFilename());

                    // checks the files extension
                    if ($_file['extension'] == 'php')
                    {
                        require_once $directory . '/' . $file->getFilename();
                    }
                }
            }
            elseif ($file->isDir() && !$file->isDot())
            {
                // iterates the subdirectory
                $this->_iterate($file->getPathname());
            }
        }
    }
}