<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ptmiss;

class PtmisssController extends Controller
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
        //
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
            'ptname' => 'required',
            'info' => 'required'
            //'img_name'=>'image|nullable'
            //'image|mimes:jpeg,bmp,png|size:2000'
        ]);
        
         // Handle File Upload
         
         if($request->hasFile('filename')){
            
            foreach ($request->file('filename') as $photo){
                // Get filename with the extension
                $filenameWithExt = $photo->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $photo->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore= $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $photo->storeAs('public/img_name', $fileNameToStore);
                //dd($path);
                
            }
        } else {
            $fileNameToStore = 'no-user.jpg';
        }
           // Create Post
        $ptmiss = new Ptmiss;
        //don't need any more since setTable fuction swap to constructor.
        //$ptmiss -> setTable(Auth::user()->ucountry.'_ptmiss_tbl');
        $ptmiss->city = $request->input('city');
        $ptmiss->ptname = $request->input('ptname');
        $ptmiss->tel = $request->input('tel');
        $ptmiss->img = $fileNameToStore;
        //$ptmiss->img1= $fileNameToStore;
        //$ptmiss->user_id = $request->input('user_id');
        $ptmiss->info = $request->input('info');
        
        $ptmiss->status = 'free';
        //give 1 months free using
        $ptmiss->expire_at = date('Y-m-d', strtotime(' + 1months'));
        //$post->cover_image = $fileNameToStore;
        $ptmiss->user_id = auth()->user()->id;
        $ptmiss->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
