<?php

namespace App\Http\Controllers;
use App\Event;
use App\News;
use App\Slider;
use App\MainInfo;
use App\Advertising;
use App\Department;
use App\ImageNew;
use App\Contact_us;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /*  public function typenews($type)
      {
          $typenews=News::where('type',$type)->get();


          return view('style.home',compact('typenews'));
      }*/




    public  function viewslider($type=null)
    {
        $news=News::paginate(3);

        $slid=Slider::all();

        $typeNews_1=News::orderBy('id','desc')->where('type',1)->limit(3)->get();
        $typeNews_2=News::orderBy('id','desc')->where('type',2)->limit(3)->get();
        $typeNews_3=News::orderBy('id','desc')->where('type',3)->limit(3)->get();
        $typeNews_4=News::orderBy('id','desc')->where('type',4)->limit(3)->get();

        // dd($slid->count());
        $img=ImageNew::limit(5)->orderBy("id",'DESC')->get();

        $advertising=Advertising::all();
        $event=Event::paginate(5);

        return view('style.home')
            ->with('news',$news)
            ->with('slid',$slid)
            ->with('img',$img)
            ->with('event',$event)
            ->with('advertising',$advertising)
            ->with('typeNews_1',$typeNews_1)
            ->with('typeNews_2',$typeNews_2)
            ->with('typeNews_3',$typeNews_3)
            ->with('typeNews_4',$typeNews_4);
    }


    public  function viewadvertise()
    {
        $advertising=Advertising::orderBy('id','asc');

        // dd($news->count());
        //return view('style.home',compact('advertising'));
    }



    public  function viewallnews()
    {
        $lastnews=News::orderBy('id','desc')->paginate(4);

        // dd($news->count());
        return view('style.news',compact('lastnews'));
    }



    public  function showdepartment($id)
    {

        $depts=Department::find($id);
        //dd($depts);
        return view('style.department')
        ->with('depts',$depts)
            ->with('id',$id);

    }

    public  function showmoredetials($id)
    {

        $detials=News::find($id);
        //dd($depts);
        return view('style.moreDetials',compact('detials'));

    }



    public  function addcontact(Request $request)
    {
        $data=$this->validate(request(),[
            'contact_name'=>'required|string',
            'email'=>'required|email',
            'subject'=>'required|string',
            'message'=>'required|string',
        ],[],[
            'contact_name'=>trans('admin.contact_name'),
            'email'=>trans('admin.email'),
            'subject'=>trans('admin.subject'),
            'message'=>trans('admin.message'),
        ]);
        $data['view']=0;

        Contact_us::create($data);
        session()->flash('success',trans('admin.record_added'));
        return view ('style.contactUs');


    }











    public function contactSend(){
        $data=$this->validate(request(),[
            'contact_name'=>'required',
            'email'=>'required|email',
            'type'=>'required|integer',
            'message'=>'required',
            'subject'=>'required',
        ],[],[
            'contact_name'=>trans('admin.name'),
            'email'=>trans('admin.email'),
            'type'=>trans('admin.type'),
            'subject'=>trans('admin.subject'),
            'message'=>trans('admin.message'),
        ]);


        Contact_us::create($data);
        session()->flash('success',trans('all.send_success'));
        return redirect()->back();
    }




    public function homeView(){
        $news=News::orderBy('id','desc')->paginate(9);
        $video=News_video::orderBy('id','desc')->paginate(9);
        return view('style.home',compact('news','video'));
    }



    public function newsView(){
        $news;
        $type=0;
        if(request()->has('type')){
            $type=request('type');
            $news=News::where('type',$type)->get();
        }else{
            $news=News::all();
        }
        return view('style.profile',compact('news','type'));
    }



    public function detailView($id){
        $news=News::orderBy('id','desc')->paginate(9);
        $detail=News::find($id);
        return view('style.details',compact('news','detail'));
    }


    public function service(){
        $data1=Service::where('type',1)->get();
        $data2=Service::where('type',3)->get();

        return view('style.service',compact('data1','data2'));
    }
}
