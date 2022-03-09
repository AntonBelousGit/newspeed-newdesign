<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blocks = Block::get();
        return view('admin.blocks.index', compact('blocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blocks_positions = Block::select('title', 'position')->get();
        return view('admin.blocks.create', compact('blocks_positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = request()->validate([
            'title' => ['max:255'],
            'slug' => '',
            'model' => '',
            'themplate' =>'',
            'status' => '',
        ]);
        $event_block = Block::add($fields);
        if($fields['model']=='gallery'){
            $data_gallery['name'] = $fields['slug'];
            $event_gallery = Gallery::add($data_gallery);
        }
        return redirect()->route('admin.blocks.index');
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
        $block = Block::find($id);
        $sidebar_db = Gallery::where('name', '=', $block->slug)->first();
        $gallery = $sidebar_db->value ?? $block->value;
        $gallery_id = $sidebar_db->id ?? '';
        return view('admin.blocks.'.$block->themplate.'.edit', compact('block', 'gallery_id','gallery'));
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
        $data = request()->validate([
            'title' => '',
            'slug' => '',
            'status' =>'',
        ]);
        dd($request);
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
    public function positions(){
        $blocks = Block::all();
        return view('admin.blocks.positions', compact('blocks'));
    }
    public function move_product_to_block(Request $request){
        $data = $this->validate($request, [
            'id' => '',
            'block' => '',
        ]);
        $event = Block::move_product_to_block($data);
        return response()->json([
            'result' => $event,
        ]);
    }
    public function delete_product_from_block(Request $request){

    }

    public function blockStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('blocks')->where('id', $request->id)->update(['status' => '1']);
        } else {
            DB::table('blocks')->where('id', $request->id)->update(['status' => '0']);
        }

        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }
}
