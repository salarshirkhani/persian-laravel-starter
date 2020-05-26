<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Shetabit\Payment\Exceptions\InvalidPaymentException;

/**
 * App\Transaction
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $plan_id
 * @property float $amount
 * @property string|null $transaction_id
 * @property string|null $reference_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $paid_at
 * @property-read \Rinvex\Subscriptions\Models\Plan|null $plan
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction wherePaidAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Transaction whereUserId($value)
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    protected $dates = [
        'paid_at'
    ];

    protected $casts = [
        'amount' => 'int',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function plan() {
        return $this->belongsTo(\Rinvex\Subscriptions\Models\Plan::class);
    }

    public function verify(User $user = null) {
        if ($user != null)
            \app(\Illuminate\Contracts\Auth\Access\Gate::class)->authorize('verify', $this);

        try {
            $receipt = \Payment::amount($this->amount)->transactionId($this->id)->verify();
        } catch (InvalidPaymentException $exception) {
            return $exception->getMessage();
        }
        $this->paid_at = now();
        $this->reference_id = $receipt->getReferenceId();
        $this->save();
        return true;
    }
}
