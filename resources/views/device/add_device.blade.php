@include('common.header')


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
                           <form class="col-sm-6" action="{{url('/')}}/add_device-post" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                                
                           <div class="form-group">
                                 <label>Make</label>
                                 <input type="text" class="form-control" name="make" placeholder=" Make" required>
                              </div>

                                    
                           <div class="form-group">
                                 <label>ICE ID</label>
                                 <input type="text" class="form-control" name="ice_id" placeholder=" ICE ID" required>
                              </div>

                              <div class="form-group">
                                 <label>IMEI</label>
                                 <input type="text" class="form-control" name="imei" placeholder="IMEI" required>
                              </div>

                              <div class="form-group">
                                 <label>SIM1</label>
                                 <input type="text" class="form-control" name="sim1" placeholder="SIM1" required>
                              </div>

            
                              <div class="form-group">
                                 <label>SIM1 Type</label>
                                     <select class="form-control" name="sim1_type" id="sim1_type">
                                   @foreach ($sim_get as $value){ 
                                    <option value="{{$value->id}}">{{$value->name}}</option>}
                                 @endforeach
                                 </select>
                                  
                              </div>


                              <div class="form-group">
                                 <label>SIM2</label>
                                 <input type="text" class="form-control" name="sim1" placeholder="SIM1" required>
                              </div>

            
                               <div class="form-group">
                                 <label>SIM2 Type</label>
                                     <select class="form-control" name="sim2_type" id="sim2_type">
                                   @foreach ($sim_get as $value){ 
                                    <option value="{{$value->id}}" >{{$value->name}}</option>}
                                 @endforeach
                                 </select>
                                  
                              </div>


                              <div class="form-group">
                                 <label>Activation Date</label>
                                 <input id='minMaxExample1' type="Date" name="activation_date" data-date_time_format="MMM DD, Y" class="form-control" placeholder="Enter Activation Date...">
                              </div>
                              <div class="form-group">
                                 <label>Received Date</label>
                                 <input id='minMaxExample2' type="Date" name="received_date" data-date_time_format="MMM DD, Y" class="form-control" placeholder="Enter  Received Date...">
                              </div>
                              
                             
                               <div class="form-group">
                                 <label>Renewal Date</label>
                              <input type="Date"  data-date_time_format="MMM DD, Y" class="form-control datetimepicker-input datePicker" name="renewal_date"  data-target="datePicker_renewal_date" data-toggle="datetimepicker" placeholder="Renewal Date" >
                                </div>
                              
                                <div class="form-group">
                                 <label>Asset Id Type</label>
                                 <input type="text" class="form-control" name="asset_id_type" placeholder="asset_id_type" required>
                              </div>

                              <div class="form-group">
                                 <label>User Id</label>
                                 <input type="text" class="form-control" name="user_id" placeholder="user_id" required>
                              </div>
                              <div class="form-group">
                                 <label>Customer Id</label>
                                 <input type="text" class="form-control" name="customer_id" placeholder="customer_id" required>
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




@include('common.footer')