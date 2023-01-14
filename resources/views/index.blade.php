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
                           <i class="fa fa-user-plus fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">11</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Active Client</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-user-secret fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">4</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>  Active Admin</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-money fa-3x"></i>
                           <div class="counter-number pull-right">
                              <i class="ti ti-money"></i><span class="count-number">965</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>  Total Expenses</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number">11</span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Running Projects</h3>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
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
               </div>s
              
              
               <!-- /.row -->
              
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         
      </div>
      

      @include('common.footer')