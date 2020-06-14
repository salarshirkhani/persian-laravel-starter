<?php

namespace App;

use \Rinvex\Subscriptions\Models\PlanSubscription as BasePlanSubscription;

/**
 * App\PlanSubscription
 *
 * @property int $id
 * @property string $user_type
 * @property int $user_id
 * @property int $plan_id
 * @property string $slug
 * @property array $name
 * @property array|null $description
 * @property \Illuminate\Support\Carbon|null $trial_ends_at
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property \Illuminate\Support\Carbon|null $cancels_at
 * @property \Illuminate\Support\Carbon|null $canceled_at
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read array $translations
 * @property-read \Rinvex\Subscriptions\Models\Plan $plan
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PlanSubscriptionUsage[] $usage
 * @property-read int|null $usage_count
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Subscriptions\Models\PlanSubscription byPlanId($planId)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Subscriptions\Models\PlanSubscription findEndedPeriod()
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Subscriptions\Models\PlanSubscription findEndedTrial()
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Subscriptions\Models\PlanSubscription findEndingPeriod($dayRange = 3)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Subscriptions\Models\PlanSubscription findEndingTrial($dayRange = 3)
 * @method static \Rinvex\Cacheable\EloquentBuilder|\App\PlanSubscription newModelQuery()
 * @method static \Rinvex\Cacheable\EloquentBuilder|\App\PlanSubscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Subscriptions\Models\PlanSubscription ofUser(\Illuminate\Database\Eloquent\Model $user)
 * @method static \Rinvex\Cacheable\EloquentBuilder|\App\PlanSubscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereCanceledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereCancelsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscription whereUserType($value)
 * @mixin \Eloquent
 */
class PlanSubscription extends BasePlanSubscription {
    private static $callbacks;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::$callbacks || self::$callbacks = [
            'conversations_per_day' => function($self) {
                return $self->user
                    ->messages
                    ->where('created_at', '>=', now()->startOfDay())
                    ->groupBy('conversation_id')
                    ->count();
            },
            'enquiries_per_day' => function($self) {
                return $self->user
                    ->enquiries
                    ->where('created_at', '>=', now()->startOfDay())
                    ->count();
            },
        ];
    }

    /**
     * Determine if the feature can be used.
     *
     * @param string $featureSlug
     *
     * @return bool
     */
    public function canUseFeature(string $featureSlug): bool
    {
        if (array_key_exists($featureSlug, self::$callbacks))
            return $this->getFeatureRemainings($featureSlug) > 0;

        $feature = $this->plan->features()->where('slug', 'LIKE', $featureSlug . '%')->first();
        $featureValue = $this->getFeatureValue($featureSlug);
        $usage = $this->usage()->firstOrNew([
            'subscription_id' => $this->getKey(),
            'feature_id' => $feature->getKey(),
        ]);

        if ($featureValue === 'true') {
            return true;
        }

        // If the feature value is zero, let's return false since
        // there's no uses available. (useful to disable countable features)
        if ($usage->expired() || is_null($featureValue) || $featureValue === '0' || $featureValue === 'false') {
            return false;
        }

        // Check for available uses
        return $this->getFeatureRemainings($featureSlug) > 0;
    }

    /**
     * Get how many times the feature has been used.
     *
     * @param string $featureSlug
     *
     * @return int
     */
    public function getFeatureUsage(string $featureSlug): int
    {
        if (array_key_exists($featureSlug, self::$callbacks))
            return call_user_func(self::$callbacks[$featureSlug], $this);

        $usage = $this->usage()->byFeatureSlug($featureSlug)->first();

        if (!$usage){
            return 0;
        }

        return parent::getFeatureUsage($featureSlug);
    }

    /**
     * Get feature value.
     *
     * @param string $featureSlug
     *
     * @return mixed
     */
    public function getFeatureValue(string $featureSlug)
    {
        $feature = $this->plan->features()->where('slug', 'LIKE', $featureSlug . '%')->first();

        return $feature->value ?? null;
    }
}
