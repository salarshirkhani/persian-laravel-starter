@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
    @include('dashboard.partials.breadcumb-item', [
        'title' => __('داشبورد'),
        'route' => 'dashboard.owner.index'
    ])
@endsection
