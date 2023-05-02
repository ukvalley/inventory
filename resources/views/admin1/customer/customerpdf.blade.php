


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
        <h2 class="text-center mb-3">Customer PDF</h2>
        <div class="d-flex justify-content-end mb-4">
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Mobile</th>
      <th scope="col">Adhar Number</th>
      <!-- <th scope="col">Adhar Front Image</th>
      <th scope="col">Adhar Back Image</th> -->
      
                </tr>
            </thead>
            <tbody>
                @foreach($customer ?? '' as $data)
                <tr>
                <td>{{$data->id }}</td>
                <td>{{$data->name }}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->mobile}}</td>
                <td>{{$data->adhar_number}}</td>
                <!-- <td>
                 
                  <img width="50px" src="{{url('/')}}/upload/{{$data->adhar_front_image}}"> 
                 
                </td>
                <td>
                  <img width="50px" src="{{url('/')}}/upload/{{$data->adhar_back_image}}"> 
                 
                </td> -->
         
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>