<?php
/**
 * Inline script.
 *
 * Adding inline scripts
 *
 * @see       https://developer.wordpress.org/reference/functions/addInlineScript/
 *
 * @license   GPL-2.0+
 */

namespace RalfHortt\Assets;

class InlineScript
{
    protected $handle;
    protected $data;
    protected $position;

    public function __construct(string $handle, string $data, bool $position = true)
    {
        $this->handle = $handle;
        $this->data = $data;
        $this->position = !$position ? 'before' : 'after';
    }

    public function register(): void
    {
        \add_action('wp_enqueue_scripts', [$this, 'addInlineScript']);
    }

    public function addInlineScript(): void
    {
        \wp_add_inline_script($this->handle, $this->data, $this->position);
    }
}
