<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Laravel HTML to PDF Example</h2>
        <div class="d-flex justify-content-end mb-4">
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                <th scope="col">ID</th>
      <th scope="col">Date</th>
      <th scope="col">Device ID</th>
      <th scope="col"> ICE ID</th>
      <th scope="col">Allocated to</th>
      <th scope="col">User ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data  as $data1)
                <tr>
                    <th scope="row">{{ $data1->id }}</th>
                    
                <td>{{$data1->date }}</td>
                <td>{{$data1->device_id}}</td>
                <td>{{$data1->device_number}}</td>
                <td>{{$data1->allocated_to}}</td>
                <td>{{$data1->user_id}}</td>
               <td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>