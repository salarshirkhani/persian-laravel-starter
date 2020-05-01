<div class="form-group">
    <label for="input_{{ $name }}">{{ $label }}</label>
    <select id="input_{{ $name }}" name="{{ $name }}@isset($multiple)[]@endisset" @if(($disabled ?? false))disabled @endif class="form-control @isset($class) {{ $class }} @endisset" @isset($multiple) multiple @endisset>
        @foreach($options as $key => $text)
        <option value="{{ $key }}" @if((isset($multiple) && in_array($key, $selecteds ?? [])) || (!isset($multiple) && ($key == old($name) || $key == ($value ?? null)))) selected @endif>{{ $text }}</option>
        @endforeach
    </select>
</div>
