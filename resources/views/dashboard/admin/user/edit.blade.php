@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('title', __('ویرایش کاربر'))
@section('hierarchy')
    @include('dashboard.partials.breadcumb-item', [
        'title' => __('داشبورد'),
        'route' => 'dashboard.admin.index'
    ])
    @include('dashboard.partials.breadcumb-item', [
        'title' => __('کاربران'),
        'route' => 'dashboard.admin.user.index'
    ])
    @include('dashboard.partials.breadcumb-item', [
        'title' => __('ویرایش کاربر'),
        'route' => 'dashboard.admin.user.edit'
    ])
@endsection
@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="wrap-messages">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('ویرایش کاربر') }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('dashboard.admin.user.update', ['user' => $user]) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    @include('dashboard.partials.form-group', [
                        'name' => 'username',
                        'label' => __('نام کاربری'),
                        'value' => $user->username,
                        'disabled' => true
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'first_name',
                        'label' => __('نام'),
                        'value' => $user->first_name
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'last_name',
                        'label' => __('نام خانوادگی'),
                        'value' => $user->last_name
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'father_name',
                        'label' => __('نام پدر'),
                        'value' => $user->father_name
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'national_code',
                        'label' => __('کد ملی'),
                        'value' => $user->national_code
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'city',
                        'label' => __('شهر'),
                        'value' => $user->city
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'school',
                        'label' => __('مدرسه'),
                        'value' => $user->school
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'grade',
                        'label' => __('پایه تحصیلی'),
                        'value' => $user->grade
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'email',
                        'type' => 'email',
                        'label' => __('ایمیل'),
                        'value' => $user->email,
                        'disabled' => true
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'mobile',
                        'type' => 'tel',
                        'label' => __('موبایل'),
                        'value' => $user->mobile
                    ])
                    @include('dashboard.partials.form-group', [
                        'name' => 'merchant_id',
                        'label' => __('کد معرف'),
                        'value' => $user->merchant_id
                    ])
                    @include('dashboard.partials.form-group-select', [
                        'name' => 'type',
                        'label' => __('نقش کاربری'),
                        'value' => $user->type,
                        'options' => [
                            'admin' => __('مدیر سایت'),
                            'merchant' => __('نماینده'),
                            'marker' => __('مصحح'),
                            'student' => __('دانش‌آموز')
                        ]
                    ])
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('ثبت') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
