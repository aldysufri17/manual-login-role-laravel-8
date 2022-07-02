@extends('template')
@section('content')
<div class="mt-3">
    <h3 class="text-center">Form Tambah Akun</h3>
    <form action="{{route('user.update',$users->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" value="{{$users->name}}" name="name" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" value="{{$users->email}}" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" class="form-control" id="role">
                <option value="author">author</option>
                <option value="admin">admin</option>
            </select>
        </div>
        <div class="">
            <button class="btn btn-success float-right" type="submit">Simpan</button>
            <a href="{{route('user.index')}}" class="btn btn-danger float-right mr-3">Batal</a>
        </div>
    </form>
</div>
@endsection
