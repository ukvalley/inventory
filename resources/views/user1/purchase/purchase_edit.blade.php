
@include('common.header')



<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="clist.html"> 
                              <i class="fa fa-list"></i> Purchase Details </a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3>Add Purchase Details </h3>
                           <form class="col-sm-6" action="{{url('/')}}/purchase_device-update/{{$data->id}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field()}}
                    
                        <div class="form-group">
                                 <label>Date</label>
                                 <input type="Date" class="form-control" name="date" required pattern="\d{3}-\d{2}-\d{4}" placeholder=" Date" value="{{$data->date}}"  required>
                             
                              </div>
                                 @if($errors->has('date'))
                                 <div class="text-danger error">{{ $errors->first('date') }}</div>
                                  @endif
                               



                             
                              <div class="form-group">
                                 <label>Ice Id</label>
                                 <input type="text" class="form-control" name="ice_id" value="{{$data->ice_id}}" placeholder="device_number" required>
                              </div>
                              @if($errors->has('ice_id'))
                             <div class="text-danger error">{{ $errors->first('ice_id') }}</div>
                               @endif
                               




                              <div class="form-group">
                                 <label>Amount</label>
                                 <input type="text" class="form-control" name="amount" value="{{$data->amount}}" placeholder="amount" required>
                              </div>
                              @if($errors->has('amount'))
                             <div class="text-danger error">{{ $errors->first('amount') }}</div>
                               @endif



                              <div class="form-group">
                                 <label>Quantity</label>
                                 <input type="text" class="form-control" name="quantity" value="{{$data->quantity}}" placeholder="amount" required>
                              </div>
                              @if($errors->has('quantity'))
                             <div class="text-danger error">{{ $errors->first('quantity') }}</div>
                               @endif




                               <div class="form-group">
                                 <label>Manufactured By</label>
                                 <input type="text" class="form-control" name="manufactured_by" value="{{$data->manufactured_by}}" placeholder="manufactured_by" required>
                              </div>
                              
                               <div class="form-group">
                                 <label>Device Status</label >
                                 <select  class="form-control" name="device_status"  id="device_status" >
                                    <option  value="sold" >Sold</option>
                                    <option  value="unsold">Unsold</option>
                                 </select>
                              </div>
                              @if($errors->has('device_status'))
                             <div class="text-danger error">{{ $errors->first('device_status') }}</div>
                               @endif

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
                                 <input type="text" class="form-control" name="sim2_number" value="{{$data->sim2_number}}"  placeholder="sim2_number" required>
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
                                 <label>User Type</label >
                                 @foreach ($allusers as $value)

                                 <select class="form-control" name="user_id" value="{{$data->user_id}}"  id="user_id">
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





@include('common.footer')