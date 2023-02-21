@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('manifacturer/manifacturer') }}" class="btn btn-success">Add New Manifacturer</a>
                    <p>SIM Table</p>
                    <a class="btn btn-primary" href="{{ URL::to('/manifacturer/pdf') }}">Export to PDF</a>
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">




<table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col"><table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">City</th>

    </tr>


  </thead>
  <?php  $data=DB::table('manifacturer')->get();?>

  @foreach($data as $row)
            <tr>
               <td>{{$row->id }}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->city}}</td>

                
              
                
                 <td>
                  <a href="{{url('/')}}/manifacturer/manifacturer_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/manifacturer_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
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