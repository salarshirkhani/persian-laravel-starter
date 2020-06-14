<?php

namespace App\Http\Controllers\Dashboard\Customer;

use App\Category;
use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Customer\EnquiryStoreRequest;

class EnquiryController extends Controller
{
    public function create() {
        if (!\Auth::user()->can('create', Enquiry::class))
            return redirect()->back()
                ->with('error', 'متاسفانه شما به محدودیت خود در ارسال درخواست‌های روزانه رسیده‌اید! لطفا اشتراک خود را ارتقا دهید.');
        return view('dashboard.customer.enquiries.create', ['categories' => Category::where('type', 'company')->get()]);
    }

    public function store(EnquiryStoreRequest $request) {
        $enquiry = new Enquiry($data = $request->validated());
        $enquiry->creator()->associate(\Auth::user());
        $enquiry->save();
        return redirect()->route('dashboard.customer.index')->with('success', 'درخواست شما با موفقیت ثبت شد!');
    }
}
