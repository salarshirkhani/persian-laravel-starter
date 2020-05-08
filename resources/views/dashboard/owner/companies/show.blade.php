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

            <x-slot name="footer">
                @if($company->type == 'product')
                    <a href="{{ route('dashboard.owner.products.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> افزودن محصول</a>
                @else
                    <a href="{{ route('dashboard.owner.services.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> افزودن سرویس</a>
                @endif
            </x-slot>
        </x-card>
    </div>
@endsection
