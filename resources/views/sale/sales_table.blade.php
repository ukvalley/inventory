@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/sale/sales') }}" class="btn btn-success">Sales New Device</a>
                    <p>Sale Table</p>
                    
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
      <th scope="col">Date</th>
      <th scope="col">Device ID</th>
      <th scope="col">Device Number</th>
      <th scope="col">Allocated to</th>
      <th scope="col">User id</th>
      

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
      
      
    </tr>
  </thead>
  <?php  $data=DB::table('sales')->get();?>
  @foreach($data as $row)
            <tr>
               <td>{{$row->id }}</td>
                <td>{{$row->date }}</td>
                <td>{{$row->device_id}}</td>
                <td>{{$row->device_number}}</td>
                <td>{{$row->allocated}}</td>
                <td>{{$row->user_id}}</td>
               
               <a href="{{url('/')}}/sale/sales_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/sales_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
                </td>
                
            
                 
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