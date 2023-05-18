@include('users.common.userheader')




<div class="content-wrapper">
<div>
            <div class="panel panel-default">
                <div class="panel-heading role-list-info-header">
                  <a href="#" class="btn btn-success">Device Acceptance</a>
                    <p>Device Table</p>

                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
        <form id="deviceForm">
            @csrf
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Transfer From</th>
                        <th>Device ID</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($deviceTransfers as $device)
                        <tr>
                        @if($device->status == 'pending')
                            <td>{{ $device->id }}</td>
                            <td>{{ $device->from_user_id }}</td>
                            <td>{{ $device->gps_device_id }}</td>
                            <td>{{ $device->status }}</td>
                            <td>
                                <input type="checkbox" name="selectedDevices[]" value="{{ $device->id }}">
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <button type="button" id="acceptBtn">Accept</button>
                <button type="button" id="rejectBtn">Reject</button>
            </div>
        </form>

      
    </div>
    





    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
  
  
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // Handle accept button click event
        document.getElementById('acceptBtn').addEventListener('click', function() {
            sendRequest('accept');
        });

        // Handle reject button click event
        document.getElementById('rejectBtn').addEventListener('click', function() {
            sendRequest('reject');
        });

        // Function to send the AJAX request
        function sendRequest(action) {
            const selectedDevices = Array.from(document.querySelectorAll('input[name="selectedDevices[]"]:checked')).map(el => el.value);

            if (selectedDevices.length === 0) {
                alert('Please select at least one device.');
                return;
            }

          axios.post('/user/device-transfers/' + action, {
                    devices: selectedDevices
                })
                .then(function(response) {
                  console.log(response);
                    alert(response.data.message);
                    location.reload(); // Refresh the page after accepting/rejecting
                })
                .catch(function(error) {
                    console.log(error);
                    alert('An error occurred.');
                });
        }
    </script>




    


    @include('users.common.footer')