<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use DB;
use App\Miss;
use App\Status;

class MisssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_type=Auth::user()->utype;
            
            switch($user_type){
                case('miss'):
                    return view('posts/create');
                case('massage'):
                    return view('posts/massage_create');
                case('parttime'):
                    return view('posts/parttime_create');
                case('baoyang'):
                    return view('posts/baoyang_create');
                case('commercial'):
                    return view('posts/comercial_create');
                case('holiday'):
                    return view('posts/holiday_create');
                
            }
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'intro' => 'required'
            //'img_name'=>'image|nullable'
            //'image|mimes:jpeg,bmp,png|size:2000'
        ]);


        
        $status = new Status;
        $status_uname=Status::where('uname', '=', auth()->user()->username)->first();
        if ($status_uname===null) {
            // user found
         
        
            $miss = new Miss;
            //$miss -> setTable(Auth::user()->ucountry.'_miss_tbl');
            $miss->city = $request->input('city');
            $miss->name = $request->input('name');
            $miss->tel = $request->input('tel');
            $miss->addr1 = $request->input('addr1');
            $miss->addr2 = $request->input('addr2');
            
            // Handle File Upload
            $i=0;
            if($request->hasFile('filename')){
                
                foreach ($request->file('filename') as $photo){
                    // Get filename with the extension
                    $filenameWithExt = $photo->getClientOriginalName();
                    // Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $photo->getClientOriginalExtension();
                    // Filename to store
                    $fileNameToStore[$i]= $filename.'_'.time().'.'.$extension;
                    // Upload Image
                    $path = $photo->storeAs('public/img_name', $fileNameToStore[$i]);
                    //dd($path);
                    $img_column='img'.$i;
                    $miss->{$img_column}=$fileNameToStore[$i];
                    $i++;
                }
            } else {
                $fileNameToStore = 'no-user.jpg';
                $miss->img0=$fileNameToStore;
            }

            // Create Post
            
            //$miss->img_name = $fileNameToStore[0];
            //if($i>0)
            //need to modify, there is error if only 1 file to upload
            //$img1= $fileNameToStore[1];
            
            
            //$miss->img1=$img1;
            

            //$miss->user_id = $request->input('user_id');
            $miss->intro = $request->input('intro');
            $miss->type = $request->type;
            $miss->status = 'free';
            //give 2 months free using
            //$miss->expire_at = date('Y-m-d', strtotime(' + 2months'));
            //$post->cover_image = $fileNameToStore;
            $miss->user_id = auth()->user()->id;

            $miss->save();


            //store data to status tbl
            
            //$miss -> setTable(Auth::user()->ucountry.'_miss_tbl');
            $status->user_id = auth()->user()->id;
            $status->uname = auth()->user()->username;
            $status->utype = auth()->user()->utype;
            $status->ucountry = auth()->user()->ucountry;
            $status->verified= 0;
            
            $status->status= 'free';
            $status->expire_at = date('Y-m-d', strtotime(' + 2months'));
            $status->last_update=date("Y-m-d");
            $status->save();
       
        return redirect('/posts')->with('success', 'Post Created');
        }else{
            return redirect('/posts')->with('fail', 'U have post already');
        }
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $miss=new Miss;
        $miss -> setTable('爱尔兰_miss_tbl');
        $post= $miss->find($id);
       //$data=
       return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $miss=new Miss;
        $miss -> setTable('爱尔兰_miss_tbl');
        $miss= $miss->find($id);  
       // $miss= Miss::find($id);
       // if(auth()->user()->id!=$miss->user_id){
          
        if(auth()->user()->id!=$miss->user_id){
            //need to confirm if '/posts'
            return redirect('/posts')->with('error','unathorized page');
        }

        return view('posts.miss_edit')->with('miss',$miss);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
