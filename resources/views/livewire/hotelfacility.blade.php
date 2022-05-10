<div class="container">
    <div class="row my-3">
        @foreach ($facility as $data)
            <x-medium-cards>
                <x-slot name="img">
                    {{ Storage::url($data->img) }}
                </x-slot>
                <x-slot name="alt">
                    {{ $data->name }}
                </x-slot>
                <x-slot name="title">
                    {{ $data->name }}
                </x-slot>
                <x-slot name="desc">
                    {{ $data->description }}
                </x-slot>
            </x-medium-cards>
        @endforeach
    </div>
    <div class="col-sm-2 m-auto">
        {{ $facility->links() }}
    </div>
</div>
