@include('users.common.userheader')

<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="#"> 
                              <i class="fa fa-list"></i>Add Sale</a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3> Sale Details </h3>
                           <form class="col-sm-6" action="{{url('/')}}/user/sales-post" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                        <div class="form-group">
                                 <label>Date</label>
                                 <input type="date" class="form-control" value="" name="date" placeholder=" date" required>
                              </div>

                              <div class="form-group">
                                 <label>Device ID</label>
                                 <input type="text" class="form-control" value="" name="device_id" placeholder=" device_id" required>
                              </div>

                              <div class="form-group">
                                 <label>Device Number</label>
                                 <input type="text" class="form-control" value="" name="device_number" placeholder="device_number" required>
                              </div>

                              <div class="form-group">
                                 <label>Allocated to</label>
                                 <input type="text" class="form-control" value="" name="allocated_to" placeholder="allocated_to" required>
                              </div>

                               <div class="form-group">
                                 <label>User Id</label>
                                 <input type="text" class="form-control" value="user_id" name="user_id" placeholder="user_id" required>
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

@include('users.common.footer')