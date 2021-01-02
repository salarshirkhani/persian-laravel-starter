<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Service;
use App\SliderItem;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index() {
        $items = Product::orderBy('created_at', 'desc')->limit(5)->get()
            ->merge(Service::orderBy('created_at', 'desc')->limit(5)->get())
            ->sortByDesc('created_at');
        return view('index', [
            'items' => $items,
            'sliderItems' => SliderItem::orderBy('priority', 'desc')->get(),
        ]);
    }


}
