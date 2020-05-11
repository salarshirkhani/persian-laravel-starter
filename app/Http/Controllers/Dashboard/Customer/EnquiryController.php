<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Category;
use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Customer\EnquiryStoreRequest;

class EnquiryController extends Controller
{
    public function create() {
        return view('dashboard.customer.enquiries.create', ['categories' => Category::where('type', 'company')->get()]);
    }

    public function store(EnquiryStoreRequest $request) {
        $enquiry = new Enquiry($data = $request->validated());
        $enquiry->creator()->associate(\Auth::user());
        $enquiry->save();
        return redirect()->route('dashboard.customer.index')->with('status', 'درخواست شما با موفقیت ثبت شد!');
    }
}
