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
        <div class="col-2">
        <a href="{{ route('admin.post.index') }}" class="btn btn-danger mb-3"><< Назад</a>
          <form action="{{ route('admin.post.update', $post->id) }}" method="POST">
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
              <textarea id="summernote" name="content">{{ $post->content }}</textarea>
              @error('content')
              <div class="text-danger">Поле не заполнено</div>
              @enderror
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