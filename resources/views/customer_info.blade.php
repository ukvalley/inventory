@include('common_admin.header')


<style>
    h4{font-weight:600;
    font-size:13px;
    color:black}
    .spaninfo{color:#129f90}
    .divid{background: #e8f1f3;
          padding: 5px;}
          .imgwid{width: 100%;}
 

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
                              <i class="fa fa-list"></i>  Customer View </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                        <!-- action="{{url('/')}}/register_customer-update/{{$data->id}}" -->
                           <form method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                         
                    
                         <h4 class="divid">
                                Personal Information 
                            </h4>
                              
                        
                            <h4>
                                Name : <span class="spaninfo">{{$data->name}}</span>
                            </h4>
                              
                                 <h4>
                                 Address : <span class="spaninfo">{{$data->address}}</span></h4>
                                
                               
                              <div >
                             
                           
                              <h4>
                              Mobile : <span class="spaninfo">{{$data->mobile}}</span>
                              </h4>
                                
                              <h4 class="divid">
                                Identity Proof
                            </h4>
                              
                              <h4>
                              Adhar Number : <span class="spaninfo">{{$data->adhar_number}}</span>
                              </h4>

                              <div class="col-sm-6">
                        <img class="imgwid" src="{{url('/')}}/upload/{{$data->adhar_front_image}}" alt="" >
                        <a href="{{url('/')}}/upload/{{$data->adhar_front_image}}" download> 
                         <b>Adhar Front Image</b>
                        </a>
                        </div>
                        <div class="col-sm-6">
                        <img class="imgwid" src="{{url('/')}}/upload/{{$data->adhar_back_image}}" alt="" >
                        <a href="{{url('/')}}/upload/{{$data->adhar_back_image}}" download> 
                         <b>Adhar Back Image</b>
                        </a>
                        </div>
                        </div>

                              
                             
                                 
                              </div>



                              <div class="reset-button">
                                 <a href="customer/customer_table" class="btn btn-warning">Back</a>
                                
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

@include('common_admin.footer')