@include('common.header')
<style>
    h4{font-weight:600;
    font-size:13px;
    color:black}
    .spaninfo{color:chocolate}
    .divid{background: #e8f1f3;
          padding: 5px;}
    .left{display:inline;
float:left;}
    .right{display:inline;
float:right;}
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
                              <a class="btn btn-add "href="clist.html"> 
                              <i class="fa fa-list"></i> Device Info </a>  
                           </div>

                        </div>
                        <div class="panel-body ">
                             <h4 class="divid">Devices Id:  {{$data->id}}</span></h4>
                           <form  action="" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                              
               
                            <p>
                                 <h4 >Manafactured By: &nbsp&nbsp&nbsp<span class="spaninfo">{{$data->make}} </span></h4>
                                 

                                 
                                 <p><h4 class="left">ICE ID:&nbsp&nbsp&nbsp<span class="spaninfo">{{$data->ice_id}}</span></h4>
                              
                                 <h4 class="right">IMEI:&nbsp&nbsp&nbsp<span class="spaninfo">{{$data->imei}}</span></h4></p>
                              </p>
                             <hr>

                             <h4 class="divid">Devices Connections</span></h4>


                          <p>
                                 <h4>SIM1 Type<span class="spaninfo">&nbsp&nbsp&nbsp{{$data->sim_1_type}}</span></h4>
                                 </select>

                             
                                 <h4>SIM1:&nbsp&nbsp&nbsp<span class="spaninfo">&nbsp&nbsp&nbsp{{$data->sim1}}</span></h4>
                              
                                
                            
                             
                                 <h4>SIM2 Type<span class="spaninfo">&nbsp&nbsp&nbsp{{$data->sim_2_type}}</span></h4>
                                 </select>
                                  
                              
                              
                                 <h4>SIM2:<span class="spaninfo">&nbsp&nbsp&nbsp{{$data->sim2}}</span></h4>
                              
                              </p>
                             
                              <hr>

                              <h4 class="divid">Devices History</span></h4>

                            
                              <div class="form-group">
                                 <h4>Activation Date:&nbsp&nbsp&nbsp<span class="spaninfo">{{$data->activation_date}}</span></h4>
                              </div>
                             

                              <div class="form-group">
                                 <h4>Received Date:&nbsp&nbsp&nbsp<span class="spaninfo">{{$data->received_date}}</span></h4>
                        
                              </div>
                              

                              
                              <div class="form-group">
                                 <h4>Renewal Date:&nbsp&nbsp&nbsp<span class="spaninfo">{{$data->renewal_date}}</span></h4>
                              </div>
                             
                               <hr>

                               <h4 class="divid">Devices Allocations</span></h4>


                              <div class="col-4">
                                 <h4>User Id:&nbsp&nbsp&nbsp<span class="spaninfo">{{$data->user_id}}</span></h4>
                              </div>
                              <div class="col-4">
                                 <h4>Customer Id:&nbsp&nbsp&nbsp<span class="spaninfo">{{$data->customer_id}}</span></h4>
                              </div>

                              

                              
                              
                             

                              <!-- <div class="reset-button">
                                 <a href="#" class="btn btn-warning">Reset</a>
                                 <input class="btn btn-success" type="submit" value="Submit" />
                              </div> -->

                              


                           
                           
                     
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
            </div>
            

@include('common.footer')