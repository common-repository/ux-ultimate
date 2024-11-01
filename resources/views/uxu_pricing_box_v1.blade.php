
<div class="container mx-auto">
    <h1 class="uxu-text-4xl uxu-text-center uxu-font-bold">
        Hello world!
    </h1>
</div>


<div id="{{$content->_id}}" class="{{$content->visibility}} {{$content->class}} uxu-module-content uxu-price-table-container uxu-pricing-style-{{$content->style}}">
    <div class="uxu-price-table">
        <div class="uxu-price-table-header">
            <div class="uxu-pricing-heading-wrap">
                <div class="uxu-price-heading-text">
                    <h3 class="uxu-price-table-heading uxu-inline-editing">
                        {{$content->title}}
                    </h3>
                </div>
                <div class="uxu-price-subheading-text">
                    <p class="uxu-price-table-subheading uxu-inline-editing">
                        {{$content->subtitle}}
                    </p>
                </div>
            </div>
        </div>

        <div class="uxu-price-table-price-wrap">
            <div class="uxu-price-table-pricing">
                <div class="uxu-pricing-container">
                    <div class="uxu-pricing-value {{$content->price_position}}">

                        <span class="uxu-price-table-currency">{{$content->currency}}</span>

                        <span class="uxu-price-table-integer-part">{{$content->price}}</span>

                    </div>
                    <div class="uxu-pricing-duration">
                        <span class="uxu-price-table-duration uxu-price-typo-excluded uxu-inline-editing" >{{$content->time}}</span>							</div>
                </div>
            </div>
        </div>

        {!! $value !!}
        @if(!empty($content->button_text))
        <div class="uxu-price-table-cta">
            <div class="uxu-button-wrapper uxu-button-wrapper">
                <a class="uxu-button-link  uxu-button uxu-size-md" href="{{$content->link}}">
                    <span class="uxu-button-text uxu-inline-editing" data-uxu-setting-key="cta_text" data-uxu-inline-editing-toolbar="none">{{$content->button_text}}</span>
                    <span class="uxu-cta-link-icon uxu-cta-link-icon-after"></span>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    #{{$content->_id}}.uxu-pricing-style-v1{
        background-image: url({{UXULTIMATE_PUB_IMG_URL.'price1.jpeg'}});
    }
    #{{$content->_id}}.uxu-pricing-style-v2{
        background-image: url({{UXULTIMATE_PUB_IMG_URL.'price2.jpeg'}});
    }
    #{{$content->_id}}.uxu-pricing-style-v3{
        background-image: url({{UXULTIMATE_PUB_IMG_URL.'price3.jpeg'}});
    }
</style>