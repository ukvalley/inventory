@include('users.common.userheader')


<style>
    h4{font-weight:600;
    font-size:13px;
    color:black}
    .spaninfo{color:#129f90}
    .divid{background: #e8f1f3;
          padding: 5px;}
 

</style>
 <!-- Main content -->
 <div class="content-wrapper">
 <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-8">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="clist.html"> 
                              <i class="fa fa-list"></i> User Registration </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form  method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                         <h4 class="divid">
                                User Information 
                            </h4>
                              
                             <h4>
                             Name: <span class="spaninfo">{{$data->name}}</span>
                             </h4>
                              
                             <h4>
                             Mobile: <span class="spaninfo">{{$data->mobile}}</span>
                             </h4>

                             <h4>
                             City: <span class="spaninfo">{{$data->city}}</span>
                             </h4>
                            

                             
                             <h4 class="divid">
                               Additional Info
                             </h4>
                             <h4>
                             Higher Authority: <span class="spaninfo">{{$data->admiko_parent_child}}</span>
                             </h4>
                           
                             <h4>
                             Bacic Amount: <span class="spaninfo">{{$data->basic_amount}}</span>
                             </h4>

                             <h4>
                             User Type: <span class="spaninfo">{{$data->user_type}}</span>
                             </h4>
                           

    
                              <div class="reset-button">
                                 <a href="#" class="btn btn-warning">Reset</a>
                                 <!-- <input class="btn btn-success" type="submit" value="Submit" /> -->
                              </div>
                           
                           
                             
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
            </div>

@include('users.common.footer')