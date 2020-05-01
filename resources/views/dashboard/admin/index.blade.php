@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('title', __('داشبورد'))
@section('hierarchy')
    @include('dashboard.partials.breadcumb-item', [
        'title' => __('داشبورد'),
        'route' => 'dashboard.admin.index'
    ])
@endsection
