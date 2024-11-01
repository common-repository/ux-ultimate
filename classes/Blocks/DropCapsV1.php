<?php
namespace UxUltimate\Plugin\Blocks;


use UxUltimate\Plugin\BlockInterface;
use UxUltimate\Plugin\Lib\Blade\Blade;

class DropCapsV1 extends BlockInterface
{
    static string $identify = "drop_caps_v1";
    static string $paragraph = 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
    public function __construct(){
        $this->init();
    }

    public function identified(): string
    {
        return UXULTIMATE_PREFIX_SHORTCODE."_". self::$identify;
    }
    public function builder () : void {
        add_ux_builder_shortcode( $this->identified(), array(
            'name' => __( 'Drop Caps' ),
            'category' => __( 'UX Ultimate' ),
            'thumbnail' => UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL. "sample_icon". ".png",
            'allow' => array(
                'text',
                'gap',
                'button',
            ),
            'options' => array(
                'letter_options'     => array(
                    'type'    => 'group',
                    'heading' => 'Letter Options',
                    'options' => array(
                        'letter' => [
                            'type' => 'textfield',
                            'heading'    => 'A Letter',
                            'default'    => 'L',
                            'auto_focus' => true,
                        ],
                        'color' => array(
                            'type'     => 'colorpicker',
                            'heading'  => __( 'Letter Color' ),
                            'format'   => 'rgb',
                            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
                        ),
                        'width' => [
                            'type'    => 'slider',
                            'heading' => __( 'Width Letter' ),
                            'default' => 45,
                            'unit'    => 'px',
                            'min'     => 10,
                            'max'     => 150,
                            'step'    => 1,
                        ],
                        'height' => [
                            'type'    => 'slider',
                            'heading' => __( 'Height Letter' ),
                            'default' => 45,
                            'unit'    => 'px',
                            'min'     => 10,
                            'max'     => 150,
                            'step'    => 1,
                        ],
                        'background' => array(
                            'type'     => 'colorpicker',
                            'heading'  => __( 'Background Color' ),
                            'format'   => 'rgb',
                            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
                        ),
                        'margin' => array(
                            'type' => 'margins',
                            'heading' => __('Margin'),
                            'full_width' => true,
                            'responsive' => true,
                            'default' => '',
                            'unit' => 'px',
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                        ),
                        'padding' => array(
                            'type' => 'margins',
                            'heading' => __('Padding'),
                            'full_width' => true,
                            'responsive' => true,
                            'default' => '',
                            'unit' => 'px',
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                        ),
                        'radius' => array(
                            'type' => 'margins',
                            'heading' => __('Radius'),
                            'full_width' => true,
                            'responsive' => true,
                            'default' => '',
                            'unit' => 'px',
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                        ),
                        'letter_class' => [
                            'type' => 'textfield',
                            'heading'    => 'Letter class css',
                            'default'    => '',
                            'auto_focus' => true,
                        ],
                    )
                ),
                'paragraph_options'     => array(
                    'type'    => 'group',
                    'heading' => 'Paragraph Options',
                    'options' => array(
                        'colorText' => array(
                            'type'     => 'colorpicker',
                            'heading'  => __( 'Paragraph Color' ),
                            'format'   => 'rgb',
                            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
                        ),
                        'paragraph' => [
                            'type' => 'textfield',
                            'heading'    => 'Paragraph',
                            'default'    => self::$paragraph,
                            'auto_focus' => true,
                        ],
                        'paragraph_align' => array(
                            'type' => 'radio-buttons',
                            'heading' => __('Paragraph Align'),
                            'default' => 'center',
                            'options' => require( UXULTIMATE_CONFIG_DIR . '/align-radios.php' ),
                        ),
                        'paragraph_padding' => array(
                            'type' => 'margins',
                            'heading' => __('Paragraph Padding'),
                            'full_width' => true,
                            'responsive' => true,
                            'default' => '20px',
                            'unit' => 'px',
                            'min' => 0,
                            'max' => 500,
                            'step' => 1,
                        ),
                    )
                ),
                'size' => array(
                    'type'    => 'slider',
                    'heading' => __( 'Font size' ),
                    'default' => 100,
                    'unit'    => '%',
                    'min'     => 20,
                    'max'     => 300,
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
            'letter' => 'L',
            'color'=> 'rgb(250, 205, 2)',
            'width' => 45,
            'height' => 45,
            'background' => '',
            'radius' => '0px 0px 0px 0px',
            'margin' => '16px 0px 0px 0px',
            'padding' => '20px 0px 0px 0px',
            'letter_class' => '',

            'paragraph' => self::$paragraph,
            'paragraph_align' => 'center',
            "paragraph_padding" => '20px 20px 20px 0px',
            "size" => 100,
            "size__md" => '',
            "size__sm" => '',
            'class' => '',
            'visibility' => '',
        ), $atts );
        return $data;
    }


}