<li class="nav-item">
    @if(isset($route))
        <a href="{{ route($route) }}" class="nav-link @if(Route::current()->getName() == $route) active @endif">
    @else
        <span class="nav-link">
    @endif
        <i class="nav-icon {{ $icon }}"></i>
        <p>
            {{ $title }}
        </p>
    @if(isset($route))
        </a>
    @else
        </span>
    @endif
</li>
