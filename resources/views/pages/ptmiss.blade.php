@extends('layouts.app')

@section('content')
    <h1>ptmiss</h1>
    
    

@if(count($city_num) > 0)
    
        @foreach($city_num as $city_name)
<h2>{{$city_name->city}}</h2>
@if(count($posts) > 0)
    <div class="container">
        <div class="row">
        @foreach($posts as $post)
            
            @if($post->city==$city_name->city)
            
                        
                    <div class="col-md-4 col-sm-3">
                        @if($post->img)
                        <div>
                            <img src="/storage/img_name/{{$post->img}}" style="height:130px; width:200px">
                        </div>
                            @else
                            <div>
                                <img src="/storage/img_name/no-user.jpg" style="height:130px; width:200px">
                            </div>
                                @endif
                            <h3>{{$post->ptname}}</h3>
                                
                                    <a  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            {{$post->subject}}
                                    </a>
                                    
                                  
                                  <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                            {{$post->info}}
                                    </div>
                                  </div>
                                  <div class="button-group">
                                        <a href="" class="btn btn-primary">email me</a>
                                        <button class="next"> find tel</button>
                                        </div>
                            
                            <h3></h3>
                        <small>{{$post->created_at}}  </small>
                        
                    </div>
            @endif        
        @endforeach
    </div>
</div>
       
    @else
        <p>无内容</p>

    @endif

@endforeach
@else
        <p>无内容</p>
@endif
    

   
    
    
    
@endsection

