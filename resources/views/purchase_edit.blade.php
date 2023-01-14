
@include('common.header')



<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="clist.html"> 
                              <i class="fa fa-list"></i> Purchase Details </a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3>Add Purchase Details </h3>
                           <form class="col-sm-6" action="{{url('/')}}/purchase_device-update/{{$data->id}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field()}}
                 
                        <div class="form-group">
                                 <label>Date</label>
                                 <input type="Date" class="form-control" name="date" required pattern="\d{3}-\d{2}-\d{4}" placeholder=" Date" value="{{$data->date}}"  required>
                              </div>

                              <div class="form-group">
                                 <label>Device ID</label>
                                 <input type="text" class="form-control" name="device_id"  value="{{$data->device_id}}" placeholder="  device_id" required>
                              </div>

                              <div class="form-group">
                                 <label>Device Number</label>
                                 <input type="text" class="form-control" name="device_number" value="{{$data->device_number}}" placeholder="device_number" required>
                              </div>

                              <div class="form-group">
                                 <label>Amount</label>
                                 <input type="text" class="form-control" name="amount" value="{{$data->amount}}" placeholder="amount" required>
                              </div>

                               <div class="form-group">
                                 <label>Purchase from</label>
                                 <input type="text" class="form-control" name="purchase_from" value="{{$data->purchase_from}}" placeholder="purchase_from" required>
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





@include('common.footer')