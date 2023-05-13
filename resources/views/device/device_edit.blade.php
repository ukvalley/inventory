@include('common_admin.header')


 <!-- Main content -->
 <div class="content-wrapper">
 <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="clist.html"> 
                              <i class="fa fa-list"></i> Device Registration </a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3>Devices Table</h3>
                           <form class="col-sm-6" action="{{url('/')}}/admin/add_device-update/{{$data->id}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                                
                    <div class="form-group">
                                 <label>Manufactured By</label>
                                 <select class="form-control" name="manufactured_by" id="manufactured_by">

                                 @foreach ($allmanifacturer as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                 @endforeach
                              </select>
                                 </div>

                                    
                           <div class="form-group">
                                 <label>ICE ID</label>
                                 <input type="text" class="form-control" name="ice_id"  value="{{$data->ice_id}}"  placeholder=" ICE ID" required>
                              </div>
                              @if($errors->has('ice_id'))
                             <div class="text-danger error">{{ $errors->first('ice_id') }}</div>
                               @endif

                              <div class="form-group">
                                 <label>IMEI</label>
                                 <input type="text" class="form-control" name="imei" value="{{$data->imei}}"  placeholder="IMEI" required>
                              </div>
                              @if($errors->has('imei'))
                             <div class="text-danger error">{{ $errors->first('imei') }}</div>
                               @endif

                              <div class="form-group">
                                 <label>SIM1</label>
                                 <input type="text" class="form-control" name="sim1" value="{{$data->sim1}}"  placeholder="SIM1" required>
                              </div>
                              @if($errors->has('sim1'))
                             <div class="text-danger error">{{ $errors->first('sim1') }}</div>
                               @endif

            
                              <div class="form-group">
                                 <label>SIM1 Type</label>
                                     <select class="form-control" name="sim_1_type" id="sim_1_type">
                                   @foreach ($sim_get as $value){ 
                                    <option value="{{$value->id}}" >{{$value->name}}</option>
                                 @endforeach
                                 </select>
                                  
                              </div>
                              @if($errors->has('sim1_type'))
                             <div class="text-danger error">{{ $errors->first('name') }}</div>
                               @endif

                              <div class="form-group">
                                 <label>SIM2</label>
                                 <input type="text" class="form-control" name="sim2" value="{{$data->sim2}}"  placeholder="SIM2" required>
                              </div>
                              @if($errors->has('sim2'))
                             <div class="text-danger error">{{ $errors->first('sim2') }}</div>
                               @endif

            
                              <div class="form-group">
                                 <label>SIM2 Type</label>
                                     <select class="form-control" name="sim_2_type" id="sim_2_type">
                                   @foreach ($sim_get as $value){ 
                                    <option value="{{$value->id}}" >{{$value->name}}</option>
                                 @endforeach
                                 </select>
                                  
                              </div>
                              @if($errors->has('sim2_type'))
                             <div class="text-danger error">{{ $errors->first('sim2_type') }}</div>
                               @endif

                              <div class="form-group">
                                 <label>Activation Date</label>
                                 <input id='activation_date' type="Date" name="activation_date" value="{{$data->activation_date}}"  data-date_time_format="MMM DD, Y" class="form-control" placeholder="Enter Activation Date...">
                              </div>
                              @if($errors->has('activation_date'))
                             <div class="text-danger error">{{ $errors->first('activation_date') }}</div>
                               @endif


                              <div class="form-group">
                                 <label>Received Date</label>
                                 <input id='received_date' type="Date" name="received_date" value="{{$data->received_date}}"   data-date_time_format="MMM DD, Y" class="form-control" placeholder="Enter  Received Date...">
                        
                              </div>
                              @if($errors->has('received_date'))
                             <div class="text-danger error">{{ $errors->first('received_date') }}</div>
                               @endif


                              
                              <div class="form-group">
                                 <label>Renewal Date</label>
                                 <input id='renewal_date' type="Date" name="renewal_date" value="{{$data->renewal_date}}"  data-date_time_format="MMM DD, Y" class="form-control" placeholder="Enter Renewal Date...">
                              </div>
                              @if($errors->has('renewal_date'))
                             <div class="text-danger error">{{ $errors->first('renewal_date') }}</div>
                               @endif
                               
                               


                              

                              <div class="form-group">
                                 
                                 <label>User Id</label>
                                 <input type="text" class="form-control" name="user_id" value="{{$data->user_id}}" placeholder="user_id" >
                              </div>
                              <div class="form-group">
                                 <label>Customer Id</label>
                                 <input type="text" class="form-control" name="customer_id" value="{{$data->customer_id}}" placeholder="customer_id" >
                              </div>

                             
                              
                             

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

@include('common_admin.footer')