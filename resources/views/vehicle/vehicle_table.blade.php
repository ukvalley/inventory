@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/vehicle/register_vehicle') }}" class="btn btn-success">Register New Vehicle</a>
                    <p>Vehicle Table</p>
                    
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
      <th scope="col">Vehicle Number</th>
      <th scope="col">Customer</th>
      <th scope="col">RC Book File</th>
      <th scope="col">Vehicle Front View</th>
      <th scope="col">Vehicle Rare View</th>
      <th scope="col">Vehicle Back View</th>
       <th scope="col">Vehicle Leftside View</th>
        <th scope="col">Vehicle Rightside View</th>
       <th scope="col">Edit</th>
      <th scope="col">Delete</th> 
      
      
    </tr>
  </thead>
 
  @foreach($data as $row)
            <tr>

               <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">{{$row->id }}</td>
                <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">{{$row->vechicle_number}}</td>
                 <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">{{$row->customer_id->name}}</td>
                

                <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">
                @if(isset($row->rc_book_file))
                  <img width="50px" src="{{url('/')}}/upload/{{$row->rc_book_file}}"> 
                  @else
                  <p>No Image</p>
                  @endif
                </td>
               
                <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">
                @if(isset($row->vehicle_image_1))
                  <img width="50px" src="{{url('/')}}/upload/{{$row->vehicle_image_1}}"> 
                  @else
                  <p>No Image</p>
                  @endif
                </td>

                <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">
                @if(isset($row->vehicle_image_2))
                  <img width="50px" src="{{url('/')}}/upload/{{$row->vehicle_image_2}}"> 
                  @else
                  <p>No Image</p>
                  @endif
                </td>


                <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">
                @if(isset($row->vehicle_image_3))
                  <img width="50px" src="{{url('/')}}/upload/{{$row->vehicle_image_3}}"> 
                  @else
                  <p>No Image</p>
                  @endif
                </td>

                <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">
                @if(isset($row->vehicle_image_4))
                  <img width="50px" src="{{url('/')}}/upload/{{$row->vehicle_image_4}}"> 
                  @else
                  <p>No Image</p>
                  @endif
                </td>

                <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">
                @if(isset($row->vehicle_image_5))
                  <img width="50px" src="{{url('/')}}/upload/{{$row->vehicle_image_5}}"> 
                  @else
                  <p>No Image</p>
                  @endif
                </td>


                
                
                <td><a href="{{url('/')}}/vehicle_info?id={{$row->id }}">
                <a href="{{url('/')}}/vehicle/vehicle_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/vehicle_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
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