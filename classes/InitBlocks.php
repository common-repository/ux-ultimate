<?php
namespace UxUltimate\Plugin;

use UxUltimate\Plugin\Blocks\BlobImage;
use UxUltimate\Plugin\Blocks\DropCapsV1;
use UxUltimate\Plugin\Blocks\ImageAccordionItem;
use UxUltimate\Plugin\Blocks\MarqueeTextV1;
use UxUltimate\Plugin\Blocks\PricingBoxV1;
use UxUltimate\Plugin\Blocks\TypeoutTextV1;
use UxUltimate\Plugin\Blocks\ImageAccordion;

class InitBlocks {
    public function __construct(){
        new PricingBoxV1();
        new MarqueeTextV1();
        new DropCapsV1();
        new TypeoutTextV1();
        new ImageAccordion();
        new ImageAccordionItem();
        new BlobImage();
    }
}