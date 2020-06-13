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

    public function products(Request $request) {
        $data = $request->validate([
            'category' => 'sometimes|exists:categories,id',
            'sort' => 'sometimes|in:created_at',
            'order' => 'required_with:sort|in:asc,desc',
        ]);
        $category = Category::find($data['category'] ?? null);
        $products = Product::with('category');
        $services = Service::with('category');
        if ($category != null) {
            $products = $products->where('category_id', $category->id);
            $services = $services->where('category_id', $category->id);
        }
        $items = $products->get()
            ->merge($services->get())
            ->sortBy($data['sort'] ?? 'created_at', SORT_REGULAR, ($data['order'] ?? 'desc') == 'desc')
            ->paginate(5)
            ->appends($data);
        $categories = Category::whereIn('type', ['product', 'service'])->get();
        return view('products.index', [
            'items' => $items,
            'categories' => $categories,
            'categoryTypes' => [
                'product' => 'محصولات',
                'service' => 'خدمات',
            ],
            'sorts' => [
                'جدیدترین‌ها' => [
                    'sort' => 'created_at',
                    'order' => 'desc',
                ],
                'قدیمی‌ترین‌ها' => [
                    'sort' => 'created_at',
                    'order' => 'asc',
                ],
            ],
        ]);
    }
}
