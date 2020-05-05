<?php

namespace App\View\Components\Form;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class SelectGroup extends Input
{
    public $options;

    public function __construct($name, $label, $options, $width = null, $model = null, $defaultValue = null)
    {
        parent::__construct($name, $label, $width, $model, $defaultValue);
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.form.select-group');
    }
}
