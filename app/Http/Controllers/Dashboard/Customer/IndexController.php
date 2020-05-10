<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Category;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function get() {
        return view('dashboard.customer.index', ['categories' => Category::all()]);
    }
}
