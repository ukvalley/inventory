@include('users.common.userheader')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="#" class="btn btn-success">Records</a>
                    <p>Records Table</p>
                    
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
    
    <th scope="col">User Id</th>
       <th scope="col">Device  Count</th>
      
      

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
      
      
    </tr>
  </thead>
  <?php  $data=DB::table('records')->get();?>
  @foreach($data as $row)
            <tr>
                <td>{{$row->id }}</td>
                <td>{{$row->user_id}}</td>
                <td>{{$row->device_count}}</td>
               
              
                <td>
                <a href="{{url('/')}}/user/record_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
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

    @include('users.common.footer')