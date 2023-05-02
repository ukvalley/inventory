 @include('common.header')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="header-icon">
         <i class="fa fa-dashboard"></i>
      </div>
      <div class="header-title">
         <h1>CRM Admin Dashboard</h1>
         <small>Very detailed & featured admin.</small>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div id="cardbox1">
               <div class="statistic-box">
                  <i class="fa fa-tablet fa-3x"></i>
                  <div class="counter-number pull-right">
                     <span class="count-number">{{$totalDeviceCount}}</span> 
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3> Total Devices</h3>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div id="cardbox2">
               <div class="statistic-box">
                  <i class="fa fa-check-square-o fa-3x"></i>
                  <div class="counter-number pull-right">
                     <span class="count-number">{{$soldCount}}</span> 
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3>  Sold Device</h3>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div id="cardbox3">
               <div class="statistic-box">
                  <i class="fa fa-hdd-o fa-3x"></i>
                  <div class="counter-number pull-right">
                    </i><span class="count-number">{{$unsoldCount}}</span> 
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3>Unsold Device</h3>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div id="cardbox4">
               <div class="statistic-box">
                  <i class="fa fa-user-circle fa-3x"></i>
                  <div class="counter-number pull-right">
                     <span class="count-number">{{$salesAgentCount}}</span> 
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3>Total Staff</h3>
               </div>
            </div>
         </div>
      </div>
      
      <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div id="cardbox1">
               <div class="statistic-box">

                  <i class="fa fa-wrench fa-3x"></i>
                  <div class="counter-number pull-right">
                     <span class="count-number">{{$technicianCount}}</span> 
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3>Total Technician</h3>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div id="cardbox2">
               <div class="statistic-box">
                  <i class="fa fa-group  fa-3x"></i>
                  <div class="counter-number pull-right">
                     <span class="count-number">{{$customerCount}}</span> 
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3>Total Customers</h3>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div id="cardbox3">
               <div class="statistic-box">
                  <i class="fa fa-automobile fa-3x"></i>
                  <div class="counter-number pull-right">
                   </i><span class="count-number">{{$vehicleCount}}</span> 
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3>  Total Vehicles</h3>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div id="cardbox4">
               <div class="statistic-box">
                  <i class="fa fa-gears  fa-3x"></i>
                  <div class="counter-number pull-right">
                     <span class="count-number">{{$manifacturerCount}}</span> 
                     <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                     </span>
                  </div>
                  <h3> Manifacturers</h3>
               </div>
            </div>
         </div>
      </div>
      
      <!-- <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="panel panel-bd lobidisable">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>Upcoming Events</h4>
                  </div>
               </div>
              
            </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="panel panel-bd lobidisable">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>Running Projects</h4>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="runnigwork">
                     <span class="label-danger label label-default pull-right">Failed</span>
                     <i class="fa fa-dot-circle-o"></i>        
                     <a href="#">Database configuration</a><br>                          
                     <div class="progress runningprogress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="25%"></div>
                     </div>
                  </div>
                  <div class="runnigwork">
                     <span class="label-warning label label-default pull-right">progressing</span>
                     <i class="fa fa-dot-circle-o"></i>        
                     <a href="#">Design tool</a><br>                          
                     <div class="progress runningprogress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="15%"></div>
                     </div>
                  </div>
                  <div class="runnigwork">
                     <span class="label-success label label-default pull-right">progressing</span>
                     <i class="fa fa-dot-circle-o"></i>        
                     <a href="#">Internet configuration</a><br>                          
                     <div class="progress runningprogress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="45%"></div>
                     </div>
                  </div>
                  <div class="runnigwork">
                     <span class="label-info label label-default pull-right">progressing</span>
                     <i class="fa fa-dot-circle-o"></i>        
                     <a href="#">Banner completation</a><br>                          
                     <div class="progress runningprogress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="75%"></div>
                     </div>
                  </div>
                  <div class="runnigwork">
                     <span class="label-success label label-default pull-right">Success</span>
                     <i class="fa fa-dot-circle-o"></i>        
                     <a href="#">IT Solution</a><br>                          
                     <div class="progress runningprogress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="50%"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> -->

      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="panel panel-bd lobidisable">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>Latest Sold Devices</h4>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="Workslist">
                     <div class="worklistdate">
                        <table class="table table-hover">
                           <thead>
                              <tr>
                                 <th>Ice Id</th>
                                 <th>Date</th>
                              </tr>
                           </thead>
                           <tbody>

                            @foreach($data as $row)
                              <tr class="info">
                                 <td>{{$row->device_number}}</td>
                                 <td>{{$row->date}}</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Latest 5 Customers -->

         
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="panel panel-bd lobidisable">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>Latest Customers</h4>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="Workslist">
                     <div class="worklistdate">
                        <table class="table table-hover">
                           <thead>
                              <tr>
                                 <th>Customer Id</th>
                                 <th>Name</th>
                              </tr>
                           </thead>
                           <tbody>
                            @foreach($allcustomer as $row)
                              <tr class="info">
                                 <td>{{$row->id}}</td>
                                 <td>{{$row->name}}</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- lates % Vehicles -->
         <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="panel panel-bd lobidisable">
               <div class="panel-heading">
                  <div class="panel-title">
                     <h4>New Vehicles</h4>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="Workslist">
                     <div class="worklistdate">
                        <table class="table table-hover">
                           <thead>
                              <tr>
                                 <th>Vehicle Number</th>
                                 <th>Customer</th>
                              </tr>
                           </thead>
                           <tbody>
                           
                            @foreach($allvehicle as $row)
                              <tr class="info">
                                 <td>{{$row->vechicle_number}}</td>
                                 <td>{{$row->customer_id->name}}</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      <!-- /.row -->
     
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>     
@include('common.footer')