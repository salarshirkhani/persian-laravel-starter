@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
    <x-breadcrumb-item title="ثبت درخواست خرید" route="dashboard.customer.enquiries.create" />
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('dashboard.customer.enquiries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-card>
                <x-slot name="header">مشخصات درخواست</x-slot>

                <x-text-group name="title" label="عنوان درخواست" required />

                <div class="form-row">
                    <x-select-group name="type" label="نوع درخواست" width="col-md-5" required>
                        <x-select-item/>
                        <x-select-item value="product">تولیدی</x-select-item>
                        <x-select-item value="service">خدماتی</x-select-item>
                    </x-select-group>

                    <x-select-group name="category" label="دسته‌بندی موردنظر" width="col-md-7">
                        <x-select-item value="">بدون دسته‌بندی</x-select-item>
                        @foreach($categories as $category)
                            <x-select-item :value="$category->id" :data-type="$category->type">{{ $category->name }}</x-select-item>
                        @endforeach
                    </x-select-group>
                </div>

                <x-textarea-group name="description" label="توضیحات کامل" rows="10" />

                <x-slot name="footer">
                    <button type="submit" class="btn btn-success">ثبت درخواست</button>
                </x-slot>
            </x-card>
        </form>
    </div>
@endsection
