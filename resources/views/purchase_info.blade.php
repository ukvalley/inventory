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

<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-8">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="clist.html"> 
                              <i class="fa fa-list"></i> Purchase Details</a>  
                           </div>

                        </div>
                        <div class="panel-body">
                           <form  method="post"  enctype="multipart/form-data">
                    {{ csrf_field()}}

                    <h4 class="divid">Purchase Details</h4>

                    <h4>
                    Date: <span class="spaninfo">{{$data->date}}</span>
                    </h4>

                    <h4>
                    Device Number: <span class="spaninfo">{{$data->device_number}}</span>
                    </h4>

                    <h4>
                    Amount: <span class="spaninfo">{{$data->amount}}</span>
                    </h4>

                    <h4>
                    Quantity: <span class="spaninfo">{{$data->quantity}}</span>
                    </h4>

                    <h4>
                    Purchase from: <span class="spaninfo">{{$data->purchase_from}}</span>
                    </h4>

                               
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





@include('common.footer')