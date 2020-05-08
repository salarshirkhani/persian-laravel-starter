<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Owner\CompanyStoreRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Company::class, 'company');
    }

    public function create() {
        return view('dashboard.owner.companies.create');
    }

    public function store(CompanyStoreRequest $request) {
        $company = new Company($request->validated());
        if ($request->hasFile('logo'))
            $company->logo = $request->file('logo')->store('logos', 'public');
        $company->save();
        return redirect()->route('dashboard.owner.companies.show', ['company' => $company]);
    }

    public function show(Company $company) {
        return view('dashboard.owner.companies.show', ['company' => $company]);
    }
}
