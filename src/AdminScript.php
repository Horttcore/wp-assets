<?php
/**
 * Admin Script Component.
 *
 * This file handles registrationing and enqueing of script files in the editor
 *
 * @see       https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 *
 * @license   GPL-2.0+
 */

namespace Horttcore\Assets;

class AdminScript extends Script
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'admin_enqueue_scripts';
}
