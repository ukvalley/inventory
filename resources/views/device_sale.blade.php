@include('common.header')


<div class="content-wrapper">
 <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="#" class="btn btn-success">Select Devices</a>
                    <p>Devices</p>
                    
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                <h3>Device Transferr</h3>
                           <form class="col-sm-6" action="{{url('/')}}/saleUpdate" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                            




<table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col"><table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">id</th>
    
     <th scope="col">imei</th>
     <th scope="col">ice_id</th>
     <th scope="col">user_id</th>

     


    </tr>


  </thead>
  <?php  $data=DB::table('Device')->get();?>
  @foreach($data as $row)
            <tr>

                <td>{{$row->id}}</td>
                <td>{{$row->imei}}</td>
                <td>{{$row->ice_id}}</td>

                <td>{{$row->user_id}}</td>
                <td>
                <td>
                  <input type='checkbox' value="{{$row->id}}" name="select[]"> <a class="btn btn-primary">Sell</a>
                </td>

            </tr>
        @endforeach



       
</table>

        
           

<!------------------------------ //FORM------------------ -->


   
                        
                       

                     <div class="form-group">
                    

                    <label>Select Customer</label>
                          <select class="form-control" name="customer" onChange=''    id="customer-select" >
                         
                     
                                   @foreach ($allCustomer as $value){
                                   
                                    <option value="{{$value->id}}" >{{$value->name}}</option>}
                                   @endforeach
                                 </select>
                              

                              
                              <div class="reset-button">
                                
                                 <button class="btn btn-success" type="submit" value="Submit">Submit</button>
                              </div>




                           </form>
                        </div>
                      </div>
                   </div>
                </div>
             </section>


 <!-- Main content -->

 <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


 <script>

$('#customer-select').change(function(){
       $('#user').find('option').remove().end()
         console.log('{{url('/')}}/api/getCustomer/'+$(this).val()+'');
         $.ajax({
        url: '{{url('/')}}/api/getCustomer/'+$(this).val()+'',
        type: "GET",
        dataType: 'json',
        success: function (result) {
            $.each(result, function (i, value) {
                $('#user').append('<option id=' + JSON.stringify(value.id) + '>' + value.name + '</option>');
            });
        },
        error: function (request, status, error) {
            alert(request.statusText + "[" + request.status + "]");
            alert(request.responseText);
            $('button#form_salesReport_button').html(config.messages.searchReport);
        }
    });


    alert($(this).val());
})
        </script>




    @include('common.footer')