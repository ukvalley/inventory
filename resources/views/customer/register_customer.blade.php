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
                              <i class="fa fa-list"></i>  Customer List </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/')}}/register_customer-post" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                                
                           <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" name="name" placeholder=" Name" id="name" required>
                              </div>
                              <div class="form-group">
                                 <label>Address</label>
                                 <textarea class="form-control"  name="address" rows="3" id="address" required></textarea>
                              </div>
                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" required>
                              </div>
                              <div class="form-group">
                                 <label>Adhar Number</label>
                                 <input type="text" class="form-control" name="adhar_number" id="adhar_number" placeholder="Enter Adhar Number" required>
                              </div>
                              <div class="form-group">
                                 <label>Adhar Front Image</label>
                                 <input type="file" name="adhar_front_image" id="adhar_front_image">
                                 <input type="hidden" name="adhar_front_image" id="adhar_front_image">
                              </div>
                              <div class="form-group">
                                 <label>Adhar Back Image</label>
                                 <input type="file" name="adhar_back_image" id="adhar_back_image">
                                 <input type="hidden" name="adhar_back_image" id="adhar_back_image">
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