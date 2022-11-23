@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Добавление поста</h1>
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
          <form action="{{ route('admin.post.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Заголовок</label>
              <input value="{{ old('title') }}" type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Название поста">
              @error('title')
              <div class="text-danger">Поле не заполнено</div>
              @enderror
            </div>

            <div class="form-group">
              <textarea id="summernote" name="content">{{ old('content') }}</textarea>
              @error('content')
              <div class="text-danger">Поле не заполнено</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
          </form>
        </div>

      </div>
    </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection