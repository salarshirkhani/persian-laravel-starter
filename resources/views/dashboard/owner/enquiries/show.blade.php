@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.owner.index" />
    <x-breadcrumb-item title="مشاهده درخواست‌های خرید" route="dashboard.owner.enquiries.index" />
    <x-breadcrumb-item title="نمایش درخواست" route="dashboard.owner.enquiries.show" />
@endsection
@section('content')
    <div class="container">
        <x-session-alerts></x-session-alerts>
        <x-card>
            <x-card-header>مشخصات درخواست</x-card-header>

            <x-card-body>
                <p class="card-title" style="margin-bottom: 8px">{{ $enquiry->title }}</p>
                {{ $enquiry->description }}
            </x-card-body>
        </x-card>
    </div>
@endsection
