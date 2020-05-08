<x-sidebar-item title="داشبورد" icon="fas fa-tachometer-alt" route="dashboard.owner.index" />
@empty(Auth::user()->company)
    <x-sidebar-item title="شرکت خود را ثبت کنید" icon="fas fa-plus" route="dashboard.owner.companies.create" />
@else
    <x-sidebar-item title="مشاهده پروفایل شرکت" icon="fas fa-building" route="dashboard.owner.companies.show" :routeParam="Auth::user()->company" />
@endempty
