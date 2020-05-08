<?php

namespace App\Http\Controllers\Dashboard\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Owner\ServiceStoreRequest;
use App\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Service::class, 'service');
    }

    public function create() {
        return view('dashboard.owner.services.create', ['company' => \Auth::user()->company]);
    }

    public function store(ServiceStoreRequest $request) {
        $service = new Service($request->validated());
        $service->photo = $request->file('photo')->store('services', 'public');
        $service->company()->associate(\Auth::user()->company);
        $service->save();
        return redirect()->route('dashboard.owner.companies.show', ['company' => $service->company]);
    }
}
