<div class="form-group">
    <label for="input_{{ $name }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" id="input_{{ $name }}" name="{{ $name }}" value="{{ old($name) ?? ($value ?? '') }}" @isset($min) min="{{ $min }}" @endisset @if(($disabled ?? false))disabled @endif class="form-control">
</div>
