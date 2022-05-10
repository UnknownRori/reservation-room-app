<div>
    <div class="container">
        <div class="my-2">
            <div class="container shadow row rounded bg-light p-3">
                <div class="col-md-6">
                    <img src="{{ Storage::url($room->img) }}" alt="{{ $room->name }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2>{{ $room->name }}</h2>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non deserunt debitis, repellat quidem
                        similique aliquam perspiciatis corporis architecto voluptates? Accusantium optio excepturi
                        dignissimos obcaecati non illo eaque architecto saepe? Voluptas.
                    </p>
                </div>
            </div>
        </div>
        <div class="my-2">
            <h3 class="text-center">Facilities</h3>
        </div>
        <div class="row my-2">
            @foreach ($room->RoomFacility as $data)
                <x-medium-cards>
                    <x-slot name="img">{{ Storage::url($data->img) }}</x-slot>
                    <x-slot name="alt">{{ $data->name }}</x-slot>
                    <x-slot name="title">{{ $data->name }}</x-slot>
                    <x-slot name="desc">{{ $data->description }}</x-slot>
                </x-medium-cards>
            @endforeach
        </div>
    </div>
</div>
