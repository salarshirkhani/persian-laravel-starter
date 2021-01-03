@section('sidebar')
    @include('dashboard.admin.sidebar')
@endsection
@section('hierarchy')
    <x-breadcrumb-item title="داشبورد" route="dashboard.admin.index" />
    <x-breadcrumb-item title="افزودن اسلایدر" route="dashboard.admin.slider-items.create" />
@endsection
@section('content')
    <div class="container">

        
    </div>
@endsection