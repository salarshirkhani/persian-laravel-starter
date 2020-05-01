<div class="form-group col-6 col-md-2">
    <div class="custom-control custom-checkbox">
        <input type="radio" class="custom-control-input normal-answer" id="q{{ $number }}_o{{ $choice }}" name="{{ $number }}" value="{{ $choice }}" @if($selected) checked="checked" @endif>
        <label class="custom-control-label" for="q{{ $number }}_o{{ $choice }}">گزینه {{ $choice }}</label>
    </div>
</div>
