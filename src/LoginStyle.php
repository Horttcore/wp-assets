<?php
/**
 * Admin Style component.
 *
 * This file handles registrationing and enqueing of style files
 *
 * @see       https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 *
 * @license   GPL-2.0+
 */

namespace Horttcore\Assets;

class LoginStyle extends Style
{
    /**
     * Where should the assets be registered.
     *
     * @var string Hook to register
     */
    protected $hook = 'login_enqueue_scripts';
}
