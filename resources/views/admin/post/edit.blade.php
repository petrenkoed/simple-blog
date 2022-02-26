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
                            <li class="breadcrumb-item active"><a href="{{ route('admin.post.index') }}">Посты</a></li>
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

                <div class="row d-flex justify-content-center">
                    <div class="col-12 h4">
                        Редактирование поста
                    </div>
                    <div class="col-6">
                        <form action="{{ route('admin.post.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title-post">Название поста</label>
                                <input type="text"
                                       class="form-control"
                                       id="title-post"
                                       name="title"
                                       placeholder="Введите название"
                                       value="{{ $post->title }}"
                                >
                                @error('title')
                                <div class="text-danger"><br> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote"
                                          name="content"
                                >{{ $post->content }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="">
                                    <img class="w-25" src="{{ asset('storage/'.$post->preview_image) }}" alt="preview_image">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label" >Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Добавить главное изображение</label>
                                <div class="w-25">
                                    <img src="{{ asset('storage/'.$post->main_image) }}" alt="main_image">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label" >Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Выберите категорию</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id  }}"
                                            {{ $category->id == $post->category_id ? ' selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Теги</label>
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('tag_ids')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary mt-3 w-50" value="Редактировать">
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
