@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/sale/sales') }}" class="btn btn-success">Sale New Device</a>
                    <p>Sale Table</p>
                    <a class="btn btn-primary" href="{{route('pdfview',['download'=>'pdf']) }}">Export to PDF</a>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">




<table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col"><table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Device ID</th>
      <th scope="col">ICE ID</th>
      <th scope="col">Allocated to</th>
      <th scope="col">User ID</th>
      

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
      
      
    </tr>
  </thead>
  <?php  $data=DB::table('sales')->get();
  
  ?>
  @foreach($data as $data)
            <tr>
               <td>{{$data->id }}</td>
                <td>{{$data->date }}</td>
                <td>{{$data->device_id}}</td>
                <td>{{$data->device_number}}</td>
                <td>{{$data->allocated_to}}</td>
                <td>{{$data->user_id}}</td>
               <td>
               <a href="{{url('/')}}/sale/sales_edit?id={{$data->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/sales_destroy?id={{$data->id}}" class="btn btn-danger">Delete</a>
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