


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