@extends('layouts.dashboard')
@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('title', __('کاربران'))
@section('hierarchy')
    @include('dashboard.partials.breadcumb-item', [
        'title' => __('داشبورد'),
        'route' => 'dashboard.admin.index'
    ])
    @include('dashboard.partials.breadcumb-item', [
        'title' => __('کاربران'),
        'route' => 'dashboard.admin.branch.index'
    ])
@endsection
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>{{ __('موفق!') }}</h5>
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ __('کاربران وب‌سایت') }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="width: 100px">{{ __('شناسه') }}</th>
                        <th>{{ __('نام') }}</th>
                        <th>{{ __('نام خانوادگی') }}</th>
                        <th>{{ __('شهر') }}</th>
                        <th style="width: 160px">{{ __('عملیات') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->city }}</td>
                        <td>
                            @if (Auth::user()->id != $user->id)<button class="btn btn-danger btn-sm btn-remove-user" data-toggle="modal" data-target="#confirm-modal" data-user-id="{{ $user->id }}">حذف</button>@endif
                            <a href="{{ route('dashboard.admin.user.edit', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">ویرایش</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
@section('styles')
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('scripts')
    <div class="modal fade" id="confirm-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">{{ __('آیا اطمینان دارید؟') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('این عمل دیگر قابل بازگشت نیست!‌ آیا از انجام آن اطمینان دارید؟') }}</p>
                </div>
                <div class="modal-footer justify-content-between bg-danger">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">{{ __('انصراف') }}</button>
                    <button type="button" class="btn btn-outline-light btn-confirm-action">{{ __('حذف کاربر') }}</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <form method="POST" id="form-remove-user">
        @csrf
        @method('DELETE')
    </form>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("table").DataTable({
                "columnDefs": [{"orderable": false, "targets": 4}],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Persian.json"
                },
                "responsive": true
            });
            let user_id;
            $("button.btn-remove-user").click(function () {
                user_id = $(this).data("user-id");
            });

            $("button.btn-confirm-action").click(function () {
                let form = $("#form-remove-user");
                form.attr('action', '{{ route('dashboard.admin.user.destroy', ['user' => -1]) }}'.replace('-1', user_id));
                form.submit();
            })
        });
    </script>
@endsection
