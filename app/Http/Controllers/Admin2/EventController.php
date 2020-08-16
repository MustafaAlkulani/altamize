<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use  App\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Event::all();
        $title='ادارة الاحداث في الموقع التعريفي ';
        return view('admin.sit.event.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='إضافةحدث جديدة';
        return view('admin.sit.event.create',compact('data','title'));
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
        $data=$this->validate(request(),[
            'context'=>'required|string',

            'date'=>'required|date',
        ],[],[
            'context'=>'النص ',
            'date'=>'التاريخ ',
        ]);



        Event::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('sit/event'));
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


    public function edit($id)
    {
        $data=Event::find($id);
        $title='تعديل الحدث  ';
        return view('admin.sit.event.edit',compact('data','title'));
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

        $data=$this->validate(request(),[
            'context'=>'required|string',

            'date'=>'required|date',
        ],[],[
            'context'=>'النص ',
            'date'=>'التاريخ ',
        ]);

        Event::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('sit/event'));
    }


    public function destroy($id)
    {
        Event::find($id)->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('sit/event'));
    }


}
