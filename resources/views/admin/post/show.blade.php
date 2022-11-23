@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{$post->title}}</h1>
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
        <div class="col-5">
        <a href="{{ route('admin.post.index') }}" class="btn btn-danger mb-3"><< Назад</a>
          <div class="card">
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <tbody>
                  <tr>
                    <td>ID</td>
                    <td>Название</td>
                    <td>Действие</td>
                  </tr>
                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                    <form method="POST" action="{{ route('admin.post.delete', $post->id) }}">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.post.edit', $post->id) }}"><i class="fas fa-edit"></i></a>
                        <button type="submit" class="border-0 bg-transparent">
                          <i class="text-danger fas fa-trash-alt"></i>
                        </button>
                      </form>
                    </td>
                  </tr>

                </tbody>
              </table>
              
            </div>
          </div>
        </div>
        <!-- /.table -->
      </div>
      <!-- /.row -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection