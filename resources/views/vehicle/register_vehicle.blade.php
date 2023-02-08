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
                              <a class="btn btn-add " href="clist.html"> 
                              <i class="fa fa-list"></i>  Vehicle Registration </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/')}}/register_vehicle-post" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                                
                           <div class="form-group">
                                 <label>Vehicle Number</label>
                                 <input type="text" class="form-control" name="vechicle_number" placeholder=" Enter Vehicle Number" required>
                              </div>
                              <div class="form-group">
                                 <label>Customer</label>
                                  
                                 <select class="form-control" name="customer" >
                                   @foreach ($allcustomer as $value){
                                   
                                    <option value="{{$value->id}}" >{{$value->name}}</option>}
                                   @endforeach
                                 </select>
                                
                              </div>
                                    
                              <div class="form-group">
                                 <label>RC Book File</label>
                                 <input type="file" name="rc_book_file" id="rc_book_file">
                                 <input type="hidden" name="rc_book_file" id="rc_book_file">
                              </div>
                              
                              <div class="form-group">
                                 <label>Vehicle Front Image</label>
                                 <input type="file" name="vehicle_image_1"  id="vehicle_image_1">
                                 <input type="hidden" name="vehicle_image_1" id="vehicle_image_1">
                              </div>
                              <div class="form-group">
                                 <label>Vehicle Rare Image</label>
                                 <input type="file" name="vehicle_image_2">
                                 <input type="hidden" name="vehicle_image_2">
                              </div>
                              <div class="form-group">
                                 <label>Vehicle Back Image</label>
                                 <input type="file" name="vehicle_image_3">
                                 <input type="hidden" name="vehicle_image_3">
                              </div>
                              <div class="form-group">
                                 <label>Vehicle Leftside Image</label>
                                 <input type="file" name="vehicle_image_4">
                                 <input type="hidden" name="vehicle_image_4">
                              </div>
                              <div class="form-group">
                                 <label>Vehicle Rightside Image </label>
                                 <input type="file" name="vehicle_image_5">
                                 <input type="hidden" name="vehicle_image_5">
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