<div class="form-row">
    <div class="col-12">
        <label>{{ $label }}</label>
    </div>
    <div class="form-group col-12 col-sm-6">
        <div class="input-group">
            <input type="number" id="id_{{ $name }}_hour" name="{{ $name }}_hour" value="{{ old($name . '_hour') ?? ($hour ?? '') }}" @if(($disabled ?? false))disabled @endif min="0" max="23" class="form-control">
            <div class="input-group-append">
                <label class="input-group-text" for="id_{{ $name }}_hour">{{ __('ساعت و') }}</label>
            </div>
        </div>
    </div>
    <div class="form-group col-12 col-sm-6">
        <div class="input-group">
            <input type="number" id="id_{{ $name }}_minute" name="{{ $name }}_minute" value="{{ old($name . '_minute') ?? ($minute ?? '') }}" @if(($disabled ?? false))disabled @endif max="59" min="0" class="form-control">
            <div class="input-group-append">
                <label class="input-group-text" for="id_{{ $name }}_minute">{{ __('دقیقه') }}</label>
            </div>
        </div>
    </div>
</div>
