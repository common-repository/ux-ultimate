<?php
namespace UxUltimate\Plugin\Blocks;


use UxUltimate\Plugin\BlockInterface;
use UxUltimate\Plugin\Lib\Blade\Blade;

class ImageAccordionItem extends BlockInterface
{
    static string $identify = "image_accordion_item";
    
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
            'name' => __( 'Image Accordion Item' ),
            'category' => __( 'UX Ultimate' ),
            'thumbnail' => UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL. "sample_icon". ".png",
            'require' => array( 'uxu_image_accordion' ),
            'allow' => array(
                'text',
                'gap',
                'button',
            ),
            'wrap'   => false,
            'options' => array(
                'id_image' => array(
                    'type' => 'image',
                    'heading' => __('Image'),
                    'default' => ''
                ),
                'radius' => array(
                    'type' => 'margins',
                    'heading' => __('Radius'),
                    'full_width' => true,
                    'default' => '20px',
                    'unit' => 'px',
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
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
            'id_image' => null,
            'radius' => "20px"
        ), $atts );
        return $data;
    }
}
