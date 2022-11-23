@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактирование поста</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
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
        <div class="col-12">
        <a href="{{ route('admin.post.index') }}" class="btn btn-danger mb-3"><< Назад</a>
          <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <label for="exampleInputEmail1">Название</label>
              <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{ $post->title }}" placeholder="Название поста">
              @error('title')
                <div class="text-danger">Поле не заполнено</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Выберите категорию</label>
              <select name="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? ' selected' : '' }}>{{ $category->title }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <textarea id="summernote" name="content">{{ $post->content }}</textarea>
              @error('content')
              <div class="text-danger">Поле не заполнено</div>
              @enderror
            </div>
  
            <!-- ПРЕВЬЮШКА -->
            <div class="form-group">
              <label for="exampleInputFile">Добавить превьюшку</label>
              <div class="w-25">
                <img src="{{ asset('storage/'. $post->preview_image) }}" alt="preview" class="w-50">
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Загрузить</span>
                </div>
              </div>
              @error('preview_image')
              <div class="text-danger">Картинака не добавлена</div>
              @enderror
            </div>
            <!-- Главная картинка -->
            <div class="form-group">
              <label for="exampleInputFile">Добавить главную картинку</label>
              <div class="w-25">
                <img src="{{ asset('storage/'. $post->main_image) }}" alt="preview" class="w-50">
              </div>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="main_image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Выбрать файл</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Загрузить</span>
                </div>
              </div>
              @error('main_image')
              <div class="text-danger">Картина не добавлена</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Тэги</label>
              <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Выберите тэги" style="width: 100%;">
                @foreach($tags as $tag)
                <option 
                  {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? " selected" : "" }}
                value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
          </form>
        </div>

      </div>
    </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection