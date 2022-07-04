@extends('template')
@section('content')
<div class="mt-3">
    <h3 class="text-center">Form Tambah Akun</h3>
    <form action="{{route('user.update',$users->id)}}" method="post">
        @csrf
        @method('PUT')
        <x-form-input value="{{$users->name}}" title="Nama" name="name" type="text" />
        <x-form-input value="{{$users->email}}" title="Email" name="email" type="email" />
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
