@extends('admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Админ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Категории</a></li>
                            <li class="breadcrumb-item active">Редактирование</li>
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
                    <div class="col-12 h4">
                        Редактирование категории
                    </div>
                    <div class="col-6">
                        <form action="{{ route('admin.category.update', $category->id ) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title-category">Название категории</label>
                                <input type="text" class="form-control" id="title-category" name="title" placeholder="Введите название" value="{{ $category->title }}">
                                @error('title')
                                    <div class="text-danger">Это поле необходимо заполнить. <br> {{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" value="Редактировать">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
