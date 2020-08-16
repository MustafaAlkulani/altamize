<?php

namespace App\Http\Controllers\Admin;

use App\MainInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public  function setting($name){
        $setting=\App\MainInfo::where('name', $name)->first();
        $title='تعديل '.$setting->slug;
    return view('admin.sit.editMainInfo',compact('setting','title'));
}

public function setting_save(Request $request){

    foreach (array_except( $request->toArray(),['_token','submit']) as $key=>$rq){
        $siteSettingUpdate=MainInfo::where('name',$key)->get()[0];

        //
        if($siteSettingUpdate->type !=3) {
            $siteSettingUpdate->fill(['value'=>$rq])->save();
            // $siteSettingUpdate->fill(['only' => ['value' => $rq]])->save();
        }
        else{

            $fildName= up()->upload([
                    // new_name => '' ,
                    'file'=>$key,
                    'path'=>'setting',
                    'upload_type'=>'single',
              //  'delete_file'=>'',
                   'delete_file'=>$siteSettingUpdate->value,
                ]);
            if($fildName){
                $siteSettingUpdate->fill(['value' =>$fildName])->save();
            }
        }
    }

     session()->flash('success','تم التعديل بنجاح');
     return redirect(aurl('sit/mainInfo'));
    }
}
