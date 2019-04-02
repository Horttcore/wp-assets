<?php
/**
 * Style component
 *
 * This file handles registrationing and enqueing of style files
 *
 * @package WpAssets
 * @license MIT
 * @see     https://developer.wordpress.org/reference/hooks/enqueue_block_editor_assets/
 */

namespace Horttcore\WpAssets;



/**
 * Editor style handler
 */
class EditorStyle extends Style
{

    /**
     * Setup WordPress hooks
     *
     * @return void
     */
    public function init()
    {
        \add_action('enqueue_block_editor_assets', [$this, 'register']);

        if (!$this->autoload) {
            return;
        }

        \add_action('enqueue_block_editor_assets', [$this, 'enqueue']);
    }

}
