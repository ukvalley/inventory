@include('users.common.userheader')


 <!-- Main content -->
 <div class="content-wrapper">
 <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="clist.html"> 
                              <i class="fa fa-list"></i> User Registration </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/')}}/user/register_user-update/{{$data->id}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                                
                           <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Name" required>
                              </div>
                              @if($errors->has('name'))
                             <div class="text-danger error">{{ $errors->first('name') }}</div>
                               @endif


                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="number" class="form-control" name="mobile" value="{{$data->mobile}}" placeholder="Enter Mobile" required>
                              </div>
                              @if($errors->has('mobile'))
                             <div class="text-danger error">{{ $errors->first('mobile') }}</div>
                               @endif




                               <div class="form-group">
                                 <label>City</label>
                                 <input type="text" class="form-control" name="city" value="{{$data->city}}" placeholder=" City" required>
                              </div>
                              @if($errors->has('city'))
                             <div class="text-danger error">{{ $errors->first('city') }}</div>
                               @endif

                              


                              <div class="form-group">
                                 <label>Higher Authority</label>
                                 <select class="form-control" name="admiko_parent_child" id="admiko_parent_child">
                                    <option value="0" @if($data->admiko_parent_child == '0') selected="true" @endif >Parent</option>
                                 </select>
                              </div>
                            

                              <div class="form-group">
                              <label>Bacic Amount</label>
                                 <input type="text" class="form-control" name="basic_amount" value="{{$data->basic_amount}}" placeholder=" >Bacic Amount" required>
                              </div>
                              @if($errors->has('basic_amount'))
                             <div class="text-danger error">{{ $errors->first('basic_amount') }}</div>
                               @endif
                              

                              
                               <div class="form-group">
                                 <label>User Type</label>
                                 <select class="form-control"  name="user_type"  id="user_type">
                                    <option>Sales Agent</option>
                                    <option>Technician</option>
                                    <option>Admin</option>
                                 </select>
                              </div>
                              @if($errors->has('user_type'))
                             <div class="text-danger error">{{ $errors->first('user_type') }}</div>
                               @endif
                              


                              

                              
                             

                              <div class="reset-button">
                                 <a href="#" class="btn btn-warning">Reset</a>
                                 <input class="btn btn-success" type="submit" value="Submit" />
                              </div>
                           
                           
                             
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
            </div>

@include('users.common.footer')