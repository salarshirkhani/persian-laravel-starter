<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function get() {
        return view('dashboard.owner.index');
    }
}
