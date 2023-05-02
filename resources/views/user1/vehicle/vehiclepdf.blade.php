


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
        <h2 class="text-center mb-3">Vehicle PDF</h2>
        <div class="d-flex justify-content-end mb-4">
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                <th scope="col">ID</th>
      <th scope="col">Vehicle Number</th>
      <th scope="col">Customer</th>
      <!-- <th scope="col">RC Book File</th>
      <th scope="col">Vehicle Front View</th>
      <th scope="col">Vehicle Rare View</th>
      <th scope="col">Vehicle Back View</th>
       <th scope="col">Vehicle Leftside View</th>
        <th scope="col">Vehicle Rightside View</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($vehicle ?? '' as $data)
                <tr>
                <td>{{$data->id }}</td>
                <td>{{$data->vechicle_number}}</td>
                 <td>{{$data->customer_id->name}}</td>
                

               
                        
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>