@include('common_admin.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/add_device') }}" class="btn btn-success">Register New Device</a>
                    <p>Device Table</p>
                    
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
      <th scope="col">Make</th>
      <th scope="col">ICE_ID</th>
      <th scope="col">IMEI</th>
      <th scope="col">SIM1</th>
      <th scope="col">SIM1 Type</th>
      <th scope="col">SIM2</th>
      <th scope="col">SIM2 Type</th>
      <th scope="col">Activation Date</th>
       <th scope="col">Received Date</th>
        <th scope="col">Renewal Date</th>
        <th scope="col">User_id</th>
       <th scope="col">Purchase From</th>
        <th scope="col">Amount</th>


      
      
    </tr>
  </thead>
  <?php  $data=DB::table('device')->get();?>
  @foreach($data as $row)
            <tr>
              
                <td>{{$row->make }}</td>
                <td>{{$row->ice_id}}</td>
                <td>{{$row->imei}}</td>
        
                <td>{{$row->sim_1_type}}</td>
                  <td>{{$row->sim_2_type}}</td>
                  <td>{{$row->activation_date}}</td>
                  <td>{{$row->received_date}}</td>
                  <td>{{$row->renewal_date}}</td>
                  <td>{{$row->user_id}}</td>
                  <td>{{$row->purchase_from}}</td>
                  <td>{{$row->amount}}</td>

                
            
                 
            </tr>
        @endforeach
</table>
</div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    </div>

    @include('common_admin.footer')