@include('users.common.userheader')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('user/sim/simtypes') }}" class="btn btn-success">Add New Sim</a>
                    <p>SIM Table</p>
                    
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
      <th scope="col">Name</th>

    </tr>


  </thead>
  <?php  $data=DB::table('sim_types')->get();?>
  @foreach($data as $row)
            <tr>
               <td>{{$row->id }}</td>
                <td>{{$row->name }}</td>
                
              
                
                 <td>
                  <a href="{{url('/')}}/user/sim/sim_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/user/sim_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
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