<?php
namespace UxUltimate\Plugin\Blocks;


use UxUltimate\Plugin\BlockInterface;
use UxUltimate\Plugin\Lib\Blade\Blade;

class PricingBoxV1 extends BlockInterface
{
    static string $identify = "pricing_box_v1";
    public function __construct(){
        $this->init();
    }

    public function identified(): string
    {
        return UXULTIMATE_PREFIX_SHORTCODE."_".self::$identify;
    }
    public function builder () : void {
        add_ux_builder_shortcode( $this->identified(), array(
            'type' => 'container',
            'name' => __( 'Pricing Box' ),
            'category' => __( 'UX Ultimate' ),
            'thumbnail' => UXULTIMATE_PUB_IMG_ELEMENT_ICON_URL. "sample_icon". ".png",
            'allow' => array(
                'text',
                'gap',
                'button',
            ),
            'options' => array(
                'title' => [
                    'type' => 'textfield',
                    'heading'    => 'Title',
                    'default'    => 'Basic',
                    'auto_focus' => true,
                ],
                'subtitle' => [
                    'type' => 'textfield',
                    'heading'    => 'Sub Title',
                    'default'    => 'Free trial 30 days.',
                    'auto_focus' => true,
                ],
                'price' => [
                    'type' => 'textfield',
                    'heading'    => 'Price',
                    'default'    => '49',
                    'auto_focus' => true,
                ],
                'currency' => [
                    'type' => 'textfield',
                    'heading'    => 'Currency',
                    'default'    => '$',
                    'auto_focus' => true,
                ],
                'price_position' => array(
                    'type'       => 'select',
                    'heading'    => 'Currency position',
                    'default'    => 'uxu_direction_default',
                    'options'    => array(
                        'uxu_direction_default'     => 'Before',
                        'uxu_direction_row_reverse' => 'After',
                    ),
                ),
                'time' => [
                    'type' => 'textfield',
                    'heading'    => 'Time',
                    'default'    => 'Billed Yearly',
                    'auto_focus' => true,
                ],
                'style' => [
                    'type'    => 'select',
                    'heading' => 'Background Type',
                    'default' => '',
                    'options' => array(
                        '' => 'None',
                        'v1'     => 'V1',
                        'v2'   => 'V2',
                        'v3'     => 'V3',
                    ),
                ],
                'link_options'     => require UXULTIMATE_FLATSOME_COMMONS . '/links.php',
                'button_text'     => [
                    'type' => 'textfield',
                    'heading'    => 'Button Text',
                    'default'    => 'Get started',
                    'auto_focus' => true,
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
            '_id' => 'title-'.rand(),
            'title' => 'Basic',
            'subtitle' => 'Free trial 30 days.',
            'price' => '49',
            'currency' => '$',
            'time' => 'Billed Yearly',
            'style' => 'v1',
            'link' => '#',
            'price_position' => 'uxu_direction_default',
            'button_text' => 'Get started',
            'class' => '',
            'visibility' => '',
        ), $atts );
        return $data;
    }


}