<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class BreadcrumbItem extends Component
{
    public $title;
    public $route;
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $route
     * @param array $attributes
     */
    public function __construct($title, $route, array $attributes = [])
    {
        $this->title = $title;
        $this->route = $route;
        $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.breadcrumb-item');
    }
}
