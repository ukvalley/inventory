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
                              <i class="fa fa-list"></i> User Registration </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/')}}/register_user-post" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                                
                           <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" name="name" placeholder=" Name" required>
                              </div>

                              <div class="form-group">
                                 <label>Mobile</label>
                                 <input type="number" class="form-control" name="mobile" placeholder="Enter Mobile" required>
                              </div>

                               <div class="form-group">
                                 <label>City</label>
                                 <input type="text" class="form-control" name="city" placeholder=" City" required>
                              </div>
                             
                              <div class="form-group">
                                 <label>Higher Authority</label>
                                 <select class="form-control" name="admiko_parent_child" id="admiko_parent_child">
                                    <option value="0" >Parent</option>
                                    @foreach($allusers as $key=>$value)
                                    <option value="{{$value->id}}" >{{$value->name}}</option>
                                    @endforeach
                           
                   
                                 </select>
                              </div>

                              <div class="form-group">
                              <label>Bacic Amount</label>
                                 <input type="text" class="form-control" name="basic_amount" placeholder=" >Bacic Amount" required>
                              </div>
                               <div class="form-group">
                                 <label>User Type</label >
                                 <select class="form-control" name="user_type"  id="user_type">
                                    <option  value="sales_agent" >Sales Agent</option>
                                    <option  value="technician">Technician</option>
                                    <option  value="admin">Admin</option>
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
            <!-- /.content -->
            </div>

@include('common.footer')