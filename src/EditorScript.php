<?php
/**
 * Editor Script Component
 *
 * This file handles registrationing and enqueing of script files in the editor
 *
 * @package   horttcore/wp-assets
 * @see       https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 * @license   GPL-2.0+
 */

namespace Horttcore\Assets;

/**
 *
 */
class EditorScript extends Script
{
    /**
     * Where should the assets be registered
     *
     * @var string $hook Hook to register
     */
    protected $hook = 'enqueue_block_editor_assets';
}
