<div class="container">
    <div class="row my-3">
        @foreach ($roomtype as $data)
            <x-medium-cards>
                <x-slot name="link">{{ route('rooms.show', $data->name) }}</x-slot>
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas deleniti unde dolor magni,
                    reprehenderit itaque impedit, nisi vero minima amet omnis laudantium iure nulla esse nesciunt.
                    Facilis, dolorum? Deserunt, alias!
                </x-slot>
            </x-medium-cards>
        @endforeach
    </div>
    <div class="col-sm-2 m-auto">
        {{ $roomtype->links() }}
    </div>
</div>
