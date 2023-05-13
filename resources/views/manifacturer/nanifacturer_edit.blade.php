@include('common_admin.header')



<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href=""> 
                              <i class="fa fa-list"></i>Manufacturer Details</a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3></h3>
                             <form class="col-sm-6" action="{{url('/')}}/admin/manifacturer-update/{{$data->id}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                     <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" name="name" placeholder="Enter Manifacturer Name" required>
                              </div>

                              <div class="form-group">
                                 <label>City</label>
                                 <input type="text" class="form-control" name="city" placeholder="Enter City Name" required>
                              </div>

                              <div class="reset-button">
                                 <a href="#" class="btn btn-warning">Reset</a>
                                 <input class="btn btn-success" type="submit" value="Submit"/>
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