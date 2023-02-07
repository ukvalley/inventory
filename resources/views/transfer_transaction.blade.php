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
                             <h3>Device Transfer</h3>
                           <form class="col-sm-6" action="{{url('/')}}/transferUpdate" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}




<table class="table table-striped table-dark">
  <thead>
    <tr>
      
      <th scope="col"><table class="table table-striped table-dark">
  <thead>
    <tr>
    <th scope="col">id</th>
     <th scope="col">Select</th>
     <th scope="col">imei</th>
     <th scope="col">ice_id</th>


    </tr>


  </thead>
  <?php  $data=DB::table('device')->get();?>
  @foreach($data as $row)
            <tr>

                <td>{{$row->id}}</td>
                <td><input type='checkbox' value="{{$row->id}}" name="select[]"></td>
                <td>{{$row->imei}}</td>
                <td>{{$row->ice_id}}</td>

            </tr>
        @endforeach



       
</table>

        
           

<!------------------------------ //FORM------------------ -->


   
                        
                       

                     <div class="form-group">
                    
                              

                              <div class="form-group">
                                 <label>User Type</label>
                                 <select class="form-control" onChange=''  name="user_type"  id="user-select">
                                 <option >Select</option>
                                 <option  value="Sales Agent">Sales Agent</option>
                                    <option value="technician">technician</option>
                                 </select>
                                 
                              </div>


                              <div class="form-group">
                                 <label>Select User</label>
                                 <select class="form-control" onChange=''  name="user"  id="user">
                                    <option>Select User</option>
                                    
                                 </select>
                                 
                              </div>
                               

                              <div class="reset-button">
                                
                                 <input class="btn btn-success" type="submit" value="Submit"/>
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

$('#user-select').change(function(){
       $('#user').find('option').remove().end()
        
         $.ajax({
        url: '{{url('/')}}/api/getUserType/'+$(this).val()+'',
        type: "GET",
        dataType: 'json',
        success: function (result) {
            $.each(result, function (i, value) {
                $('#user').append('<option value="' + value.id + '">' + value.name + '</option>');
            });
        },
        error: function (request, status, error) {
            alert(request.statusText + "[" + request.status + "]");
            alert(request.responseText);
            $('button#form_salesReport_button').html(config.messages.searchReport);
        }
    });


    
})
        </script>




    @include('common.footer')