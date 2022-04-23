@if (Session::get('msg'))
    <div data-msg class="bg-{{ Session::get('msg')[0] }} text-center text-white">
        {{ Session::get('msg')[1] }}
    </div>
@endif
