<div id="{{$content->_id}}">
    <h3 class="uxu-m-text uxu-typeout {{$content->class}}">
        {{$content->text}}
        <span class="uxu-typeout-holder">

        </span>
    </h3>
</div>

<script>
    jQuery(document).ready(() => {
        let typed = new Typed('#{{$content->_id}} .uxu-typeout-holder', {
            strings: ['', '{{$content->text_typeout}}'],
            loop: true,
            typeSpeed: 200,
            cursorChar: ' | '
        });
    })
</script>

<style>
    #{{$content->_id}} {
        font-size: {{$content->size}}%;
    }

    #{{$content->_id}} .uxu-typeout {
        font-size: 1em;
        color: {{$content->color}};
    }

    #{{$content->_id}} .typed-cursor {
        color: {{$content->typed_cursor}} !important;
    }

    @if(!empty($content->size__md))
    @media only screen and (max-width: 768px)  {
        #{{$content->_id}} .uxu-typeout {
            font-size: {{$content->size__md}}% !important;
        }
        }
    @endif

    @if(!empty($content->size__sm))
            @media only screen and (max-width: 768px)  {
        #{{$content->_id}} .uxu-typeout {
            font-size: {{$content->size__sm}}% !important;
        }
        }
    @endif
</style>