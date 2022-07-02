@extends('template')
@section('content')
<div class="mt-5">
    <a href="{{route('post.create')}}" class="btn btn-success mb-3">+ Tambah Post</a>
    @include('flash')
    @if ($posts->isNotEmpty())
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <div class="card mb-3 mr-3" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$post->name}}</h5>
                    <p class="card-text">{{$post->description}}</p>
                    <span class="card-title text-muted">author = {{$post->user->name}}</span>
                </div>
                @can('update', $post)
                <div class="card-footer bg-white">
                    <div class="d-flex">
                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-warning mr-2">Edit</a>
                        <form action="{{route('post.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                @endcan
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="card">
        <div class="card-body"><span>Belum terdapat data post</span></div>
    </div>
    @endif
</div>
@endsection
