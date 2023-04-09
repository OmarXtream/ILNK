@extends('layout.manager.master')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <div class="w-100">
        <h2 class="text-left mb-4 text-dark">الرئيسية</h2>

        <div class="card rounded">
            <div class="card-body">
                <h3 class="text-dark">إحصائيات</h3>
                <hr>
                <div class="row">
                    <div class="col-md mb-3">
                        <p>عدد المستخدمين</p>
                        <h3 class="text-color-3">{{ $userCount }}</h3>
                    </div>
                    <div class="col-md mb-3">
                        <p>عدد المشتركين</p>
                        <h3 class="text-color-4">{{$SubCount}}</h3>
                    </div>


                    <div class="col-md mb-3">
                        <p>عدد الصفحات</p>
                    <h3 class="text-color-2">{{$PageCount}}</h3>
                    </div>




                </div>
            </div>
        </div>
    </div>


</main>


@endsection

