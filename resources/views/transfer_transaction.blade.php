@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="#" class="btn btn-success">Select Devices</a>
                    <p>Devices</p>
                    
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">




<table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col"><table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">device_id</th>
      <th scope="col">Select</th>


    </tr>


  </thead>
  <?php  $data=DB::table('device')->get();?>
  @foreach($data as $row)
            <tr>
               <td>{{$row->id }}</td>
                <td>{{$row->ice_id}}</td>
                <td><input type="checkbox" name="device_id" value="device_id"></td>
            </tr>
        @endforeach



       
</table>

                  <a href="/transfer" class="btn btn-primary">Transfer To</a>
        
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    </div>

<!-- //form -->


   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        
                        <div class="panel-body">
                             <h3>Device Transferr</h3>
                           <form class="col-sm-6" action="{{url('/')}}/device_transfer-update" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                     <div class="form-group">
                     <!-- <div class="form-group">
                                 <label>Device</label>
                                   <select class="form-control" name="device_id" id="device_id">
                                   @foreach ($alldevice as $value){
                                   
                                    <option value="{{$value->id}}" >{{$value->device_id}}</option>}
                                 @endforeach
                                 </select>
                              </div> -->
                               

                              <div class="form-group">
                                 <label>User Type</label>
                                 <select class="form-control"  name="user_type"  id="user_type">
                                    <option>Sales Agent</option>
                                    <option>Technician</option>
                                
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






    @include('common.footer')