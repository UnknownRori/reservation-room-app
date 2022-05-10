@extends('Layouts.app')
@section('title', 'Home')
@section('content')
    <div class="background col-12" style="min-height: 300px; position: absolute; z-index: -1;"></div>
    <div class="container d-flex items-center" style="min-height: 300px;">
        <div class="m-auto text-center text-white">
            <h4>Order the room now!</h4>
            <a href="{{ Auth::check() ? '#orders' : route('login') }}" class="btn btn-primary">Order Room</a>
        </div>
    </div>
    <div class="container my-2">
        <article class="my-3">
            <h2 class="text-center">Schmhotel</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem odit reiciendis numquam consequatur magni
                earum
                mollitia, incidunt ducimus suscipit culpa similique iure dolorum dolorem pariatur accusantium repellendus
                quisquam! Distinctio, ex.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit dicta ea cumque ut iure in numquam
                distinctio consectetur fugiat saepe tempora, adipisci repudiandae velit quia, ab illum nesciunt. Adipisci,
                ipsum.
            </p>
        </article>
        <div class="row container my-2">
            <x-medium-cards>
                <x-slot name="img">
                    {{ asset('img/bed-gf61b3676d_1280.jpg') }}
                </x-slot>
                <x-slot name="alt">
                    Best Bed
                </x-slot>
                <x-slot name="title">
                    Lorem Ipsum
                </x-slot>
                <x-slot name="desc">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident laboriosam reiciendis aut nam
                    molestiae nesciunt similique tempore, placeat vel, commodi quam neque, nostrum vitae repellendus velit
                    laudantium fuga sapiente ea?
                </x-slot>
            </x-medium-cards>

            <x-medium-cards>
                <x-slot name="img">
                    {{ asset('img/bedroom-gb0345b26b_1280.jpg') }}
                </x-slot>
                <x-slot name="alt">
                    Best Room
                </x-slot>
                <x-slot name="title">
                    Lorem Ipsum
                </x-slot>
                <x-slot name="desc">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident laboriosam reiciendis aut nam
                    molestiae nesciunt similique tempore, placeat vel, commodi quam neque, nostrum vitae repellendus velit
                    laudantium fuga sapiente ea?
                </x-slot>
            </x-medium-cards>
        </div>
        @if (Auth::check())
            <div id="orders" class="col-md-8 m-auto my-3">
                @livewire('orders-form')
            </div>
        @endif
        <div class="row container my-3">
            <div class="col-sm-4 p-2 text-center">
                <span class="fa fa-globe" style="font-size: 4rem"></span>
                <p>International</p>
            </div>
            <div class="col-sm-4 p-2 text-center">
                <div class="">
                    <span class="fa fa-star" style="font-size: 4rem"></span>
                    <span class="fa fa-star" style="font-size: 4rem"></span>
                    <span class="fa fa-star" style="font-size: 4rem"></span>
                    <span class="fa fa-star" style="font-size: 4rem"></span>
                </div>
                <p>4 Star Hotel</p>
            </div>
            <div class="col-sm-4 p-2 text-center">
                <span class="fab fa-paypal" style="font-size: 4rem"></span>
                <p>Accept Paypal</p>
            </div>
        </div>
        <article class="my-3">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis animi asperiores at! Ipsa dolore quo
                cumque sequi laudantium deleniti in autem. Necessitatibus recusandae ad id praesentium! Dolorem blanditiis
                molestias iusto.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum quidem, rerum facere unde aut veritatis
                culpa, quam non sint, reiciendis ut minima quas totam quasi esse possimus quo pariatur quos!
            </p>
        </article>
    </div>
@endsection
