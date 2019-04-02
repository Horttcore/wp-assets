<?php
/**
 * Style component
 *
 * This file handles registrationing and enqueing of style files
 *
 * @package WpAssets
 * @license MIT
 * @see     https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */

namespace Horttcore\WpAssets;


/**
 * Style asset handler
 */
class Style extends Asset
{


    /**
     * Class constructor
     *
     * @param string $handle       Handler
     * @param string $source       URI to script file; absolute or relative to theme folder
     * @param array  $dependencies Script dependencies
     * @param string $version      Version string; leave empty for cache busting
     * @param bool   $autoload     Should the script be auto loaded; default ist true
     *
     * @return void
     */
    public function __construct(string $handle, string $source, array $dependencies = [], $version = true, bool $autoload = true)
    {
        $this->handle = $handle;
        $this->source = $source;
        $this->dependencies = $dependencies;
        $this->version = $version;
        $this->autoload = $autoload;
    }


    /**
     * Enqueue style
     *
     * @return void
     */
    public function enqueue()
    {
        \wp_enqueue_style($this->handle);
    }


    /**
     * Setup WordPress hooks
     *
     * @return void
     */
    public function init()
    {
        \add_action('wp_enqueue_styles', [$this, 'register']);

        if (!$this->autoload) {
            return;
        }

        \add_action('wp_enqueue_styles', [$this, 'enqueue']);
    }


    /**
     * Register style
     *
     * @return void
     */
    public function register()
    {
        \wp_register_style($this->handle, $this->locateSource(), $this->dependencies, $this->version());
    }


}
