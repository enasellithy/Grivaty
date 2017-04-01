<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at','asc')->paginate(10);
        return view('admin.service.index',['title'=>'Services'],
            compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Service.create',['title'=>'Add Service']);
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
            'body'  => 'required|min:50'
            ]);
        $services = new Service();
        $services->heading = $request['heading'];
        $services->body = $request['body'];
        if($request->hasFile('simage'))
        {
            $pimage = $request->file('simage');
            $filename = time() . '.' .$simage->getClientOriginalExtension();
            $location = public_path('images/service/'.$filename);
            Image::make($simage)->resize(400,400)->save($location);
            Image::make($simage)->save($location);
            $portfolio->simage = $filename;
        }
        $services->save();
        Session::flash('success','Service Add');
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
        $service = Service::find($id);
        return view('admin.service.edit')->withService($service);
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
            'body'  => 'required|min:50'
            ]);
        $service = Service::find($id);
        $service->heading = $request->heading;
        $service->body = $request->body;
        $service->save();
        Session::flash('success','Service Update');
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
        $service = Service::find($id);
        $service->delete();
        Session::flash('success','Service Deleted');
        return redirect()->back();
    }

    public function active($id)
    {
        $service = Service::find($id);   
        $service->active = 1;
        $service->save();
        Session::flash('success','Service Active');
        return redirect()->back();
    }

    public function noactive($id)
    {
        $service = Service::find($id);   
        $service->active = 0;
        $service->save();
        Session::flash('success','Service No Active');
        return redirect()->back();
    }

}
