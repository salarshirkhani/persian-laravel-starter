@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.owner.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.owner.index" />
    <x-breadcrumb-item title="مشاهده درخواست‌های خرید" route="dashboard.owner.enquiries.index" />
@endsection
@section('content')
    <div class="container">
        <x-card>
            <x-card-body>
                <table class="table">
                    <thead>
                    <tr>
                        <th>عنوان</th>
                        <th style="width: 15vw">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($enquiries as $enquiry)
                        <tr>
                            <td>{{ $enquiry->title }}</td>
                            <td>
                                <a href="{{ route('dashboard.owner.enquiries.show', $enquiry) }}" class="btn btn-success">
                                    مشاهده
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </x-card-body>
        </x-card>
    </div>
@endsection
