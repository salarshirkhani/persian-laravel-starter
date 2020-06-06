@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.' . Auth::user()->type . '.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.index" />
    <x-breadcrumb-item title="مشاهده پکیج‌ها" route="dashboard.plans.index" />
@endsection
@section('content')
    <div class="container-fluid">
        <x-session-alerts></x-session-alerts>
        <x-card>
            <x-card-header>بسته‌ها</x-card-header>
            <x-card-body>
                <div class="row">
                    @foreach($plans as $plan)
                        <div class="col-md-6 col-lg-4">
                            <x-card type="success">
                                <x-card-header class="text-center">
                                    {{ $plan->name }}
                                    <x-slot name="down">
                                        <h6 class="card-subtitle mt-2">
                                            {{ $plan->price }} تومان
                                        </h6>
                                    </x-slot>
                                </x-card-header>
                                <ul class="list-group list-group-flush">
                                    @foreach($plan->features as $feature)
                                        <li class="list-group-item">
                                            {{ $feature->description }}
                                            @if(in_array($feature->value, ['Y', 'N']))
                                                <span class="float-right">
                                                    <i class="fas fa-{{ $feature->value == 'true' ? 'check' : 'times' }}"></i>
                                                </span>
                                            @else
                                                <span class="float-right">{{ $feature->value }}</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                                <x-card-footer>
                                    <form method="POST" action="{{ route('dashboard.plans.subscribe', $plan) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary">سفارش</button>
                                    </form>
                                </x-card-footer>
                            </x-card>
                        </div>
                    @endforeach
                </div>
            </x-card-body>
        </x-card>
    </div>
@endsection
