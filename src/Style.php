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

namespace RalfHortt\Assets;

class Style extends Asset
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'wp_enqueue_scripts';

    /**
     * Define stylesheet media.
     *
     * @var string Media for stylesheet
     */
    protected $media = 'all';

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
    public function __construct(string $handle, string $source = '', array $dependencies = [], $version = true, bool $autoload = true, $media = 'all')
    {
        $this->handle = $handle;
        $this->source = $source;
        $this->dependencies = $dependencies;
        $this->version = $version;
        $this->autoload = $autoload;
        $this->media = $media;
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

        \wp_register_style($this->handle, $this->locateSource(), $this->dependencies, $this->version(), $this->media);
    }
}
