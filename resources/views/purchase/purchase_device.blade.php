
@include('common_admin.header')



<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="purchase_device"> 
                              <i class="fa fa-list"></i>Add Device Purchase Details </a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3> Purchase Details </h3>
                           <form class="col-sm-6" action="{{url('/')}}/admin/purchase_device-post" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                    
                 

                        <div class="form-group">
                                 <label>Date</label>
                                 <input type="date"  class="form-control" name="date" placeholder="Date" required>
                              </div>

                              <!-- <div class="form-group">
                               
                                 <label>Device ID</label>
                                 <input type="text" class="form-control"  name="device_id" placeholder=" device_id" required>
                              </div> -->

                              <div class="form-group">
                                 <label>Ice Id</label>
                                 <input type="text" class="form-control" name="ice_id" placeholder="ice_id" required>
                              </div>

                              <div class="form-group">
                                 <label>Amount</label>
                                 <input type="text" class="form-control" name="amount" placeholder="amount" required>
                              </div>
                              <div class="form-group">
                                 <label>Quantity</label>
                                 <input type="text" class="form-control" name="quantity" placeholder="quantity" required>
                              </div>

                               <div class="form-group">
                                 <label>Manufactured By</label>
                                 <select class="form-control" name="manufactured_by" id="manufactured_by">

                                 @foreach ($allmanifacturer as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                 @endforeach
                              </select>
                                 </div>

                              <div class="form-group">
                                 <label>IMEI</label>
                                 <input type="text" class="form-control" name="imei" placeholder="imei" required>
                              </div>
                               
                              <div class="form-group">
                                 <label>Device Status</label >
                                 <select  class="form-control" name="device_status"  id="device_status" >
                                 <option  value="unsold">Unsold</option>
                                 <option  value="sold"> Sold </option>
                                 </select>

                              </div>
                              <div class="form-group">
                                 <label>SIM1 Number</label>
                                 <input type="text" class="form-control" name="sim1_number" placeholder="sim1_number" required>
                              </div>

            
                              <div class="form-group">
                                 <label>SIM1 Type</label>
                                     <select class="form-control" name="sim_1_type" id="sim_1_type">
                                   @foreach ($sim_get as $value){ 
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                  @endforeach
                                 </select>
                                  
                              </div>


                              <div class="form-group">
                                 <label>SIM2 Number</label>
                                 <input type="text" class="form-control" name="sim2_number" placeholder="sim2_number" required>
                              </div>

            
                               <div class="form-group">
                                 <label>SIM2 Type</label>
                                     <select class="form-control" name="sim_2_type" id="sim_2_type">
                                   @foreach ($sim_get as $value){ 
                                    <option value="{{$value->id}}" >{{$value->name}}</option>
                                 @endforeach
                                 </select>
                                   </div>

                                 <div class="form-group">
                                 <label>User </label>
                                  
                                 <select class="form-control" name="user_id" >
                                   @foreach ($allusers as $value)
                                   
                                    <option value="{{$value->id}}" >{{$value->name}}</option>
                                   @endforeach
                                 </select>
                                
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


 <!-- Main content -->

            </div>





@include('common_admin.footer')