@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="posts/create" class="btn btn-primary">create blog</a>
                        <h3>ur blog post</h3>
                        @if(count($posts)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>name</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->name}}</td>
                            <td><a class="btn btn-primary" href="/posts/{{$post->id}}/edit">edit</a></td>
                                <td></td>
                            </tr>
                            @endforeach

                        </table>
                        @else
                        you have no post
                        @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
