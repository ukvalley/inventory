@include('common.header')



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
                              <i class="fa fa-list"></i>  Vehicle Registration </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                                   

                    <h4 class="divid">
                        Vehicle Details

                    </h4>

                    <h4 >
                    Vehicle Number <span>{{$data->vechicle_number}}</span>
                    </h4>

                   
                    <h4 >
                    Customer <span>{{$data->customer}}</span>
                    </h4>
                   
                      
                    <h4>
                    RC Book File:<span class="spaninfo">{{$data->rc_book_file}}</span>
                    </h4>

                               
                    <h4 class="divid">
                        Vehicle Images
                    </h4>
                        
                        
                        <div class="row">

                         <div class="col-sm-6">
                        <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_1}}" alt="" >
                        <b>Vehicle Front View</b>
                        </div>
                        <div class="col-sm-6">
                        <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_2}}" alt="" >
                        <b>Vehicle Rear View</b>
                        </div>
                        </div>

                        <div class="row">

                         <div class="col-sm-6">
                        <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_3}}" alt="" >
                        <b>Vehicle Back View</b>
                        </div>
                        <div class="col-sm-6">
                        <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_4}}" alt="" >
                        <b>Vehicle Leftside View</b>
                        </div>
                        </div>

                        <div class="row">

                         <div class="col-sm-6">
                        <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_5}}" alt="" >
                        <b>Vehicle Rightside View</b>
                        </div>
                        
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