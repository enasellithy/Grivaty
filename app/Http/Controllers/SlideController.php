<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::orderBy('created_at','asc')->paginate(10);
        return view('admin.slide.index',['title'=>'Slider'],
            compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create',['title'=>'Add New Slider']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[ 
            'heading' => 'required|min:5',
            'sub_title'  => 'required|min:10',
            'body' => 'required|min:25',
            'imageslide' => 'required|mimes:jpeg,bmp,png,jpg'
            ]);
        $slide = new Slide();
        $slide->heading = $request['heading'];
        $slide->sub_title = $request['sub_title'];
        $slide->body = $request['body'];
        if($request->hasFile('imageslide')) 
        {
            $imageslide = $request->file('imageslide');
            $filename = time() . '.' .$imageslide->getClientOriginalExtension();
            $location = public_path('images/slide/'.$filename);
            Image::make($imageslide)->resize(400,400)->save($location);
            Image::make($imageslide)->save($location);
            $slide->imageslide = $filename;
        }
        $slide->save();
        Session::flash('success','Slide Add');
        return redirect()->back();

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
        $slide = Slide::find($id);
        return view('admin.slide.edit')->withSlide($slide);
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
        $this->Validate($request,[ 
            'heading' => 'required|min:5',
            'sub_title'  => 'required|min:10',
            'body' => 'required|min:25'
            ]);
        $slide = Slide::find($id);
        $slide->heading = $request->heading;
        $slide->sub_title = $request->sub_title;
        $slide->body = $request->body;
        $slide->save();
        Session::flash('success','Slide Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        Session::flash('success','Slide Deleted');
        return redirect()->back();
    }
}
