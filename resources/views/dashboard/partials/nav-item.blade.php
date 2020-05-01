<li class="nav-item">
    @if(isset($route))
    <a href="{{ route($route) }}" class="nav-link @if(Route::current()->getName() == $route) active @endif">
    @else
    <span class="nav-link">
    @endif
        <i class="nav-icon fas fa-{{ $icon }}"></i>
        <p>
            {{ $title }}
            @isset($badge)
            <span class="right badge badge-{{ $badge->type }}">{{ $badge->title }}</span>
            @endisset
        </p>
    @if(isset($route))
    </a>
    @else
    </span>
    @endif
</li>
