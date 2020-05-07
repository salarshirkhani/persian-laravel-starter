<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class SidebarItem extends Component
{
    public $title;
    public $route;
    public $icon;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $route
     * @param $icon
     */
    public function __construct($title, $route, $icon)
    {
        $this->title = $title;
        $this->route = $route;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.dashboard.sidebar-item');
    }
}
