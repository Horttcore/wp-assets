<?php
/**
 * Admin Style component
 *
 * This file handles registrationing and enqueing of style files
 *
 * @package   horttcore/wp-assets
 * @see       https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * @license   GPL-2.0+
 */

namespace Horttcore\Assets;

/**
 *
 */
class AdminStyle extends Style
{
    /**
     * Where should the assets be registered
     *
     * @var string $hook Hook to register
     */
    protected $hook = 'admin_print_styles';
}
