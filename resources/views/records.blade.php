 @include('common.header')vehicles

 <!-- Form controls -->
 <div class="content-wrapper">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="records"> 
                              <i class="fa fa-list"></i>records</a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/')}}/register_records-post" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                              
                              <div class="form-group">
                              @foreach ($allUsers as $value){
                                 <label>User _Id</label>
                                   <option value="{{$value->id}}" >{{$value->id}}</option>}
                                  @endforeach
                                  </div>
                             
                              <div class="form-group">
                                 <label>Device Count</label>
                                 <input type="number" class="form-control" placeholder="Device Count" name="device_count" required>
                              </div>
                              
                             
                             

                            
                              <div class="reset-button">
                                 <a href="#" class="btn btn-warning">Reset</a>
                                 <a href="#" class="btn btn-success">Save</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  </div>


                  @include('common.footer')



