<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Company;
use App\Enquiry;
use App\Http\Controllers\Controller;

class EnquiryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Enquiry::class);
    }

    public function index() {
        \Auth::user()->company->load('relevantEnquiries');
        return view('dashboard.owner.enquiries.index', [
            'enquiries' => \Auth::user()->company->relevantEnquiries
        ]);
    }

    public function show(Enquiry $enquiry) {
        return view('dashboard.owner.enquiries.show', ['enquiry' => $enquiry]);
    }
}
