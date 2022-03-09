<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = new Blog;
        $blogs = $blogs->orderBy('updated_at', 'desc')->get();
        return view('admin.blogs.index', compact( 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.includes.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data_fields = request()->validate([
            'title' => ['required:max:255'],
            'image' => '',
            'intro' => '',
            'text' => '',
        ]);
        $event = Blog::add($data_fields);
        //dd($event->id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $event->UploadBlogMainImage($file, $event->id);
        }
        if($event->wasRecentlyCreated){
            return redirect()->route('admin.blogs.index')->with('message','Blog Saved');
        }else{
            return back()->with('fail', 'Something went wrong! Try again later!');
            //return response()->json([ 'save_errors' =>'Opps! Sorry!!! Something went wrong, review not added :-(Try again! Your opinion is important to us!!!', 'offers' =>$request->offers_stars, 'payout' =>$request->payout_stars, 'support' =>$request->support_stars, 'affiliate_id' =>$affiliate_id,]);
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
        $blog = Blog::where('id', '=', $id)->first();
        return view('admin.blogs.includes.update.index', compact('blog'));
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
        //dd($request);
        $data_fields = request()->validate([
            'title' => ['required:max:255'],
            'image' => '',
            'old_image' => '',
            'intro' => '',
            'text' => '',
        ]);
        // dd($data_fields);

        $event = Blog::update_blog($data_fields, $id);
        if($request->hasFile('image')){
            if($request->has('old_image')){
                Blog::delete_main_blog_image($id);
            }
            $file = $request->file('image');
            $event->UploadBlogMainImage($file, $id);
        }
        if($event->wasRecentlyCreated){
            return back()->with('message','Blog Updated');
        }else{
            return back()->with('fail', 'Something went wrong! Try again later!');
            //return response()->json([ 'save_errors' =>'Opps! Sorry!!! Something went wrong, review not added :-(Try again! Your opinion is important to us!!!', 'offers' =>$request->offers_stars, 'payout' =>$request->payout_stars, 'support' =>$request->support_stars, 'affiliate_id' =>$affiliate_id,]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::blog_destroy($id);
        return redirect()->route('admin.blogs.index');
    }
    public function delete_main_blog_image(Request $request){
        if($request->has('_token')){
            //return response()->json([ 'event' => $request->id]);
            $event = Blog::delete_main_blog_image($request->id);
            //return response()->json([ 'event' => $event]);
            if($event !==null && $event->wasChanged()){
                return response()->json([ 'review' =>$request->review, 'offers' =>$request->offers_stars, 'payout' =>$request->payout_stars, 'support' =>$request->support_stars, 'affiliate_id' =>$affiliate_id,]);
            }else{
                return response()->json([ 'save_errors' => $event]);
                //return response()->json([ 'save_errors' =>'Opps! Sorry!!! Something went wrong, review not added :-(Try again! Your opinion is important to us!!!', 'offers' =>$request->offers_stars, 'payout' =>$request->payout_stars, 'support' =>$request->support_stars, 'affiliate_id' =>$affiliate_id,]);
            }
        }
        return redirect()->back();
    }
}
