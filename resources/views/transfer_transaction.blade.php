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
            
             
              <!--search bar -->
              <div class="">
                <label>Search.</label>
                <input type="text" name="search1" id="search1" class="" placeholder="Search Device Data" />
              </div>
              <!-- End search bar -->
              <table class="table table-striped table-dark">
              
                <thead>
                  <tr>
                    <th scope="col">
                      <table class="table table-striped table-dark">
                        <thead>
                          <tr>
                            <th scope="col">Check</th>
                            <th scope="col">ID</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">IMEI</th>
                            <th scope="col">ICE ID</th>
                          </tr>
                        </thead>
                         <?php  $data=DB::table('device')->get();?> 
                          <tbody>
                          @foreach($alldevice as $row)
            <tr>
            <td>
                  <input type='checkbox' value="{{$row->id}}" name="select[]">
                </td>
                <td>{{$row->id}}</td>
                <td>{{$row->manufactured_by_id->name ?? ''}}</td>
                <td>{{$row->imei}}</td>

                <td>{{$row->ice_id}}</td>
               

            </tr>
        @endforeach

                          </tbody>
                      </table>
                      <!------------------------------ //FORM------------------ -->
                      <div class="form-group">
                        <div class="form-group">
                          <label>User Type</label>
                          <select class="form-control" onChange='' name="user_type" id="user-select">
                            <option>Select</option>
                            <option value="sales_agent">Sales Agent</option>
                            <option value="technician">technician</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Select User</label>
                          <select class="form-control" onChange='' name="user" id="user">
                            <option>Select User</option>
                          </select>
                        </div>
                        <div class="reset-button">
                          <input class="btn btn-success" type="submit" value="Submit" />
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $('#user-select').change(function() {
          $('#user').find('option').remove().end()
          $.ajax({
              url: '{{url('/')}}/api/getUserType/' + $(this).val() + '',
              type: "GET",
              dataType: 'json',
              success: function(result) {
                console.log(result);
                $.each(result, function(i, value) {
                      $('#user').append('<option value = "' + value.id + '" > ' + value.name + ' </option>');
                      });
                  },
                  error: function(request, status, error) {
                    alert(request.statusText + "[" + request.status + "]");
                    alert(request.responseText);
                    $('button#form_salesReport_button').html(config.messages.searchReport);
                  }
              });
          });
  </script>



  <script>
    $(document).ready(function() {
      
      fetch_device_data();

      function fetch_device_data(query = '') 
      {
        $.ajax({
          url: "{{url('/')}}/transfer_transaction/action",
          type: "GET",
          dataType: "json",
          data: {
            query: query
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

  @include("common.footer")

