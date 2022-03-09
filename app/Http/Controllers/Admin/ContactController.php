<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.contact.edit');
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
        $fields = request()->validate([
            'name' => '',
            'slug' => '',
        ]);
        //$fields['value'] = $fields;
        $event_contact = Contact::add($fields);
        return redirect()->route('admin.contact.edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contact = $contact->value;
        $contact = $contact ?? [];
        return view('admin.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $fields = request()->validate([
            'name' => ['required:max:255'],
            'slug' => '',
            'value' => '',
        ]);
        // dd($data_fields);

        $event = Contact::update_contact($fields, $contact);
        if($event->wasRecentlyCreated){
            return back()->with('message','Contact Updated');
        }else{
            return back()->with('fail', 'Something went wrong! Try again later!');
            //return response()->json([ 'save_errors' =>'Opps! Sorry!!! Something went wrong, review not added :-(Try again! Your opinion is important to us!!!', 'offers' =>$request->offers_stars, 'payout' =>$request->payout_stars, 'support' =>$request->support_stars, 'affiliate_id' =>$affiliate_id,]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
