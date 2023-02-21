@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/purchase/purchase_device') }}" class="btn btn-success">Purchase New Device</a>
                    <p>Device Purchase Table</p>
                    <a class="btn btn-primary" href="{{route('pdfview_purchase',['download'=>'pdf']) }}">Export to PDF</a>

                    
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">




<table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col"><table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">ID </th>
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
  @foreach($data as $data)
            <tr>
               <td><a href="{{url('/')}}/purchase_info?id={{$data->id }}">{{$data->id }}</td>
                <td><a href="{{url('/')}}/purchase_info?id={{$data->id }}">{{$data->date }}</td>
             
                <td><a href="{{url('/')}}/purchase_info?id={{$data->id }}">{{$data->ice_id}}</td>
                <td><a href="{{url('/')}}/purchase_info?id={{$data->id }}">{{$data->amount}}</td>
                <td><a href="{{url('/')}}/purchase_info?id={{$data->id }}">{{$data->quantity}}</td>
                <td><a href="{{url('/')}}/purchase_info?id={{$data->id }}">{{$data->manufactured_by}}</td>

                
                <td>
               <a href="{{url('/')}}/purchase/purchase_edit?id={{$data->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/purchase_destroy?id={{$data->id}}" class="btn btn-danger">Delete</a>
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