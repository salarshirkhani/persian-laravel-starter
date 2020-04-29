<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function get() {
        switch (\Auth::user()->type) {
            case 'admin':
                return redirect()->route('dashboard.admin.index');
                break;
            case 'customer':
                return redirect()->route('dashboard.customer.index');
                break;
            case 'owner':
                return redirect()->route('dashboard.owner.index');
                break;
        }
        return redirect()->route('index');
    }
}
