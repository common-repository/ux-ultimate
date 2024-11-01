<div id="{{$content->_id}}">
    <div class="uxu-shortcode uxu-m  uxu-dropcaps">
        <span class="uxu-m-letter {{$content->letter_class}}">{{$content->letter}} </span>
        <p class="uxu-m-text text-{{$content->paragraph_align}}">
            {{$content->paragraph}}
        </p>
    </div>
</div>


<style>
    #{{$content->_id}} .uxu-dropcaps .uxu-m-letter {
        font-size: 3.12em;
        color: {{$content->color}};
        width: {{$content->width}}px;
        height: {{$content->height}}px;
        background-color: {{$content->background}};
        border-radius: {{$content->radius}};
        margin: {{$content->margin}};
        padding: {{$content->padding}};
    }

    #{{$content->_id}}  .uxu-dropcaps .uxu-m-letter {
        float: left;
        line-height: 1em;
        width: {{$content->width}}px;
        height: {{$content->height}}px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    #{{$content->_id}}  .uxu-dropcaps .uxu-m-text {
        padding: {{$content->paragraph_padding}};
        font-size: 1em;
    }
    #{{$content->_id}}  .uxu-dropcaps {
        font-size: {{$content->size}}%;
    }

    @if(!empty($content->size__md))
        @media only screen and (max-width: 768px)  {
        #{{$content->_id}} .uxu-dropcaps {
            font-size: {{$content->size__md}}% !important;
        }
    }
    @endif

    @if(!empty($content->size__sm))
        @media only screen and (max-width: 768px)  {
            #{{$content->_id}} .uxu-dropcaps {
                font-size: {{$content->size__sm}}% !important;
            }
        }
    @endif


</style>

