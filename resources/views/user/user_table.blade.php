@include('common.header')

<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/user/register_user') }}" class="btn btn-success">Register New User</a>
                    <p>User Table</p>
                    <a class="btn btn-primary" href="{{route('pdfview_user',['download'=>'pdf']) }}">Export to PDF</a>

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
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">City</th>
      <th scope="col">Higher Authority</th>
      <th scope="col">Basic Amount</th>
      <th scope="col">User Type</th>

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
      
      
    </tr>
  </thead>
  @foreach($data as $row)
            <tr>
               <td><a href="{{url('/')}}/user_info?id={{$row->id }}">{{$row->id }}</td>
                <td><a href="{{url('/')}}/user_info?id={{$row->id }}">{{$row->name }}</td>
                <td><a href="{{url('/')}}/user_info?id={{$row->id }}">{{$row->mobile }}</td>
                <td><a href="{{url('/')}}/user_info?id={{$row->id }}">{{$row->city}}</td>
                <td><a href="{{url('/')}}/user_info?id={{$row->id }}">{{$row->admiko_parent_child}}</td>
                <td><a href="{{url('/')}}/user_info?id={{$row->id }}">{{$row->basic_amount}}</td>
                <td><a href="{{url('/')}}/user_info?id={{$row->id }}">{{$row->user_type}}</td>
                <td>
                <a href="{{url('/')}}/user/user_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/user_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
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

    