@extends('template')
@section('content')
<div class="mt-3">
    <h3 class="text-center">Form Edit Post</h3>
    <form action="{{route('post.update',$posts->id)}}" method="post">
        @csrf
        @method('PUT')
        <x-form-input value="{{$posts->name}}" title="Nama" name="name" type="text" />
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{$posts->description}}</textarea>
        </div>
        <div class="">
            <button class="btn btn-success float-right" type="submit">Simpan</button>
            <a href="{{route('post.index')}}" class="btn btn-danger float-right mr-3">Batal</a>
        </div>
    </form>
</div>
@endsection
