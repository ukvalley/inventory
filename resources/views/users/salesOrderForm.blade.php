@include('users.common.userheader')


<div class="content-wrapper">
<section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="clist.html"> 
                              <i class="fa fa-list"></i> Sales Order</a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3>SalesOrder Table</h3>
                           <form class="col-sm-6" action="{{url('/')}}/salesformPost" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
              
                                
                           <div class="form-group">
                                 <label>Manifactured_by</label>
                                 <input type="text" class="form-control" name="manifactured_by" placeholder=" manifactured_by" value="manifactured_by" required>
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
                                 <label>User_id</label>
                                 <input type="text" class="form-control" name="user_id" placeholder="user_id" required>
                              </div>
                              <div class="form-group">
                                 <label>allocated_to</label>
                                 <input type="text" class="form-control" name="allocated_to" placeholder="allocated_to" required>
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
</div>

@include('users.common.footer')