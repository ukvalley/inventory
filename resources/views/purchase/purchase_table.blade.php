@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/purchase/purchase_device') }}" class="btn btn-success">Purchase New Device</a>
                    <p>Device Table</p>
                    
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
 
      <th scope="col">ICE ID</th>
      <th scope="col">Amount</th>
      <th scope="col">Quantity</th>
      <th scope="col">Manufactured By</th>
      

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
      
      
    </tr>
  </thead>
  <?php  $data=DB::table('purchase')->get();?>
  @foreach($data as $row)
            <tr>
               <td><a href="{{url('/')}}/purchase_info?id={{$row->id }}">{{$row->id }}</td>
                <td><a href="{{url('/')}}/purchase_info?id={{$row->id }}">{{$row->date }}</td>
             
                <td><a href="{{url('/')}}/purchase_info?id={{$row->id }}">{{$row->ice_id}}</td>
                <td><a href="{{url('/')}}/purchase_info?id={{$row->id }}">{{$row->amount}}</td>
                <td><a href="{{url('/')}}/purchase_info?id={{$row->id }}">{{$row->quantity}}</td>
                <td><a href="{{url('/')}}/purchase_info?id={{$row->id }}">{{$row->manufactured_by}}</td>

                
                <td>
               <a href="{{url('/')}}/purchase/purchase_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/purchase_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
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