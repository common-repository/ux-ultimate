<?php
namespace UxUltimate\Plugin\Blocks;


use UxUltimate\Plugin\BlockInterface;
use UxUltimate\Plugin\Lib\Blade\Blade;

class MarqueeTextV1 extends BlockInterface
{
    static $identify = "marquee_text_v1";
    public function __construct(){
        $this->init();
    }

    public function identified(): string
    {
        return UXULTIMATE_PREFIX_SHORTCODE."_". self::$identify;
    }
    public function builder () : void {
        add_ux_builder_shortcode( $this->identified(), array(
            'name' => __( 'Marquee Text' ),
            'category' => __( 'UX Ultimate' ),
            'thumbnail' => UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL. "sample_icon". ".png",
            'options' => array(
                'text' => [
                    'type' => 'textfield',
                    'heading'    => 'Text',
                    'default'    => 'Marquee Text',
                    'auto_focus' => true,
                ],
                'color' => array(
                    'type' => 'colorpicker',
                    'heading' => __('Text Color'),
                    'alpha' => true,
                    'format' => 'rgb',
                    'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
                ),
                'size' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Size' ),
                    'default' => 100,
                    'unit'    => '%',
                    'min'     => 20,
                    'max'     => 300,
                    'step'    => 1,
                    'responsive' => true
                ),
                'speed' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Speed' ),
                    'default' => 20,
                    'unit'    => '',
                    'min'     => 5,
                    'max'     => 50,
                    'step'    => 1,
                    'responsive' => true
                ),
                'link_options'     => require UXULTIMATE_FLATSOME_COMMONS . '/links.php',
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
            'text' => 'Marquee Text',
            'color' => 'rgba(236,236,236,1)',
            'size' => '100',
            'speed' => '5',
            'link' => '#',
            'class' => '',
            'visibility' => '',
            'size__md' => '',
            'speed__md' => '',
            'size__sm' => '',
            'speed__sm' => '',
        ), $atts );
        return $data;
    }


}