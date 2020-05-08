@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.owner.index" />
    <x-breadcrumb-item title="مشاهده شرکت" route="dashboard.owner.companies.show" />
@endsection
@section('content')
    <div class="container">
        <x-card type="info">
            <x-slot name="header">شرکت {{ $company->name }}</x-slot>
        </x-card>
    </div>
@endsection
