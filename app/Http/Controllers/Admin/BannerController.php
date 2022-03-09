<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Block;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $product_route = '/catalog/product/';
    protected $category_route = '/catalog/category/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        $gallery_blocks = Block::where('model', '=', 'gallery')->get();
        return view('admin.banners.index', compact('banners', 'gallery_blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_fields = request()->validate([
            'model' => '',
            'model_id' => '',
            'title' => ['max:255'],
            'img' => '',
        ]);
//        $data_fields['url'] = $data_fields['model']->where('id', '=', $data_fields['model_id'])>first()->slug;
        $data_fields['url'] = $this->model($data_fields['model'], $data_fields['model_id']);
        //$data_fields['value'] =  [ 'title' => $data_fields['title'] ?? '', 'img' => $data_fields['img'] ?? '', 'url' => $data_fields['url']];
        $event_banner = Banner::add($data_fields);
//dd($event_banner);
        if($request->hasFile('img')){
            $file = $request->file('img');
            $event_banner->UploadBannerImage($file);
        }
        return redirect()->route('admin.banners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
    public function model($model, $model_id){
            return $this->$model($model_id);
    }
    public function Product($model_id){
        return route('index').$this->product_route.Product::where('id', '=', $model_id)->first()->slug;
    }
    public function Category($model_id){
        return route('index').$this->category_route.Category::where('id', '=', $model_id)->first()->slug;
    }

}
