<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Portfolio;
use App\Team;
use App\About;
use App\Service;
use App\Brand;
use App\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mail = Mail::get();
        $brand = Brand::get();
        $service = Service::get();
        $about = About::get();
        $team = Team::get();
        $portfolio = Portfolio::get();
        $slide = Slide::get();
        return view('admin.index',['title'=>'Cpanel'],
            compact('slide','portfolio','team','about','service','brand','mail'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mail = Mail::find($id);
        return view('admin.mail-show')->withMail($mail);
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
        $mail = Mail::find($id);
        $mail->delete();
        Session::flash('success','Message Deleted');
        return redirect()->back();
    }

    public function mail()
    {
        $mail = Mail::get();
        $mail = Mail::orderBy('created_at','desc')->paginate(3);
        return view('admin.mail',['title'=>'Mail'],
            compact('mail'));
    }

    public function replay(Request $request, $id)
    {
        $mail = Mail::find($id);
        dd($id,$request->all());
    }
}
