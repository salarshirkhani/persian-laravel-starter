@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.owner.index" />
    <x-breadcrumb-item title="مشاهده شرکت" route="dashboard.owner.companies.show" :routeParam="$company" />
    <x-breadcrumb-item title="افزودن محصول" route="dashboard.owner.products.create" />
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('dashboard.owner.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-card>
                <x-slot name="header">مشخصات محصول</x-slot>

                <div class="form-row">
                    <x-text-group name="name" label="نام محصول" width="col-md-8" required />
                    <x-text-group name="price" type="number" label="قیمت (تومان)" width="col-md-4" required/>
                </div>
                <x-file-group name="photo" label="تصویر" required accept=".jpg,.jpeg,.png"/>
                <x-textarea-group name="short_description" label="خلاصه توضیحات" rows="3" required/>
                <x-textarea-group name="description" label="توضیحات کامل" rows="7" required/>

                <x-slot name="footer">
                    <button type="submit" class="btn btn-success">ثبت</button>
                </x-slot>
            </x-card>
        </form>
    </div>
@endsection
