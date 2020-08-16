<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use  App\Advertising;
class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Advertising::all();
        $title='ادارة الاعلانات في الموقع التعريفي ';
        return view('admin.sit.advertising.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='إضافة إعلان جديدة';
        return view('admin.sit.advertising.create',compact('data','title'));
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
            'text'=>'required',

            'image'=>v_image(),
        ],[],[
            'name'=>'النص ',
            'image'=>'الصوره ',
        ]);


        if(\request()->hasFile('image')){
            $data['image']= up()->upload([
                // new_name => '' ,
                'file'=>'image',
                'path'=>'advertising',
                'upload_type'=>'single',
                'delete_file'=>'',
            ]);
        }

        Advertising::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('sit/advertising'));
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
        $data=Advertising::find($id);
        $title='تعديل الاعلان  ';
        return view('admin.sit.advertising.edit',compact('data','title'));
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
        $d=Advertising::where('id',$id)->first();
        $data=$this->validate(request(),[
            'text'=>'required',

            'image'=>v_image(),
        ],[],[
            'name'=>'النص ',
            'image'=>'الصوره ',
        ]);
        if(\request()->hasFile('image')){
            $data['image']= up()->upload([
                // new_name => '' ,
                'file'=>'image',
                'path'=>'advertising',
                'upload_type'=>'single',
                'delete_file'=>$d->image,
            ]);
        }
        Advertising::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('sit/advertising'));
    }


    public function destroy($id)
    {
        $d=Advertising::where('id',$id)->first();
        Advertising::find($id)->delete();
        Storage::delete($d->image);
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('sit/advertising'));
    }


}
