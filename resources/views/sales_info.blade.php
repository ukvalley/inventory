@common_admin('common.header')



<style>
    h4{font-weight:600;
    font-size:13px;
    color:black}
    .spaninfo{color:#129f90}
    .divid{background: #e8f1f3;
          padding: 5px;}
    .imgwid{width: 100%;}
  
         
 </style>
<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-8">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="/sale/sales"> 
                              <i class="fa fa-list"></i>Sale Details</a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3> Sale Details </h3>
                           <form  method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                         
                    <h4>
                        Date: <span class="spaninfo">{{$data->date}}</span>
                   </h4>
                   <h4>
                   Device ID:<span class="spaninfo">{{$data->device_id}}</span>
                   </h4>

                   <h4>
                   Device Number:<span class="spaninfo">{{$data->device_number}}</span>
                   </h4>   
                   
                   <h4>
                   Allocated to:<span class="spaninfo">{{$data->allocated_to}}</span>
                   </h4> 
                   
                   <h4>
                   User Id:<span class="spaninfo">{{$data->user_id}}</span>
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


 <!-- Main content -->

            </div>

@include('common_admin.footer')