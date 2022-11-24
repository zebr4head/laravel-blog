@extends('admin.layouts.main')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Редактирование пользователя</h1>
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
        <div class="col-4">
          <a href="{{ route('admin.user.index') }}" class="btn btn-danger mb-3">
            << Назад</a>
              <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                  <label for="exampleInputEmail1">Имя</label>
                  <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $user->name}}" placeholder="Имя пользователя">
                  @error('name')
                  <div class="text-danger">Поле не заполнено</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text" value="{{ $user->email }}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Введите E-mail">
                  @error('email')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Выберите роль</label>
                  <select name="role" class="form-control">
                    @foreach($roles as $id => $role)
                    <option value="{{ $id }}" {{ $id == $user->role ? ' selected' : '' }}>
                      {{ $role }}
                    </option>
                    @endforeach
                  </select>
                  @error('role_id')
                  <div class="text-danger">{{ $message }}</div>
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