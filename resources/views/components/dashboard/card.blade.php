<div {{ $attributes->merge(["class" => "card" . (!empty($type) ? " card-$type" : "")]) }}>
    @isset($top)
        {{ $top }}
    @endisset
    @isset($header)
        <div class="card-header">
            <h3 class="card-title">{{ $header }}</h3>
        </div>
    @endisset
    <div class="card-body">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
