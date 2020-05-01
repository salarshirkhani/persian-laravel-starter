<div class="form-group row short-question">
    <div class="col-6">
        <h5 class="text-center">یکان</h5>
    @for ($i = 0; $i < 10; $i ++)
        <div class="custom-control custom-checkbox">
            <input type="radio" class="custom-control-input short-answer" data-question="{{ $number }}"
                   data-type="units" name="{{ $number }}_units" id="{{ $number }}_units_{{ $i }}" value="{{ $i }}"
                   @if($selected != -1 && $selected % 10 == $i) checked="checked" @endif>
            <label class="custom-control-label" for="{{ $number }}_units_{{ $i }}">{{ $i }}</label>
        </div>
    @endfor
    </div>
    <div class="col-6">
        <h5 class="text-center">دهگان</h5>
    @for ($i = 0; $i < 10; $i ++)
        <div class="custom-control custom-checkbox">
            <input type="radio" class="custom-control-input short-answer" data-question="{{ $number }}"
                   data-type="tens" name="{{ $number }}_tens" id="{{ $number }}_tens_{{ $i }}" value="{{ $i }}"
                   @if($selected != -1 && floor($selected / 10) % 10 == $i) checked="checked" @endif>
            <label class="custom-control-label" for="{{ $number }}_tens_{{ $i }}">{{ $i }}</label>
        </div>
    @endfor
    </div>
    <div class="col-12">
        <div class="custom-control custom-checkbox">
            <input type="radio" class="custom-control-input short-answer unchecked-answer" data-question="{{ $number }}"
                   data-type="unchecked" name="{{ $number }}_unchecked" id="{{ $number }}_unchecked" value="-1"
                   @if($selected == -1) checked="checked" @endif>
            <label class="custom-control-label" for="{{ $number }}_unchecked">سوال نزده</label>
        </div>
    </div>
    <input type="hidden" name="{{ $number }}" value="{{ $selected }}">
</div>
