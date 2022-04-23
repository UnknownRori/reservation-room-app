<div class="col-md-6">
    <div class="bg-light hover p-3 shadow">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $img }}" alt="{{ $alt }}" class="img-fluid">
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
    </div>
</div>
