<?php
/**
 * Style component.
 *
 * This file handles registration and integration of style files
 *
 * @see       https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 *
 * @license   GPL-2.0+
 */

namespace Horttcore\Assets;

class Style extends Asset
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'wp_enqueue_scripts';

    /**
     * Class constructor.
     *
     * @param string $handle       Handler
     * @param string $source       URI to script file; absolute or relative to theme folder
     * @param array  $dependencies Script dependencies
     * @param string $version      Version string; leave empty for cache busting
     * @param bool   $autoload     Should the script be auto loaded; default ist true
     *
     * @return void
     */
    public function __construct(string $handle, string $source = '', array $dependencies = [], $version = true, bool $autoload = true)
    {
        $this->handle = $handle;
        $this->source = $source;
        $this->dependencies = $dependencies;
        $this->version = $version;
        $this->autoload = $autoload;
    }

    /**
     * Enqueue style.
     *
     * @return void
     */
    public function enqueueAsset(): void
    {
        \wp_enqueue_style($this->handle);
    }

    /**
     * Register style.
     *
     * @return void
     */
    public function registerAsset(): void
    {
        if ((bool) wp_styles()->query($this->handle, 'registered')) {
            return;
        }

        \wp_register_style($this->handle, $this->locateSource(), $this->dependencies, $this->version());
    }
}
