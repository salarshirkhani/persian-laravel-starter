<div class="form-group {{ $width }}">
    <label for="input_{{ $name }}">{{ $label }}</label>
    <select {{ $attributes->merge([
        'id' => "input_$name",
        'name' => $name,
        'class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : '')
    ]) }}>
        @foreach($options as $optValue => $optLabel)
            <option value="{{ $optValue }}" @if($optValue == $value) selected @endif>{{ $optLabel }}</option>
        @endforeach
    </select>
    @error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>
