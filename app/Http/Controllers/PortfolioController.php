<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use Intervention\Image\ImageManagerStatic as Image;
use Session;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::orderBy('created_at','desc')->paginate(6);
        return view('admin.portfolio.index',['title'=>'Portfolio'],
            compact('portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
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
            'heading' => 'required',
            'sub_title'  => 'required',
            'body' => 'required',
            'question' => 'required',
            'client' => 'required',
            'pimage' => 'required|mimes:jpeg,bmp,png,jpg',
            'toggle_image' => 'required|mimes:jpeg,bmp,png,jpg'
            ]);
        $portfolio = new Portfolio();
        $portfolio->heading = $request['heading'];
        $portfolio->sub_title = $request['sub_title'];
        $portfolio->body = $request['body'];
        $portfolio->question = $request['question'];
        $portfolio->client = $request['client'];
        if($request->hasFile('pimage')) 
        {
            $pimage = $request->file('pimage');
            $filename = time() . '.' .$pimage->getClientOriginalExtension();
            $location = public_path('images/portfolio/'.$filename);
            Image::make($pimage)->resize(400,400)->save($location);
            Image::make($pimage)->save($location);
            $portfolio->pimage = $filename;
        }
        if($request->hasFile('toggle_image')) 
        {
            $toggle_image = $request->file('toggle_image');
            $filename = time() . '.' .$toggle_image->getClientOriginalExtension();
            $location = public_path('images/portfolio/'.$filename);
            Image::make($toggle_image)->resize(400,400)->save($location);
            Image::make($toggle_image)->save($location);
            $portfolio->toggle_image = $filename;
        }
            $portfolio->save();
            Session::flash('success','Portfolio Add');
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
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit')->withPortfolio($portfolio);
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
            'heading' => 'required',
            'sub_title'  => 'required',
            'body' => 'required',
            'question' => 'required',
            'client' => 'required'
            ]);
        $portfolio = Portfolio::find($id);
        $portfolio->heading = $request->heading;
        $portfolio->sub_title = $request->sub_title;
        $portfolio->body = $request->body;
        $portfolio->question = $request->question;
        $portfolio->client = $request->client;
        $portfolio->save();
        Session::flash('success','Portfolio Updated');
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
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        Session::flash('success','Portfolio Deleted');
        return redirect()->back();
    }
    public function active($id)
    {
        $portfolio = Portfolio::find($id);   
        $portfolio->active = 1;
        $portfolio->save();
        Session::flash('success','Portfolio Active');
        return redirect()->back();
    }

    public function noactive($id)
    {
        $portfolio = Portfolio::find($id);   
        $portfolio->active = 0;
        $portfolio->save();
        Session::flash('success','Portfolio No Active');
        return redirect()->back();
    }
}
