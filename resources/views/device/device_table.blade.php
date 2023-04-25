@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/purchase/purchase_device') }}" class="btn btn-success">Purchase New Device</a>
                    <p>Device Table</p>
                    <a class="btn btn-primary" href="{{route('pdfview_device',['download'=>'pdf']) }}">Export to PDF</a>

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
      <th scope="col">Manifactured By</th>
      <th scope="col">ICE_ID</th>
      <th scope="col">IMEI</th>
      <!-- <th scope="col">SIM1</th> -->
      <th scope="col">SIM1 Type</th>
      <!-- <th scope="col">SIM2</th> -->
      <th scope="col">SIM2 Type</th>
      <!-- <th scope="col">Activation Date</th> -->
       <th scope="col">Received Date</th>
        <!-- <th scope="col">Renewal Date</th> -->
        <!-- <th scope="col">Asset Id Type</th> -->
        <th scope="col">Staff</th>
        <th scope="col">Customer</th>
        <th scope="col">Status</th>
      

        
      
        <!-- <th scope="col">Edit</th>
       <th scope="col">Delete</th>  -->
       
       <th scope="col">s_status</th>
       <th scope="col">r_status</th> 
      
      
    </tr>
  </thead>
 
  @foreach($data as $row)
            <tr>
              
               <td> <a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->id }} </a></td>
               
                <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->manufactured_by_id->name ?? ''}}</td>
                <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->ice_id}}</td>
                <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->imei}}</td>
                <!-- <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->sim1}}</td> -->
                
                <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->sim_1_type_id->name ?? ''}}</td>
                <!-- <td<a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->sim2}}</td> -->
                  <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->sim_2_type_id->name ?? ''}}</td>
                  <!-- <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->activation_date}}</td> -->
                  <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->received_date}}</td>
                  <!-- <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->renewal_date}}</td> -->
                  <!-- <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->asset_id_type}}</td> -->
                  <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->user_id_id->name ?? ''}}</td>
                  <td><a href="{{url('/')}}/device_info?id={{$row->id }}">{{$row->customer_id_id->name ?? ''}}</td>

                  <td>
                    @if($row->status == null || $row->status == 'unsold')
                      <span class="btn btn-danger small">Unsold</span>
                    @else
                    <span class="btn btn-success small">Sold</span>
                    @endif


              
                  </td>


                  <!-- <td> 
                    
                    @if($row->user_id == null)
                      <span class="btn btn-warning small">Not Accepted</span>
                    @else
                    
                    <span class="btn btn-success ">Accepted</span>
                    @endif

                  </td> -->


                  
                  
                   <!-- <td>
               <a href="{{url('/')}}/device/device_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/device_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
                </td>
                 -->
            
                 
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

    @include('common.footer')