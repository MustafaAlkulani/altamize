<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\ImageNew;
use  App\News;
class PostNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=News::all();
        $title='الاخبار ';
        return view('admin.sit.news.index',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='اضافة منشور جديد';
        return view('admin.sit.news.create',compact('data','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nicename=[];
        $i=0;
        foreach (\request()->file('file') as $file){
            $nicename['file.'.$i]='The file('. $i.' )';
            $i++;
        }
        $files=$this->validate(request(),[
            'file.*'=>v_image(),
        ],[],[             $nicename        ]);

        $data=$this->validate(request(),[
            'title'=>'required',
            'type'=>'required|integer',
            'detail'=>'required',
            'file.*'=>v_image(),
        ],[],[
            'title'=>'عنوان الخبر ',
            'detail'=>'تفاصيل الخبر',
            'type'=>'نوع الخبر',
            $nicename
        ]);

      $d= News::create($data);
       $id=$d->id;
        if(\request()->hasFile('file')) {
                    $dataM = up()->upload([
                        //  'new_name' => '' ,
                        'file' => 'file',
                        'path' => 'news',
                        'upload_type' => 'multiple',
                        'delete_file' => '',
                    ]);

            foreach ($dataM as $file) {
                $im['new_id']=$id;
                $im['path']=$file;
                ImageNew::create($im);
            }
        }
        session()->flash('success','تم اضافة المنشور بنجاح');
        return redirect(aurl('sit/postNews'));
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
        $data=News::find($id);
        $dataM=ImageNew::where('new_id',$id);
        $title='تعديل المنشور ';
        return view('admin.sit.news.edit',compact('data','title'));
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
        if($request->has('delete_photo') and $request->has('file_id')){
            foreach ($request->input('file_id') as $fid){
               $path=ImageNew::find($fid);
                Storage::delete($path->path);
                ImageNew::where('id',$path->id)->delete();
            }

            session()->flash('success','photo is Delete');
            return redirect(aurl('sit/postNews/'.$id.'/edit'));
        }
        else{
        $nicename = [];
        if(\request()->hasFile('file')) {
            $nicename = [];
            $i = 0;
            foreach (\request()->file('file') as $file) {
                $nicename['file.' . $i] = 'The file(' . $i . ' )';
                $i++;
            }
        }

        $data=$this->validate(request(),[
            'title'=>'required',
            'type'=>'required|integer',
            'detail'=>'required',
            'file.*'=>v_image(),
        ],[],[
            'title'=>'عنوان الخبر ',
            'detail'=>'تفاصيل الخبر',
            'type'=>'نوع الخبر',
            $nicename
        ]);

         News::where('id',$id)->update(['title'=>$data['title'],'type'=>$data['type'],'detail'=>$data['detail']]);
        $id=News::where('id',$id)->first()->id;
        if(\request()->hasFile('file')) {
            $dataM = up()->upload([
                //  'new_name' => '' ,
                'file' => 'file',
                'path' => 'news',
                'upload_type' => 'multiple',
                'delete_file' => '',
            ]);

            foreach ($dataM as $file) {
                $im['new_id']=$id;
                $im['path']=$file;
                ImageNew::create($im);
            }
        }
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('sit/postNews'));
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

        News::where('id',$id)->delete();
        $d=ImageNew::where('new_id',$id)->get();
           foreach ($d as $value){
            Storage::delete($value->path);
        }

        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('sit/postNews'));
    }


}
