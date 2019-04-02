<?php
/**
 * Script component
 *
 * This file handles registrationing and enqueing of script files
 *
 * @package WpAssets
 * @author  Ralf Hortt <me@horttcore.de>
 * @license GPL-3.0+ https://www.gnu.de/documents/gpl-3.0.de.html
 * @link    https://github.com/Horttcore/wp-assets
 * @see     https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
namespace Horttcore\WpAssets;


/**
 * Script Asset handler
 */
class Script extends Asset
{


    /**
     * Class constructor
     *
     * @param string $handle       Handler
     * @param string $source       URI to script file; absolute or relative to theme folder
     * @param array  $dependencies Script dependencies
     * @param string $version      Version string; leave empty for cache busting
     * @param bool   $inFooter     Should the script be loaded in footer; default is false
     * @param bool   $autoload     Should the script be auto loaded; default ist true
     *
     * @return void
     */
    public function __construct( string $handle, string $source, array $dependencies = [], string $version = true, bool $inFooter = false, bool $autoload = true )
    {
        $this->handle = $handle;
        $this->source = $source;
        $this->dependencies = $dependencies;
        $this->version = $version;
        $this->inFooter = $inFooter;
        $this->autoload = $autoload;
    }


    /**
     * Enqueue script
     *
     * @return void
     */
    public function enqueue()
    {
        \wp_enqueue_script($this->handle);
    }


    /**
     * Setup WordPress hooks
     *
     * @return void
     */
    public function init()
    {
        \add_action('wp_enqueue_scripts', [$this, 'register']);

        if ($this->autoload) {
            \add_action('wp_enqueue_scripts', [$this, 'enqueue']);
        }
    }


    /**
     * Register script
     *
     * @return void
     */
    public function register()
    {
        \wp_register_script($this->handle, $this->locateSource(), $this->dependencies, $this->version(), $this->inFooter);
    }


}
