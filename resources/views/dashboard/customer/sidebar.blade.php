<x-sidebar-item title="داشبورد" icon="fas fa-tachometer-alt" route="dashboard.customer.index" />
<x-sidebar-item title="ثبت درخواست خرید" icon="fas fa-shopping-basket" route="dashboard.customer.enquiries.create" />
<x-sidebar-item title="پیغام‌های شما" icon="fas fa-envelope" route="dashboard.conversations.index" />
@can('viewAny', \Rinvex\Subscriptions\Models\Plan::class)
    <x-sidebar-item title="پکیج‌ها" icon="fas fa-box" route="dashboard.plans.index" />
@endcan
