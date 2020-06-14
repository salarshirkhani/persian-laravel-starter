<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Customer\SearchRequest;
use App\Keyword;
use App\Product;
use App\Service;
use Illuminate\Database\Eloquent\Builder;

class SearchController extends Controller
{
    public function search(SearchRequest $request) {
        $userQuery = $request->validated();
        /** @var \Eloquent $class */
        switch ($userQuery['type']) {
            case 'company':
                $class = Company::class;
                break;
            case 'product':
                $class = Product::class;
                break;
            case 'service':
                $class = Service::class;
                break;
            default:
                throw new \RuntimeException("This query type is not supported ({$userQuery['type']})");
        }
        $items = $class::where('category_id', $userQuery['category']);
        if (!empty($userQuery['keywords'])) {
            $keywords = Keyword::whereLike('name', $userQuery['keywords']);
            $items = $items->whereHas('keywords', function (Builder $query) use ($keywords) {
                $query->whereIn('keywords.id', $keywords->pluck('id'));
            });
        }
        return view('dashboard.customer.search', ['items' => $items->get()]);
    }
}
