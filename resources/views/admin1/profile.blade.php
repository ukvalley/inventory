@include('common.header')



         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon"><i class="fa fa-user-circle-o"></i></div>
               <div class="header-title">
                  <h1>Profile</h1>
                  <small>Show user data in clear profile design</small>
               </div>
            </section>


            <!-- Main content -->
            <section class="content ">
              
               <div class="row">
                  <div class=" col-md-4">
                  <center>
                     <div class="card">
                        <div class="card-header">
                           <div class="card-header-headshot"></div>
                        </div>
                        <div class="card-content">
                           <div class="card-content-member text-center">
                              <!-- <h4 class="m-t-0"></h4>
                              <p class="m-t-0"></p> -->
                           </div>
                           <div class="card-content-languages">
                              <div class="card-content-languages-group">
                                 <div>
                                    <h4>User Id</h4>
                                 </div>
                                 <div>
                                    <ul>
                                       <li>
                                         {{$user_id}}
                                          <div class="fluency fluency-4"></div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="card-content-languages-group">
                                 <div>
                                    <h4>Name:</h4>
                                 </div>
                                 <div>
                                    <ul>
                                       <li>{{$username}}</li>
                                       
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="card-content-summary">
                              <p>Specialties are Creative UI, HTML5, CSS3, Semantic Web, Responsive Layouts, Web Standards Compliance, Performance Optimization, Cross Device Troubleshooting.</p>
                           </div>
                        </div>
                        <div class="card-footer">
                           <div class="card-footer-stats">
                              <div>
                                 <p>Device Sold:</p>
                                 <i class="fa fa-users"></i><span>{{$soldCount}}</span>
                              </div>
                              <div>
                                 <p>Allocated:</p>
                                 <i class="fa fa-coffee"></i><span>{{$totalDeviceCount}}</span>
                              </div>
                              <div>
                                 <p>Unsold Devices</p>
                                 <span class="stats-small">{{$unsoldCount}}</span>
                              </div>
                           </div>

                           <!-- <div class="card-footer-message">
                              <h4><i class="fa fa-comments"></i> Message me</h4>
                           </div> -->
                        </div>
                     </div>
                  </div>


                  <hr>
                  </center>
                  </div>
               </div>
            </section>


        

            <!-- /.content -->

         </div>
         
         <!-- /.content-wrapper -->
        
    

@include('common.footer')