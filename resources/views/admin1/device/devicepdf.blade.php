


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Device PDF</h2>
        <div class="d-flex justify-content-end mb-4">
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                <th scope="col">id</th>
      <th scope="col">Manifactured By</th>
      <th scope="col">ICE_ID</th>
      <th scope="col">IMEI</th>
      <!-- <th scope="col">SIM1</th> -->
      <th scope="col">SIM1 Type</th>
      <!-- <th scope="col">SIM2</th> -->
      <th scope="col">SIM2 Type</th>
      <!-- <th scope="col">Activation Date</th> -->
       <th scope="col">Received Date</th>
        <!-- <th scope="col">Renewal Date</th> -->
        <!-- <th scope="col">Asset Id Type</th> -->
        <th scope="col">Staff</th>
        <!-- <th scope="col">Customer</th> -->
        <!-- <th scope="col">Status</th> -->

      <!-- <th scope="col">Adhar Front Image</th>
      <th scope="col">Adhar Back Image</th> -->
      
                </tr>
            </thead>
            <tbody>
                @foreach($device ?? '' as $data)
                <tr>
                <td>{{$data->id }} </a></td>
               
                <td>{{$data->manufactured_by_id->name ?? ''}}</td>
                <td>{{$data->ice_id}}</td>
                <td>{{$data->imei}}</td>
                <!-- <td{{$data->sim1}}</td> -->
                
                <td>{{$data->sim_1_type_id->name ?? ''}}</td>
                <!-- <td>{{$data->sim2}}</td> -->
                  <td>{{$data->sim_2_type_id->name ?? ''}}</td>
                  <!-- <td>{{$data->activation_date}}</td> -->
                  <td>{{$data->received_date}}</td>
                  <!-- <td>{{$data->renewal_date}}</td> -->
                  <!-- <td>{{$data->asset_id_type}}</td> -->
                  <td>{{$data->user_id_id->name ?? ''}}</td>
                  <!-- <td>{{$data->customer_id_id->name ?? ''}}</td> -->

                  <!-- <td>
                    @if($data->status == null || $data->status == 'unsold')
                      <span class="btn btn-danger small">Unsold</span>
                    @else
                    <span class="btn btn-success small">Sold</span>
                    @endif
                  </td> -->
               
         
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>