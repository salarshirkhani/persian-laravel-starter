@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.owner.index" />
    <x-breadcrumb-item title="مشاهده شرکت" route="dashboard.owner.companies.show" :routeParam="$company" />
    <x-breadcrumb-item title="افزودن سرویس" route="dashboard.owner.services.create" />
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('dashboard.owner.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-card>
                <x-card-header>مشخصات سرویس</x-card-header>

                <x-card-body>
                    <x-text-group name="name" label="نام سرویس" required />
                    <x-file-group name="photo" label="تصویر" required accept=".jpg,.jpeg,.png"/>
                    <x-textarea-group name="short_description" label="خلاصه توضیحات" rows="3" required/>
                    <x-textarea-group name="description" label="توضیحات کامل" rows="7" required/>
                </x-card-body>

                <x-card-footer>
                    <button type="submit" class="btn btn-success">ثبت</button>
                </x-card-footer>
            </x-card>
        </form>
    </div>
@endsection
