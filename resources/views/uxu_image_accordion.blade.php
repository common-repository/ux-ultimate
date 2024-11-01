<div class="uxu_image_accordion" id="{{$content->_id}}">
    <div class="uxu_image_accordion_holder_parent uxu-flex {{$content->direction}} {{$content->gap}}" style="height: {{$content->height}}px">
        {!! do_shortcode($value) !!}
    </div>
</div>
<style>
    #{{$content->_id}} .uxu_image_accordion_holder_item {
        flex: 1;
    }
    #{{$content->_id}} .uxu_image_accordion_holder_item:hover {
        flex: 2 !important;
    }

    #{{$content->_id}} .uxu_image_accordion_holder_item {
        transition: 1s flex;
    }


     @if(!empty($content->show_hover))
        #{{$content->_id}} .uxu_image_accordion_holder_item .uxu_image_acc_overlay_inner {
            display: none;
         }
        #{{$content->_id}} .uxu_image_accordion_holder_item:hover .uxu_image_acc_overlay_inner {
            display: flex !important;
        }
    @endif

        @media screen and (max-width:{{$content->responsive}}px){
            .uxu_image_accordion_holder_parent {
                flex-direction: column !important;
            }
        }
</style>