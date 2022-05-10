<div class="col-md-6 my-1">
    <div class="bg-light hover p-3 shadow rounded">
        @if (isset($link))
            <a href="{{ $link }}" class="text-dark">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{!! $img !!}" alt="{{ $alt }}" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h4>
                            {{ $title }}
                        </h4>
                        <p>
                            {{ isset($desc) ? $desc : '' }}
                        </p>
                    </div>
                </div>
            </a>
        @else
            <div class="row">
                <div class="col-md-6">
                    <img src="{!! $img !!}" alt="{{ $alt }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h4>
                        {{ $title }}
                    </h4>
                    <p>
                        {{ isset($desc) ? $desc : '' }}
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>
