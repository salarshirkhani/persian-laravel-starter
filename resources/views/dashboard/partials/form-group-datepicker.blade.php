<div class="form-group">
    <label for="input_{{ $name }}">{{ $label }}</label>
    <input type="text" id="input_{{ $name }}" value="{{ old($name) ?? ($value ?? '') }}" @if(($disabled ?? false))disabled @endif class="form-control">
    <input type="text" id="input_{{ $name }}_raw" name="{{ $name }}" style="display: none">
</div>
