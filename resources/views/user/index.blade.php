@extends('template')
@section('content')
<div class="mt-5">
    <a href="{{route('user.create')}}" class="btn btn-success mb-3">+ Tambah Akun</a>
    @include('flash')
    @if ($users->isNotEmpty())
    <div class="container">
        <div class="row">
            @foreach ($users as $user)
            <div class="card mb-3 mr-3" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}} <span class="text-muted">({{$user->role}})</span></h5>
                    <p class="card-text text-muted">{{$user->email}}</p>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex">
                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-warning mr-2">Edit</a>
                        <form action="{{route('user.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
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
