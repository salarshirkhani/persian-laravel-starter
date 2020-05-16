@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.customer.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.customer.index" />
    <x-breadcrumb-item title="جستجو" route="dashboard.customer.search" />
@endsection
@section('content')
    <div class="container">
        <x-card type="info">
            <x-card-header><div class="text-center">نتایج جستجو</div></x-card-header>

            <x-card-body>
                @if(!$items->count())
                    <p class="card-text">
                        متاسفانه چیزی پیدا نشد. دوباره تلاش کنید.
                    </p>
                @else
                    <div class="row">
                        @foreach($items as $item)
                            <div class="col-md-6 col-lg-4" style="padding: 10px">
                                <x-card type="outline-primary">
                                    <img class="card-img-top" src="{{ Storage::url($item->photo ?? $item->logo) }}" alt="{{ $item->name }}">

                                    <x-card-header>{{ $item->name }}</x-card-header>

                                    <x-card-body>
                                        <p class="card-text">
                                            {{ $item->short_description }}
                                        </p>
                                        <a href="#{{-- TODO: route to actual page --}}">اطلاعات بیشتر</a>
                                    </x-card-body>
                                </x-card>
                            </div>
                        @endforeach
                    </div>
                @endif
            </x-card-body>

            <x-card-footer>
                <a href="{{ route('dashboard.customer.index') }}" class="btn btn-outline-primary">بازگشت</a>
            </x-card-footer>
        </x-card>
    </div>
@endsection
