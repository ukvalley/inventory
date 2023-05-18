@include('users.common.userheader')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('user/device_sale') }}" class="btn btn-success">Sale New Device</a>
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
                <th scope="col">Customer Id</th>
                <th scope="col">User ID</th>
                
      

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
      
      
    </tr>
  </thead>
  

  @foreach($data as $data)
            <tr>
               
               <td>{{$data->id }}</td>
                <td>{{$data->date }}</td>
                <td>{{$data->device_id}}</td>
                <td>{{$data->device_number}}</td>
                <td>{{$data->allocated_to_id->name ?? ''}}</td>
                <td>{{$data->user_id_id->name ?? ''}}</td>
               <td>
               <!-- <a href="{{url('/')}}/user/sale/sales_edit?id={{$data->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/user/sales_destroy?id={{$data->id}}" class="btn btn-danger">Delete</a>
                </td> -->

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

    @include('users.common.footer')