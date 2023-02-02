@include('common.header')



<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="purchase_device"> 
                              <i class="fa fa-list"></i>Device Transfer</a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3>Device Transfer</h3>
                           <form class="col-sm-6" action="" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                     <div class="form-group">
                     <div class="form-group">
                                 <label>Device</label>
                                   <select class="form-control" name="device_id" id="device_id">
                                   @foreach ($alldevice as $value){
                                   
                                    <option value="{{$value->id}}" >{{$value->device_id}}</option>}
                                 @endforeach
                                 </select>
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




@include('common.footer')