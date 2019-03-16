@extends('layouts.app')

@section('content')

<div class="container">

  <h3 class="jumbotron">part time Miss form</h3>
  {!!Form::open(['action' => 'PtmisssController@store', 'method'=>'post','enctype'=>'multipart/form-data']) !!}
  type{{Form::select('type', ['L' => 'Large', 'S' => 'Small'], 'S')}};

  <div class="form-group">
      {{Form::label('ptname', 'Ptname')}}
      {{Form::text('ptname', '', ['class' => 'form-control', 'placeholder' => 'Ptame'])}}
  </div>
  <div class="form-group">
    {{Form::label('city', 'City')}}
    {{Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
  </div>
  <div class="form-group">
      {{Form::label('tel', 'Tel')}}
      {{Form::text('tel', '', ['class' => 'form-control', 'placeholder' => '电话'])}}
    </div>
  <div class="form-group">
    {{Form::label('addr1', 'Addr1')}}
    {{Form::text('addr1', '', ['class' => 'form-control', 'placeholder' => 'Addr line1'])}}
  </div>
  <div class="form-group">
    {{Form::label('venue', 'y/n Venue:')}}
    
    {{Form::radio('venue', 'yes' )}}{{Form::label('venuey', 'Yes')}}
    
    {{Form::radio('venue', 'no',true )}}{{Form::label('venuen', 'No')}}
    
    </div>
 
</div>
  
  
  
  <div class="form-group">
      {{Form::label('user_id', 'User_id')}}
      {{Form::text('user_id', '', ['class' => 'form-control', 'placeholder' => 'UID'])}}
  </div>
  <div class="form-group">
      {{Form::label('info', 'Info')}}
      {{Form::textarea('info', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Info Text'])}}
  </div>
<label class="text-warning">danger</label>
      <div class="input-group control-group increment" >
        <input type="file" name="filename[]" class="form-control">
        
        
      </div>
      

      <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

      {!! Form::close() !!}      

</div>
@endsection