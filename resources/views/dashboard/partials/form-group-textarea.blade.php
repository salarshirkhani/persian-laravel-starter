<div class="form-group">
    <label for="input_{{ $name }}">{{ $label }}</label>
    <textarea id="input_{{ $name }}" name="{{ $name }}" rows="{{ $rows ?? 5 }}"@if(($disabled ?? false))disabled @endif class="form-control @isset($class) {{ $class }} @endisset">{{ old($name) ?? ($value ?? '') }}</textarea>
</div>
