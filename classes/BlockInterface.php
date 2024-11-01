<?php
namespace UxUltimate\Plugin;

abstract class BlockInterface {
    static $key = 'post';
    abstract public function identified() : string;

    public function init() {

        add_action( 'ux_builder_setup', function () {
            $this->builder();
        });
        add_shortcode($this->identified(), [$this, "render"]);

    }

    abstract public function builder() : void;

    abstract public function render($atts, $content = null) : string;
}
