<?php
namespace UxUltimate\Plugin\Blocks;


use UxUltimate\Plugin\BlockInterface;
use UxUltimate\Plugin\Lib\Blade\Blade;

class BeforeAfter extends BlockInterface
{
    static string $identify = "before_after_v1";
    public function __construct(){
        $this->init();
    }

    public function identified(): string
    {
        return UXULTIMATE_PREFIX_SHORTCODE."_". self::$identify;
    }
    public function builder () : void {
        add_ux_builder_shortcode( $this->identified(), array(
            'name' => __( 'Before After' ),
            'category' => __( 'UX Ultimate' ),
            'thumbnail' => UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL. "sample_icon". ".png",
            'options' => array(
                'id_image_before' => array(
                    'type' => 'image',
                    'heading' => __('Image Before'),
                    'default' => ''
                ),
                'id_image_before' => array(
                    'type' => 'image',
                    'heading' => __('Image Before'),
                    'default' => ''
                ),
                'height' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Image Height' ),
                    'default' => 300,
                    'unit'    => '%',
                    'min'     => 20,
                    'max'     => 700,
                    'step'    => 1,
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
            'height' => 300,
            'id_image' => null,
            'blob_type' => 'uxu-type-blob-1',
            'gradient_type' => null,
            'class' => '',
            'visibility' => '',
        ), $atts );
        return $data;
    }


}