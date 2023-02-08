@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/customer/register_customer') }}" class="btn btn-success">Register New Customer</a>
                    <p>Customer Table</p>
                    
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
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Adhar Number</th>
      <th scope="col">Adhar Front Image</th>
      <th scope="col">Adhar Back Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th> 
      
      
    </tr>
  </thead>
  <?php  $data=DB::table('customer')->get();?>
  @foreach($data as $row)
            <tr>
               <td><a href="{{url('/')}}/customer_info?id={{$row->id }}">{{$row->id }}</td>
                <td><a href="{{url('/')}}/customer_info?id={{$row->id }}">{{$row->name }}</td>
                <td><a href="{{url('/')}}/customer_info?id={{$row->id }}">{{$row->address}}</td>
                <td><a href="{{url('/')}}/customer_info?id={{$row->id }}">{{$row->mobile}}</td>
                <td><a href="{{url('/')}}/customer_info?id={{$row->id }}">{{$row->adhar_number}}</td>
                <td><a href="{{url('/')}}/customer_info?id={{$row->id }}"> 
                  @if(isset($row->adhar_front_image))
                  <img width="50px" src="{{url('/')}}/upload/{{$row->adhar_front_image}}"> 
                  @else
                  <p>No Image</p>
                  @endif
                </td>
                <td><a href="{{url('/')}}/customer_info?id={{$row->id }}">
                  @if(isset($row->adhar_back_image))
                  <img width="50px" src="{{url('/')}}/upload/{{$row->adhar_back_image}}"> 
                  @else
                  <p>No Image</p>
                  @endif
                </td>
                
                <td>
                <a href="{{url('/')}}/customer/customer_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/destroy?id={{$row->id}}"  class="btn btn-danger">Delete</a>
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