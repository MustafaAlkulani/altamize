@extends('admin.index')

@section('content')
 
  

  @if(!empty($insert_data))
       

         <div class="box">
              <div class="box-header">
              <h3 class="box-title">{{ "البيانات التي تمت اضافتها"}}  </h3>
              </div>
     
        

                           <div class="table-responsive ">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>
                                      رقم الطالب 
                                    </th>

                                      <th>
                                    السنه
                                    </th>
                                    <th>
                                      الدرجة

                                    </th>
                                        <th>
                                    التقدير
                                    </th>
                                   
                           

                                </tr>
                                </thead>


                                <tbody>


                                      @foreach ( $insert_data as $role)
                                          <tr>
                                              <td> {{$role['student_id']}}     </td>

                                               <td> {{$role['year']}}     </td>
                                              <td>
                                                 {{$role['grade']}}
                                              </td>
                                               <td> {{$role['rate']}}     </td>
                                              
                                             




                                          </tr>
                                      @endforeach

                                 </tbody>


                            </table>
                        </div>







         </div>
        </div>
      
    @endif
  @if(!empty($error_data))
       

         <div class="box">
              <div class="box-header">
              <h3 class="box-title">{{ "البيانات الخطأ" }}  </h3>
              </div>
     
        

                           <div class="table-responsive ">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>
                                       id
                                    </th>
                                    <th>
                                       ملاحظة

                                    </th>
                           

                                </tr>
                                </thead>


                                <tbody>

                                
                                      @foreach ( $error_data as $role)
                                          <tr>
                                              <td> {{$role['type']}}     </td>
                                              <td>
                                                 {{$role['note'] }}
                                              </td>
                                             




                                          </tr>
                                      @endforeach

                                 </tbody>


                            </table>
                        </div>







         </div>
        </div>
      
    @endif
    
    










@endsection
