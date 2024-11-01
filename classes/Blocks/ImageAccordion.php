<?php
namespace UxUltimate\Plugin\Blocks;


use UxUltimate\Plugin\BlockInterface;
use UxUltimate\Plugin\Lib\Blade\Blade;

class ImageAccordion extends BlockInterface
{
    static string $identify = "image_accordion";
    
    public function __construct(){
        $this->init();
    }

    public function identified(): string
    {
        return UXULTIMATE_PREFIX_SHORTCODE."_". self::$identify;
    }
    public function builder () : void {
        add_ux_builder_shortcode( $this->identified(), array(
            'type' => 'container',
            'name' => __( 'Image Accordion' ),
            'category' => __( 'UX Ultimate' ),
            'thumbnail' => UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL. "sample_icon". ".png",
            'allow' => array(
                'uxu_image_accordion_item',
            ),
            'options' => array(
                'height' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Height' ),
                    'default' => 550,
                    'unit'    => 'px',
                    'min'     => 300,
                    'max'     => 800,
                    'step'    => 20
                ),
                'direction' => [
                    'type'    => 'select',
                    'heading' => 'Direction',
                    'default' => 'uxu-flex-row',
                    'options' => array(
                        'uxu-flex-row' => 'Vertical',
                        'uxu-flex-col'     => 'Horizontal',
                    ),
                ],
                'show_hover' => [
                    'type'    => 'select',
                    'heading' => 'Show when hover image',
                    'default' => 1,
                    'options' => array(
                        1     => 'Yes',
                        0   => 'No',
                    ),
                ],
                'responsive' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Responsive Drop Column' ),
                    'default' => 700,
                    'unit'    => 'px',
                    'min'     => 330,
                    'max'     => 1200,
                    'step'    => 20
                ),
                'gap' => [
                    'type'    => 'select',
                    'heading' => 'Gap',
                    'default' => 'uxu-gap-8',
                    'options' => require( UXULTIMATE_CONFIG_DIR . '/gap.php' ),
                ],
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
            'direction' => 'uxu-flex-row',
            'height' => 550,
            'show_hover' => 'true',
            'responsive' => '700',
            'gap' => 'uxu-gap-8'
        ), $atts );
        return $data;
    }
}
