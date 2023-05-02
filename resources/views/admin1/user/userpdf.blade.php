


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
        <h2 class="text-center mb-3">User PDF</h2>
        <div class="d-flex justify-content-end mb-4">
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">City</th>
      <th scope="col">Higher Authority</th>
      <th scope="col">Basic Amount</th>
      <th scope="col">User Type</th>

                </tr>
            </thead>
            <tbody>
                @foreach($user ?? '' as $data)
                <tr>
                <td>{{$data->id }}</td>
                <td>{{$data->name }}</td>
                <td>{{$data->mobile }}</td>
                <td>{{$data->city}}</td>
                <td>{{$data->admiko_parent_child}}</td>
                <td>{{$data->basic_amount}}</td>
                <td>{{$data->user_type}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>