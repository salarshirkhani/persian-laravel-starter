<div class="form-group">
    <div class="custom-file">
        <input @isset($accept) accept="{!! $accept !!}" @endisset name="{{ $name }}" type="file" class="custom-file-input" id="input_{{ $name }}">
        <label class="custom-file-label @if(isset($selected) && $selected) selected @endif" for="input_{{ $name }}">{{ $label }}</label>
    </div>
</div>
