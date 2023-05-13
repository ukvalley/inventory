@include('users.common.userheader')


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
                  

                
                <h3>Device Sale</h3>
                <div class="">
                <label>Search.</label>
                <input type="text" name="search1" id="search1" class="" placeholder="Search Device Data" />
              </div>

              <form action="{{url('/')}}/saleUpdate" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}



<table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col"><table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">Check</th>

    <th scope="col">id</th>
    
     <th scope="col">imei</th>
     <th scope="col">ice_id</th>
     <th scope="col">user_id</th>

     


    </tr>


  </thead>
  @foreach($data as $row)
            <tr>
            <td>
                  <input type='checkbox' value="{{$row->id}}" name="select[]">
                </td>

                <td>{{$row->id}}</td>
                <td>{{$row->imei}}</td>
                <td>{{$row->ice_id}}</td>

                <td>{{$row->user_id_id->name ?? ''}}</td>
                

            </tr>
        @endforeach



       
</table>

        
           

<!------------------------------ //FORM------------------ -->


   
                        
                       
{{ csrf_field() }}
                     <div class="form-group">
                    

                    <label>Select Customer</label>
                          <select class="form-control" name="customer" onChange=''    id="customer-select" >
                         
                     
                                   @foreach ($allCustomer as $value){
                                   
                                    <option value="{{$value->id}}" >{{$value->name}}</option>}
                                   @endforeach
                                 </select>

                              </div>
                             


                              
                              <div class="form-group">

                               <label>Select Vehicle</label>
                          <select class="form-control" name="vehicle" onChange='' id="vehicle-select" >
                         
                     
                                   @foreach ($allVehicle as $value){
                                   
                                    <option value="{{$value->id}}" >{{$value->vechicle_number}}</option>}
                                   @endforeach
                                 </select>

                                 
                                 
                              </div>
                              

                              
                              <div class="reset-button">
                                
                                 <button class="btn btn-success" type="submit" value="Submit">Submit</button>
                              </div>




                      
                        </div>
                      </div>
                   </div>
                </div>
             </section>


 <!-- Main content -->

 <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
 


 <script>

$('#vehicle-select').change(function(){
       $('#user').find('option').remove().end()
        //  console.log('{{url('/')}}/api/getVehicle/'+$(this).val()+'');
         $.ajax({
        url: '{{url('/')}}/api/getVehicle/'+$(this).val()+'',
        type: "GET",
        dataType: 'json',
        success: function (result) {
            $.each(result, function (i, value) {
                $('#vehicle').append('<option id=' + JSON.stringify(value.id) + '>' + value.name + '</option>');
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
   

<!--  -->
 <script>
    $(document).ready(function() {
      
      fetch_device_data();

      function fetch_device_data(query = '') 
      {
        $.ajax({
          url: "{{url('/')}}/device_sales/action",
          type: "GET",
          dataType: "json",
          data: {
            query
            : query
          },
         
          success: function(data)
           {
            $("tbody").html(data.table_data);
            $("#total_records").text(data.total_data);
          }
        })
      }


      $(document).on("keyup", "#search1", function() 
      {
        var query = $(this).val();
        fetch_device_data(query);
      });

    });
  </script> 




    @include('users.common.footer')