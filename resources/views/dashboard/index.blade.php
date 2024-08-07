@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item active"> <a href="/home">Dashboard v1</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box for Post -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $newsCount }}</h3>
                            <p>News</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-alt"></i> <!-- Ikon untuk Post -->
                        </div>
                        <a href="{{ route('news.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box for User -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $userCount }}</h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i> <!-- Ikon untuk User -->
                        </div>
                        <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box for Category -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $categoryCount }}</h3> <!-- Menampilkan jumlah kategori -->
                            <p>Category</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags"></i> <!-- Ikon untuk Category -->
                        </div>
                        <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>

                    </div>
                </div>

                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
@endsection
