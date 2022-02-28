@extends('personal.layouts.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Комментарии</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Комментарии</li>
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
                <div class="col-6">
                    <form action="{{ route('personal.comment.update', $comment->id ) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title-category">Изменить комментарии</label>
                            <textarea class="form-control" id="comment-category" name="message" placeholder="Введите комментарии">{{ $comment->message }}</textarea>
                            @error('message')
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
