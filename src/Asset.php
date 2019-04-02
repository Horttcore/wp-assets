<?php
/**
 * Assets base component
 *
 * This file handles registrationing and enqueing of style files
 *
 * @package   Horttcore
 * @see       https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @license   MIT
 */

namespace Horttcore\WpAssets;


/**
 *
 */
abstract class Asset
{


    /**
     * Style handle
     *
     * @var string
     */
    protected $handle;


    /**
     * Source URL
     *
     * Use relative or absolute url
     * relative url are starting in theme folder
     *
     * @var string
     */
    protected $source;


    /**
     * Style dependencies
     *
     * List of style handlers
     *
     * @var array
     */
    protected $dependencies = [];


    /**
     * Style version
     *
     * @var mixed
     *          - string for explicit version
     *          - bool:true for dynamic cache bustin
     *          - bool:false for default behaviour
     */
    protected $version = '';


    /**
     * Style autoload
     *
     * @var bool Should the style autoload
     *           Default is true
     */
    protected $autoload = true;


    /**
     * Enqueue style
     *
     * @return void
     */
    abstract public function enqueue();


    /**
     * Setup WordPress hooks
     *
     * @return void
     */
    abstract public function init();


    /**
     * Check for external script
     *
     * @return return type
     */
    protected function isExternal()
    {
        return (
            substr($this->source, 0, 2) == '//' ||
            substr($this->source, 0, 7) == 'http://' ||
            substr($this->source, 0, 8) == 'https://'
        ) ? true : false;
    }


    /**
     * Locate source
     *
     * @return string Source URI
     */
    protected function locateSource()
    {
        return $this->isExternal() ? $this->source : \get_stylesheet_directory_uri() . $this->source;
    }


    /**
     * Register style
     *
     * @return void
     */
    abstract public function register();


    /**
     * Get source version
     *
     * @return string Version string
     */
    public function version()
    {
        if ($this->isExternal()) {
            return $this->version;
        }

        if (!$this->version || ! \is_readable($this->source)) {
            return false;
        }

        return filemtime(\get_stylesheet_directory() . $this->source);
    }


}
