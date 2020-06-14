<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Rinvex\Subscriptions\Models\PlanFeature;
use Rinvex\Subscriptions\Models\PlanSubscriptionUsage as BasePlanSubscriptionUsage;

/**
 * App\PlanSubscriptionUsage
 *
 * @property int $id
 * @property int $subscription_id
 * @property int $feature_id
 * @property int $used
 * @property \Illuminate\Support\Carbon|null $valid_until
 * @property string|null $timezone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Rinvex\Subscriptions\Models\PlanFeature $feature
 * @property-read \App\PlanSubscription $subscription
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Subscriptions\Models\PlanSubscriptionUsage byFeatureName($featureName)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage byFeatureSlug($featureSlug)
 * @method static \Rinvex\Cacheable\EloquentBuilder|\App\PlanSubscriptionUsage newModelQuery()
 * @method static \Rinvex\Cacheable\EloquentBuilder|\App\PlanSubscriptionUsage newQuery()
 * @method static \Rinvex\Cacheable\EloquentBuilder|\App\PlanSubscriptionUsage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereFeatureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PlanSubscriptionUsage whereValidUntil($value)
 * @mixin \Eloquent
 */
class PlanSubscriptionUsage extends BasePlanSubscriptionUsage
{

    /**
     * Scope subscription usage by feature slug.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param string                                $featureSlug
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByFeatureSlug(Builder $builder, $featureSlug)
    {
        $feature = PlanFeature::where('slug', $featureSlug)->first();
        return $builder->where('feature_id', $feature ? ($feature->getKey() ?? null) : null);
    }

}
