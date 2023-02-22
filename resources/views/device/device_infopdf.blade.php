


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<style >
	h3{
		background: #FFC107;
	}
  .page-break {
  page-break-after: always;}
</style>
<!-- <body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Device Details PDF</h2>
        <div class="d-flex justify-content-end mb-4">
        </div>
        <div class="panel-body ">
        @foreach($device ?? '' as $data)

            <h4  style="color:red">Devices Id:{{$data->id}}
             
            </h4>
          
              <p>Manafactured By:{{$data->manufactured_by_id->name ?? 
                ''}} 
              </p>
             
                  <h4>ICE ID:{{$data->ice_id}}
                  </h4>
                
                
                  <h4>IMEI:{{$data->imei}}
                  </h4>
               
             
              <h4 class="divid">Devices Connections </span>
              </h4>
              
                  <h4>SIM1 Type{{$data->sim_1_type_id->name ?? ''}}
                  </h4>
                
               
                  <h4>SIM1:{{$data->sim1}}
                  </h4>
             
                  <h4>SIM2 Type:{{$data->sim_2_type_id->name ?? ''}}
                  </h4>
                </div>
               
                  <h4>SIM2:{{$data->sim2}}
                  </h4>
                
              <h4 class="divid">Devices History
              </h4>
             
                <h4>Activation Date:{{$data->activation_date}}
                </h4>
             
                <h4>Received Date:{{$data->received_date}}
                </h4>
              
              
                <h4>Renewal Date:{{$data->renewal_date}}
                </h4>
             
              <h4 class="divid">Devices Allocations </span>
              </h4>
              
                  <h4>User Id:{{$data->user_id_id->name ?? ''}}
                  </h4>
                
                  <h4>Customer Id:{{$data->customer_id_id->name ?? ''}}
                  </h4>
               
             
         
          </div>
          @endforeach
    </div>
</body> -->
<body>
 @foreach($device ?? '' as $data)

	<h3 >Device Id:{{$data->id}}</h3>

		<p>Manifactured By:{{$data->manufactured_by_id->name ?? ''}}</p>
		<p>ICE Id:{{$data->ice_id}}</p>
		<p>IMEI Id:{{$data->imei}}</p>

	<h3>Device Connections</h3>
	<p>Sim 1 Type:{{$data->sim_1_type_id->name ?? ''}}   <span>Sim 1 Number:{{$data->sim1}}</span> </p>
    <p>Sim 1 Type:{{$data->sim_2_type_id->name ?? ''}}    <span>Sim 1 Number:{{$data->sim2}}</span> </p>

	<h3>Device History</h3>
	<p>Activation Date:{{$data->activation_date}}</p>
    <p>Received Date:{{$data->received_date}}</p>
    <p>Renewal Date:{{$data->renewal_date}}</p>


	<h3>Device Allocations</h3>
	<p>User Id:{{$data->user_id_id->name ?? ''}}</p>
    <p>Customer Id:{{$data->customer_id_id->name ?? ''}}</p>
    <div class="page-break"></div>
@endforeach
</body>
</html>