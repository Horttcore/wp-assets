<?php
/**
 * Editor Style Component.
 *
 * This file handles registrationing and enqueing of style files
 *
 * @see       https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 *
 * @license   GPL-2.0+
 */

namespace Horttcore\Assets;

class EditorStyle extends Style
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'enqueue_block_editor_assets';
}
