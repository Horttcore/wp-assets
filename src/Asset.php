<?php
/**
 * Assets base component
 *
 * This file handles registrationing and enqueing of asset files
 *
 * @package horttcore\wp-assets
 * @license GPL-2.0+
 */

namespace Horttcore\Assets;

/**
 *
 */
abstract class Asset
{

    /**
     * Where should the assets be registered
     *
     * @var string $hook Hook to register
     */
    protected $hook;

    /**
     * Conditional loading
     *
     * @var mixed<callable|string> A callable or Hook suffix
     */
    protected $condition = true;

    /**
     * Asset handle
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
     * Asset dependencies
     *
     * List of asset handlers
     *
     * @var array
     */
    protected $dependencies = [];

    /**
     * Asset version
     *
     * @var mixed
     *          - string for explicit version
     *          - bool:true for dynamic cache bustin
     *          - bool:false for default behaviour
     */
    protected $version = '';

    /**
     * Autoload
     *
     * @var bool Should the asset autoload
     *           Default is TRUE
     */
    protected $autoload = true;

    /**
     * Get asset path
     *
     * @return string Path to asset file
     **/
    public function getPath(): string
    {
        return \get_stylesheet_directory() . $this->source;
    }

    /**
     * Get asset URI
     *
     * @return string Get URI for asset file
     **/
    public function getUri(): string
    {
        return \get_stylesheet_directory_uri() . $this->source;
    }

    /**
     * Setup WordPress hooks
     *
     * @return void
     */
    public function register(): void
    {
        \add_action($this->hook, [$this, 'registerAsset']);

        if ($this->autoload) {
            \add_action($this->hook, [$this, 'enqueueAsset']);
        }
    }

    /**
     * Enqueue asset
     *
     * @return void
     */
    abstract public function enqueueAsset(): void;

    /**
     * Register asset
     *
     * @return void
     */
    abstract public function registerAsset(): void;

    /**
     * Is asset an external resource?
     *
     * @return bool
     */
    protected function isExternal(): bool
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
    protected function locateSource(): string
    {
        return $this->isExternal() ? $this->source : $this->getUri();
    }

    /**
     * Get source version
     *
     * @throws Exception
     * @return string Version string
     */
    public function version(): string
    {
        if ($this->isExternal()) {
            return $this->version;
        }

        if (!$this->version) {
            return null;
        }

        if (is_string($this->version)) {
            return $this->version;
        }

        if (!is_readable($this->getPath())) {
            throw new \Exception(sprintf('Asset %s not readable', $this->getPath()));
        }

        return filemtime($this->getPath());
    }

}
