@include('common.header')



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
      <th scope="col">Date</th>
      <th scope="col">Total Device</th>
       <th scope="col">Alloted Device</th>
      <th scope="col">Available Devices</th>
      <th scope="col">Not Alloted</th>
      

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
      
      
    </tr>
  </thead>
  <?php  $data=DB::table('purchase')->get();?>
  @foreach($data as $row)
            <tr>
               <td>{{$row->id }}</td>
                <td>{{$row->date }}</td>
                <td>{{$row->total_device}}</td>
                <td>{{$row->alloted_device}}</td>
                <td>{{$row->available_device}}</td>
                <td>{{$row->not_alloted}}</td>
               
              <!--  <a href="{{url('/')}}/purchase_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/purchase_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
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

    @include('common.footer')