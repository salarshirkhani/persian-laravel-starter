<?php

namespace App;

use Awobaz\Compoships\Compoships;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Rinvex\Subscriptions\Traits\HasSubscriptions;

/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $type
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Company|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Conversation[] $conversations
 * @property-read int|null $conversations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Enquiry[] $enquiries
 * @property-read int|null $enquiries_count
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Message[] $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PlanSubscription[] $subscriptions
 * @property-read int|null $subscriptions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'email', 'email_verified_at'
    ];

    protected $appends = [
        'name'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function(User $model) {
            if (in_array($model->type, ['customer', 'owner']))
                $model->newDefaultSubscription(app('rinvex.subscriptions.plan')->where('slug', "{$model->type}-default")->first());
        });
    }

    public function getNameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function company() {
        return $this->hasOne('App\Company', 'creator_id');
    }

    public function conversations() {
        return $this->belongsToMany('App\Conversation')
            ->orderBy('created_at', 'desc');
    }

    public function messages() {
        return $this->hasMany('App\Message', 'from_id');
    }

    public function enquiries() {
        return $this->hasMany('App\Enquiry', 'creator_id');
    }

    public function defaultSubscription() {
        return $this->subscription("{$this->type}-{$this->id}");
    }

    public function newDefaultSubscription($plan) {
        return $this->newSubscription("{$this->type}-{$this->id}", $plan);
    }

}
