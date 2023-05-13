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
                              <a class="btn btn-add " href="clist.html"> 
                              <i class="fa fa-list"></i>  Vehicle Registration </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/')}}/admin/register_vehicle-update/{{$data->id}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                                
                           <div class="form-group">
                                 <label>Vehicle Number</label>
                                 <input type="text" class="form-control" name="vechicle_number" value="{{$data->vechicle_number}}" placeholder=" Enter Vehicle Number" required>
                              </div>
                              @if($errors->has('vechicle_number'))
                             <div class="text-danger error">{{ $errors->first('vechicle_number') }}</div>
                               @endif



                              <div class="form-group">
                                 <label>Customer</label>
                                   <select class="form-control" name="customer" id="customer">
                                   @foreach ($allcustomer as $value){
                                   
                                    <option value="{{$value->id}}" >{{$value->name}}</option>}
                                 @endforeach
                                 </select>
                              </div>
                              @if($errors->has('customer'))
                             <div class="text-danger error">{{ $errors->first('customer') }}</div>
                               @endif
                              


                              <div class="form-group">
                                 <label>RC Book File</label>
                                 <input type="file" name="rc_book_file" >
                                 <input type="hidden" name="rc_book_file" value="{{$data->rc_book_file}}">
                              </div>
                              @if($errors->has('rc_book_file'))
                             <div class="text-danger error">{{ $errors->first('rc_book_file') }}</div>
                               @endif


                              
                              <div class="form-group">
                                 <label>Vehicle Front View</label>
                                 <input type="file" name="vehicle_image_1">
                                 <input type="hidden" name="vehicle_image_1" value="{{$data->vehicle_image_1}}">
                              </div>
                              @if($errors->has('vehicle_image_1'))
                             <div class="text-danger error">{{ $errors->first('vehicle_image_1') }}</div>
                               @endif



                              <div class="form-group">
                                 <label>Vehicle Rear View</label>
                                 <input type="file" name="vehicle_image_2">
                                 <input type="hidden" name="vehicle_image_2" value="{{$data->vehicle_image_2}}">
                              </div>
                              @if($errors->has('vehicle_image_2'))
                             <div class="text-danger error">{{ $errors->first('vehicle_image_2') }}</div>
                               @endif

                               

                              <div class="form-group">
                                 <label>Vehicle Back View</label>
                                 <input type="file" name="vehicle_image_3">
                                 <input type="hidden" name="vehicle_image_3" value="{{$data->vehicle_image_3}}">
                              </div>
                              @if($errors->has('vehicle_image_3'))
                             <div class="text-danger error">{{ $errors->first('vehicle_image_3') }}</div>
                               @endif

                               

                              <div class="form-group">
                                 <label>Vehicle  Leftside View</label>
                                 <input type="file" name="vehicle_image_4">
                                 <input type="hidden" name="vehicle_image_4" value="{{$data->vehicle_image_4}}">
                              </div>
                              @if($errors->has('vehicle_image_4'))
                             <div class="text-danger error">{{ $errors->first('vehicle_image_4') }}</div>
                               @endif

                               

                              <div class="form-group">
                                 <label>Vehicle Rightside View</label>
                                 <input type="file" name="vehicle_image_5">
                                 <input type="hidden" name="vehicle_image_5" value="{{$data->vehicle_image_5}}">
                              </div>
                              @if($errors->has('vehicle_image_5'))
                             <div class="text-danger error">{{ $errors->first('vehicle_image_5') }}</div>
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

@include('common_admin.footer')