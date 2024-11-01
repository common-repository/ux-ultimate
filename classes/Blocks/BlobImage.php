<?php
namespace UxUltimate\Plugin\Blocks;


use UxUltimate\Plugin\BlockInterface;
use UxUltimate\Plugin\Lib\Blade\Blade;

class BlobImage extends BlockInterface
{
    static string $identify = "blob_image_v1";
    public function __construct(){
        $this->init();
    }

    public function identified(): string
    {
        return UXULTIMATE_PREFIX_SHORTCODE."_". self::$identify;
    }
    public function builder () : void {
        add_ux_builder_shortcode( $this->identified(), array(
            'name' => __( 'Blob Image' ),
            'category' => __( 'UX Ultimate' ),
            'thumbnail' => UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL. "sample_icon". ".png",
            'allow' => array(
                'text',
                'gap',
                'button',
            ),
            'options' => array(
                'id_image' => array(
                    'type' => 'image',
                    'heading' => __('Image'),
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
                    'responsive' => true
                ),
                'blob_type' => [
                    'type'    => 'select',
                    'heading' => 'Shape Type',
                    'default' => 'uxu-type-blob-1',
                    'options' => require( UXULTIMATE_CONFIG_DIR . '/blob-path.php' ),
                ],
                'gradient_type' => [
                    'type'    => 'select',
                    'heading' => 'Color Type',
                    'default' => 'uxu-type-blob-1',
                    'options' => require( UXULTIMATE_CONFIG_DIR . '/gradient.php' ),
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