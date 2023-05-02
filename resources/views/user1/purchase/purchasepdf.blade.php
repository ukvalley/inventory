


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Purchase PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Purchase PDF</h2>
        <div class="d-flex justify-content-end mb-4">
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                <th scope="col">ID</th>
                  <th scope="col">Date</th>
 
                 <th scope="col">ICE ID</th>
                 <th scope="col">Amount</th>
                 <th scope="col">Quantity</th>
                 <th scope="col">Manufactured By</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchase ?? '' as $data)
                <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->ice_id}}</td>
                <td>{{$data->amount}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->manufactured_by}}</td>

              
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>