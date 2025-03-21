@extends('admin.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ env('APP_NAME') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3>داشبرد</h3>
                </div>
            </div>


            <div class="row" style="padding-top: 1rem;position:relative;">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div style="overflow-x: auto;" class="card-header d-flex justify-content-between align-items-center">

                        </div>

                        <div style="overflow-x: auto;" class="card-body">

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
