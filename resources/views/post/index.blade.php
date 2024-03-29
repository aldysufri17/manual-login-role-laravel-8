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
                <img class="card-img-top"
                    src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_181bed4cd9b%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_181bed4cd9b%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1953125%22%20y%3D%2296.3%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                    alt="Card image cap">
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
