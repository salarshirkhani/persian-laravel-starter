<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use Rinvex\Subscriptions\Models\Plan;
use Shetabit\Payment\Invoice;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Plan::class);
    }

    public function index() {
        return view('dashboard.plans.index', [
            'plans' => Plan::whereRaw("slug LIKE ?", [\Auth::user()->type . '-%'])->get()
        ]);
    }

    public function subscribe(Plan $plan) {
        $this->authorize('subscribe', $plan);
        /** @var \App\User $user */
        $user = \Auth::user();

        $invoice = new Invoice();
        $invoice->via('zarinpal');
        $invoice->amount((int)($plan->price + $plan->signup_fee));
        $invoice->detail('description', "خرید اشتراک $plan->name");

        $transaction = new Transaction();
        $transaction->amount = $invoice->getAmount();
        $transaction->user()->associate($user);
        $transaction->plan()->associate($plan);
        $transaction->save();

        return \Payment::callbackUrl(route("dashboard.plans.callback", ['transaction' => $transaction]))
            ->purchase($invoice,
                function ($driver, $transactionId) use ($transaction) {
                    $transaction->transaction_id = $transactionId;
                    $transaction->save();
            })->pay();
    }

    public function callback(Transaction $transaction) {
        $this->authorize('subscribe', $transaction->plan);
        /** @var User $user */
        $user = \Auth::user();
        if (($message = $transaction->verify($user)) === true) {
            $user->newSubscription($user->type, $transaction->plan);
            return redirect()
                ->route("dashboard.$user->type.index")
                ->with('success', 'اشتراک شما با موفقیت فعال شد!');
        } else
            return redirect()
                ->route("dashboard.plans.index")
                ->with('error', $message);
    }
}
