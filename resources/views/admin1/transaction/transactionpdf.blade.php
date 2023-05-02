


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
        <h2 class="text-center mb-3">Sales PDF</h2>
        <div class="d-flex justify-content-end mb-4">
        </div>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                <th scope="col">Device Id</th>
    <th scope="col">Sender</th>
      <th scope="col">Receiver</th>
      <th scope="col">Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Quantity</th>
      <th scope="col">Transaction Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction ?? '' as $data)
                <tr>
                <td>{{$data->id}}</td>
               <td>{{$data->sender}}</td>
                <td>{{$data->receiver}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->amount}}</td>


                <td>{{$data->transaction_type}}</td>
         
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>