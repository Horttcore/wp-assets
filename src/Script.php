<?php
/**
 * Script component.
 *
 * This file handles registration and integration of script files
 *
 * @see       https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 *
 * @license   GPL-2.0+
 */

namespace RalfHortt\Assets;

class Script extends Asset
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
     * @param string           $handle       Handler
     * @param string           $source       URI to script file; absolute or relative to theme folder
     * @param array            $dependencies Script dependencies
     * @param string|bool|null $version      Version string; leave empty for cache busting
     * @param bool             $deprecated   $inFooter Should the script be loaded in footer; default is false
     * @param bool             $autoload     Should the script be auto loaded; default ist true
     *
     * @return void
     */
    public function __construct(
        string $handle,
        string $source = '',
        array $dependencies = [],
        string|bool|null $version = null,
        bool $deprecated = false,
        bool $autoload = true
    ) {
        $this->handle = $handle;
        $this->source = $source;
        $this->dependencies = $dependencies;
        $this->version = $version;
        $this->autoload = $autoload;
    }

    /**
     * Enqueue script.
     *
     * @return void
     */
    public function enqueueAsset(): void
    {
        \wp_enqueue_script($this->handle);
    }

    /**
     * Register script.
     *
     * @return void
     */
    public function registerAsset(): void
    {
        if ((bool) wp_scripts()->query($this->handle, 'registered')) {
            return;
        }

        \wp_register_script($this->handle, $this->locateSource(), $this->dependencies, $this->version());
    }
}
