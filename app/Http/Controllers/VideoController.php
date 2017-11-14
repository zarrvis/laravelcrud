<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Video;



class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $s = $request->input('s');
      $videos = Video::orderBy('id','DESC')
      ->search($s)
      ->paginate(5);

     return view('Video.index',compact('videos', 's'))
                                                  ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Video.create');
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

          'video_title' => 'required',

          'video_url' => 'required',

      ]);

      //dd($request->all());
      Video::create($request->all());

      return redirect()->route('video.index')

                      ->with('success','Video created successfully');
  }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $video = Video::find($id);
      return view('Video.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $video = Video::find($id);

              return view('Video.edit',compact('video'));
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
      $this->validate($request, [

          'video_title' => 'required',

          'video_url' => 'required',

      ]);


      Video::find($id)->update($request->all());

      return redirect()->route('video.index')

                      ->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Video::find($id)->delete();

      return redirect()->route('video.index')

                      ->with('success','Video deleted successfully');
    }
}
