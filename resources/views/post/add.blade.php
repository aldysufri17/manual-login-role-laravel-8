@extends('template')
@section('content')
<div class="mt-3">
    <h3 class="text-center">Form Tambah Post</h3>
    <form action="{{route('post.store')}}" method="post">
        @csrf
        <input type="text" hidden name="user_id" value="{{auth()->user()->id}}">
        <x-form-input title="Nama" autofocus="autofocus" name="name" type="text" />
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <div class="">
            <button class="btn btn-success float-right" type="submit">Simpan</button>
            <a href="{{route('post.index')}}" class="btn btn-danger float-right mr-3">Batal</a>
        </div>
    </form>
</div>
@endsection
