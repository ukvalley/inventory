@include('common.header')



<div  class="content-wrapper">
        <div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="{{ url('/transaction/transaction_table') }}" class="btn btn-success">Transaction Table</a>
                    <p></p>
                    <a class="btn btn-primary" href="{{route('pdfview_transaction',['download'=>'pdf']) }}">Export to PDF</a>
 
</div>

                <!-- /.panel-heading -->
                <div class="panel-body">




<table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col"><table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">Device Id</th>
    <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Quantity</th>
      <th scope="col">Transaction Type</th>
      

      <!-- <th scope="col">Edit</th>
      <th scope="col">Delete</th> -->
      
      
    </tr>
  </thead>
  @foreach($data as $row)
            <tr>
            <td>{{$row->id}}</td>
               <td>{{$row->sender_id->name ??''}}</td>
                <td>{{$row->receiver_id->name ?? ''}}</td>
                <td>{{$row->date}}</td>
                <td>{{$row->quantity}}</td>
                <td>{{$row->amount}}</td>


                <td>{{$row->transaction_type}}</td>
               
                  <td>
               <a href="{{url('/')}}/transaction/transaction_edit?id={{$row->id}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                <a href="{{url('/')}}/transaction_destroy?id={{$row->id}}" class="btn btn-danger">Delete</a>
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