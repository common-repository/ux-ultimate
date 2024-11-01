<div id="{{$content->_id}}" class="mt-[117px] uxu-relative uxu_image_accordion_holder_item uxu-overflow-hidden uxu-bg-center uxu-bg-cover" style="background-image: url({{$content->id_image ? wp_get_attachment_image_url($content->id_image, 'full') : ''}})">
    <div class="uxu_image_acc_overlay uxu-h-full  bg-no-repeat hover:uxu-from-black hover:uxu-bg-gradient-to-t">
        <div class="hover:-uxu-translate-y-3 uxu-duration-500 uxu-transition-all uxu_image_acc_overlay_inner uxu-flex uxu-flex-col uxu-justify-center uxu-items-center uxu-p-4 uxu-text-center uxu-h-full">
            <div class="">
            {!! do_shortcode($value) !!}
            </div>
        </div>
    </div>
</div>
<style>
    #{{$content->_id}} {
        border-radius: {{$content->radius}};
    }
</style>