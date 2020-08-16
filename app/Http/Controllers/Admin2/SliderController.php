<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use  App\Slider;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Slider::all();
        $title='ادارة الصور المتحركة في الموقع التعريفي ';
        return view('admin.sit.slider.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='اضافة صورة جديدة';
        return view('admin.sit.slider.create',compact('data','title'));
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
                'path'=>'slider',
                'upload_type'=>'single',
                'delete_file'=>'',
            ]);
        }

        Slider::create($data);
        session()->flash('success',trans('admin.record_added'));
        return redirect(aurl('sit/slider'));
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
        $data=Slider::find($id);
        $title='تعديل الصورة  ';
        return view('admin.sit.slider.edit',compact('data','title'));
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
        $d=Slider::where('id',$id)->first();
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
                'path'=>'slider',
                'upload_type'=>'single',
                'delete_file'=>$d->image,
            ]);
        }
        Slider::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('sit/slider'));
    }


    public function destroy($id)
    {
        $d=Slider::where('id',$id)->first();
        Slider::find($id)->delete();
        Storage::delete($d->image);
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('sit/slider'));
    }


}
