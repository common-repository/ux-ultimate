<div id="{{$content->_id}}">
    <a href="{{$content->link}}" class=" uxu-block-text-marquee uxu-m-content {{$content->class}} {{$content->visibility}}">
        <div class="uxu-m-text uxu-text--original">
            <span class="uxu-m-text-item">{{$content->text}}</span>
            <span class="uxu-m-text-item">{{$content->text}}</span>
        </div>
        <div class="uxu-m-text uxu-text--copy">
            <span class="uxu-m-text-item">{{$content->text}}</span>
            <span class="uxu-m-text-item">{{$content->text}}</span>
        </div>
    </a>
</div>
<style>
    #{{$content->_id}} .uxu-block-text-marquee {
        font-size: {{$content->size}}%;
    }
    #{{$content->_id}} .uxu-block-text-marquee .uxu-m-text-item {
        color: {{$content->color}};
        font-size: 11em;
        line-height: 1em;
        padding-left: 50px;
        padding-right: 50px;
    }


    #{{$content->_id}} .uxu-block-text-marquee .uxu-m-text.uxu-text--original {
        animation: uxu-blocks-move-horizontal-normal-text-marquee {{$content->speed}}s linear infinite
    }
    #{{$content->_id}} .uxu-block-text-marquee .uxu-m-text.uxu-text--copy {
        animation: uxu-blocks-move-horizontal-normal-text-marquee-copy {{$content->speed}}s linear infinite;
    }

    @if(!empty($content->size__md))
        @media only screen and (max-width: 768px)  {
            #{{$content->_id}} .uxu-block-text-marquee {
                font-size: {{$content->size__md}}% !important;
            }
        }
    @endif
    @if(!empty($content->speed__md))
        @media only screen and (max-width: 768px) {
            #{{$content->_id}} .uxu-block-text-marquee .uxu-m-text.uxu-text--original {
                animation: uxu-blocks-move-horizontal-normal-text-marquee {{$content->speed__md}}s linear infinite
            }

            #{{$content->_id}} .uxu-block-text-marquee .uxu-m-text.uxu-text--copy {
                animation: uxu-blocks-move-horizontal-normal-text-marquee-copy {{$content->speed__md}}s linear infinite;
            }
        }
    @endif

    @if(!empty($content->size__sm))
        @media only screen and (max-width: 768px)  {
            #{{$content->_id}} .uxu-block-text-marquee {
                font-size: {{$content->size__md}}% !important;
            }
        }
    @endif
     @if(!empty($content->speed__sm))
        @media only screen and (max-width: 550px) {
            #{{$content->_id}} .uxu-block-text-marquee .uxu-m-text.uxu-text--original {
                animation: uxu-blocks-move-horizontal-normal-text-marquee {{$content->speed__sm}}s linear infinite
            }

            #{{$content->_id}} .uxu-block-text-marquee .uxu-m-text.uxu-text--copy {
                animation: uxu-blocks-move-horizontal-normal-text-marquee-copy {{$content->speed__sm}}s linear infinite;
            }
        }
    @endif
</style>