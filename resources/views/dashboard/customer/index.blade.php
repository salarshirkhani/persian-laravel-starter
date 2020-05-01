@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
    @include('dashboard.partials.breadcumb-item', [
        'title' => __('داشبورد'),
        'route' => 'dashboard.customer.index'
    ])
@endsection
