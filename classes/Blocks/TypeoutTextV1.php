<?php
namespace UxUltimate\Plugin\Blocks;


use UxUltimate\Plugin\BlockInterface;
use UxUltimate\Plugin\Lib\Blade\Blade;

class TypeoutTextV1 extends BlockInterface
{
    static string $identify = "typeout_text_v1";
    static string $paragraph = 'Lorem Ipsum is simply dummy text';
    public function __construct(){
        $this->init();
    }

    public function identified(): string
    {
        return UXULTIMATE_PREFIX_SHORTCODE."_". self::$identify;
    }

    public function builder () : void {
        add_ux_builder_shortcode( $this->identified(), array(
            'name' => __( 'Typeout Text' ),
            'category' => __( 'UX Ultimate' ),
            'thumbnail' => UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL. "sample_icon". ".png",
            'allow' => array(
                'text',
                'gap',
                'button',
            ),
            'scripts' => [
                self::$identify => UXULTIMATE_PUB_JS_URL . 'typed.js'
            ],
            'options' => array(
                'text' => [
                    'type' => 'textfield',
                    'heading'    => 'Text',
                    'default'    => 'Basic',
                    'auto_focus' => true,
                ],
                'text_typeout' => [
                    'type' => 'textfield',
                    'heading'    => 'Text Typeout',
                    'default'    => 'Free trial 30 days.',
                    'auto_focus' => true,
                ],
                'loop'    => array(
                    'type'       => 'radio-buttons',
                    'heading'    => __( 'Loop' ),
                    'default'    => 'true',
                    'options'    => array(
                        'true'     => array( 'title' => 'On' ),
                        'false' => array( 'title' => 'Off' ),
                    ),
                ),
                'speed' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Speed' ),
                    'default' => 200,
                    'unit'    => 'ms',
                    'min'     => 100,
                    'max'     => 1000,
                    'step'    => 100,
                ),
                'color' => array(
                    'type'     => 'colorpicker',
                    'heading'  => __( 'Color' ),
                    'format'   => 'rgb',
                    'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
                ),
                'typed_cursor' =>  array(
                    'type'     => 'colorpicker',
                    'heading'  => __( 'Cursor Color' ),
                    'format'   => 'rgb',
                    'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
                ),
                'size' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Font size' ),
                    'default' => 100,
                    'unit'    => '%',
                    'min'     => 20,
                    'max'     => 700,
                    'step'    => 1,
                    'responsive' => true
                ),
                'advanced_options' => require UXULTIMATE_FLATSOME_COMMONS . '/advanced.php',
            )
        ) );
    }

    public function render( $atts, $content = null ): string{
        return Blade::getInstance()->render($this->identified(), ["content" => (object) $this->extract($atts), "value" => $content]);
    }

    public function extract($atts) {
        $data = shortcode_atts( array(
            '_id' => $this->identified().rand(),
            'text' => 'Basic',
            'text_typeout' => 'Free trial 30 days.',
            'speed' => 200,
            'loop' => 'true',
            'class' => '',
            'size' => 100,
            'size__md' => '',
            'size__sm' => '',
            'typed_cursor' => '',
            'color' => '',
            'visibility' => '',
        ), $atts );
        return $data;
    }


}