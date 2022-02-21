@extends('admin.layouts.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Админ</a></li>
                            <li class="breadcrumb-item active">Посты</li>
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

                <div class="row d-flex justify-content-center">
                    <div class="col-12 h4">
                        Добавление поста
                    </div>
                    <div class="col-6">
                        <form action="{{ route('admin.post.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title-post">Название поста</label>
                                <input type="text"
                                       class="form-control"
                                       id="title-post"
                                       name="title"
                                       placeholder="Введите название"
                                       value="{{ old('title') }}"
                                >
                                @error('title')
                                    <div class="text-danger">Это поле необходимо заполнить. <br> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote"
                                          name="content"
                                >{{ old('content') }}</textarea>
                                @error('content')
                                <div class="text-danger">Это поле необходимо заполнить. <br> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary mt-3 w-50" value="Добавить">
                            </div>
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
