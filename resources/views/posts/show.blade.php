@extends('layouts.app')

@section('content')
  <h1>Posts??????</h1>
  
  <h2>city:{{$post->city}}<h2>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <img src="/storage/img_name/{{$post->img0}}" style="height:130px; width:200px">
      </div>
      <div class="col-sm">
          @if($post->img1)
          <img src="/storage/img_name/{{$post->img1}}" style="height:130px; width:200px">
        @endif
      </div>
      <div class="col-sm">
          @if($post->img2)
          <img src="/storage/img_name/{{$post->img2}}" style="height:130px; width:200px"><br>
        @endif
      </div>
      <div class="col-sm">
          @if($post->img3)
          <img src="/storage/img_name/{{$post->img3}}" style="height:130px; width:200px"><br>
        @endif
      </div>
      <div class="col-sm">
          @if($post->img4)
          <img src="/storage/img_name/{{$post->img4}}" style="height:130px; width:200px"><br>
        @endif
      </div>
      <div class="col-sm">
          @if($post->img5)
          <img src="/storage/img_name/{{$post->img5}}" style="height:130px; width:200px"><br>
        @endif
      </div>
      <div class="col-sm">
          @if($post->img6)
          <img src="/storage/img_name/{{$post->img6}}" style="height:130px; width:200px"><br>
        @endif
      </div>
      <div class="col-sm">
          @if($post->img7)
          <img src="/storage/img_name/{{$post->img7}}" style="height:130px; width:200px"><br>
        @endif
      </div>
    </div>
  </div>
    
  
  <div class="container">
            
    <div class="row">
      <div class="col-6">
          <h3>{{$post->uname}}</h3>
          
          <p>Tel:<a href="tel:{{$post->tel}}">{{$post->tel}}</a></p>
          
          
          
      </div>
      <div class="col-6">
          
          <p class="float-right">Addr1:{{$post->addr1}}</p>
          
          <p class="float-right">Price:{{$post->tel}}</p>
          
      </div>
    </div>
    <hr>
  </div>
              
<div class="container">
  <h3>self_state</h3>
  <p>{{$post->intro}}</p>
  <hr>
</div>
                        
<div class="container">
  <div class="row">
    <div class="col-md-5">
          <h3>Persanal Detail</h3>
          <div class="row">
            <div class="col-md-6">

              <ul>
                <li>age:{{$post->age}}</li>
                <li>national:{{$post->national}}</li>
                <li>shape:{{$post->shape}}</li>
                <li>skin:{{$post->skin}}</li>
              </ul>
            </div>
            <div class="col-md-6">

                <ul>
                  <li>height:{{$post->height}}</li>
                  <li>chest:{{$post->chest}}</li>
                  <li>waist:{{$post->waist}}</li>
                  <li>weight:{{$post->weight}}</li>
                </ul>
              </div>
          </div>
    </div>
    <div class="col-md-3">
      <h3>communication</h3>
      <ul>
          <li>lan1:{{$post->lan1}}</li>
          <li>lan2:{{$post->lan2}}</li>
          <li>{{$post->lan_des}}</li>
          
        </ul>
    </div>
    <div class="col-md-4">      
      <h3>price</h3>
      <ul>
        @if($post->price30)
          <li>price30:{{$post->price30}}</li>
          <li>lan2:{{$post->price1h}}</li>
          <li>out:{{$post->price_out}}</li>
          
        @else
          <li>requset for price</li>
        @endif
          <li>{{$post->price_note}}</li>
          
        </ul>
    </div>
          
  </div>
  <hr>
  <div class="container">
      <h3>services</h3>
      <p>main services{{$post->service_des}}</p>
      <p>special services{{$post->special_serv}}</p>
      @if($post->western_serv==0)
          <p>no serve for westerner</p>
      @endif
    </div>
    <hr>
          <small>updated on {{$post->updated_at}} by </small>
         
</div>
                
                    <hr>
                    @if(!Auth::guest())
                        @if(Auth::user()->id==$post->user_id)
                            <a href="/misss/{{$post->id}}/edit" class="btn btn-primary">edit</a>
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        @endif
                    @endif
                <h1></h1>
                user id<h1>{{$post->user_id}}</h1>
                <!--google maps -->
               
            
                
                
                    <div id="map" style="height:333px;width:222px;overflow: visible;"></div>
                    <script>
                      /*var map;
                      function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                          center: {lat: 53.345520, lng: -6.271518},
                          zoom: 15
                        });
                      
                      //
                      
                      
                      }*/
                      /*
                      function initMap() {
                      // The location of Uluru
                      var uluru = {lat: 53.345520, lng: -6.271518};
                      // The map, centered at Uluru
                      var map = new google.maps.Map(
                          document.getElementById('map'), {zoom: 15, center: uluru});
                      // The marker, positioned at Uluru
                      var marker = new google.maps.Marker({position: uluru, map: map});
}

                    */
                    </script>
                    //////
                    <script>
                        function initMap() {
                          var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 15,
                            center: {lat: -34.397, lng: 150.644}
                          });
                          var geocoder = new google.maps.Geocoder();
                          geocodeAddress(geocoder, map);
                          //document.getElementById('submit').addEventListener('click', function() {
                           // geocodeAddress(geocoder, map);
                          //});
                        }
                  
                        function geocodeAddress(geocoder, resultsMap) {
                          //var address = document.getElementById('loc').value;
                          var address='{{$post->addr2}}';
                         
                          geocoder.geocode({'address': address}, function(results, status) {
                            if (status === 'OK') {
                              resultsMap.setCenter(results[0].geometry.location);
                              var marker = new google.maps.Marker({
                                map: resultsMap,
                                position: results[0].geometry.location
                              });
                            } else {
                              alert('Geocode was not successful for the following reason: ' + status);
                            }
                          });
                        }
                      </script>
                    //////
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi9zEbNbmidV5rNdS3kcM0gEW1oAOYelY&callback=initMap"
                    async defer></script>
                  
                
       
   
@endsection
