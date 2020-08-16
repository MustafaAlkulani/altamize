<?php

namespace App\Http\Controllers\Admin;

use App\GroupMember;
use App\UserAccount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\UsersDatatable;
use  App\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDatatable $admin)
    {
        //
        return $admin->render('admin.social.acounts.index',['title'=>trans('admin.users')]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=UserAccount::findOrFail($id);
       // dd($user->useraccountable);
       //dd($user->groupMember->first()->group->studyCourse->study_plan);
        $title='حساب المستخدم ';
        return view('admin.social.acounts.singelAcount',compact('user','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $title=trans('admin.edit');
        return view('admin.users.edit',compact('user','title'));
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
            'name'=>'required',
            'level'=>'required|in:user,company,vendor',
            'email'=>'required|email:users,email,'.$id,
            'password'=>'sometimes|nullable|min:6',
        ],[],[
            'name'=>trans('admin.name'),
            'level'=>trans('admin.level'),
            'email'=>trans('admin.email'),
            'password'=>trans('admin.password'),
        ]);
        if($request->has('password')){
            $data['password']=bcrypt(request('password'));
        }
        User::where('id',$id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        User::find($id)->delete();


        $data = deleteUserAccount($id);

        if ($data == true) {
            session()->flash('success',trans('admin.record_deleted'));
            return redirect()->back();
        } else {
            session()->flash('error', 'هناك خطاء ما لم يتم الحذف ');
            return redirect()->back();
        }


    }


    public  function  multe_delete(){
        if(is_array(\request('item'))){
            User::destroy(\request('item'));
        }else{
            User::find(\request('item'))->delete();
            session()->flash('success',trans('admin.record_deleted'));
            return redirect()->back();
        }
    }

    public function changePassword(Request $request, $id){
        $data=UserAccount::findOrFail($id);
        if(isset($request->newpassword)){

            $newpass=bcrypt($request->newpassword);
            UserAccount::where('id',$id)->update(['password'=>$newpass]);
            session()->flash('success','تم تغير كلمة السر الى الكلمة المدخلة  بنجاح');
            return redirect()->back();
        }
       elseif ($request->ssn == true){

           $newpass=bcrypt($data->userAccountable->ssn);
           UserAccount::where('id',$id)->update(['password'=>$newpass]);
           session()->flash('success','تم تغير كلمة السر الى الرقم الوطني(ssn) بنجاح  ');
           return redirect()->back();
       }else{


            $newpass=bcrypt($data->userAccountable->phone);
            UserAccount::where('id',$id)->update(['password'=>$newpass]);
            session()->flash('success','تم تغير كلمة السر  الى رقم الهاتف بنجاح    ');
            return redirect()->back();
        }


    }


//    public function deleteUserGroup($groupMember_id){
//       $ruselt= deleteMemberGroup(0,$groupMember_id);
//       if($ruselt == true){
//           //GroupMember::where(['user_id'=>$id,'group_id'=>$group_id])->delete();
//
//           session()->flash('success','تم حذف المستخدم من المجموعة بنجاح');
//           return redirect()->back();
//       }else{
//           session()->flash('error','حدث خطاء ما , او البيانات غير صحيحة ');
//           return redirect()->back();
//       }
//
//    }


}
