@include('common_admin.header')

<div class="content-wrapper">
<section class="content">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Purchase Device Report</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        

                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Purchase Date</th>
                                       <th>Purchase From</th>
                                       <th>Amount</th>
                                       <th>Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                
                                  @foreach($allpurchase as $row)
                                    <tr>
                                       <td>{{$row->date}}</td>
                                       <td>{{$row->purchase_from}}</td>
                                       <td>{{$row->amount}}</td>
                                       <!-- <td class="text-center">
                                          <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target=""><i class="fa fa-pencil"></i></button>
                                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target=""><i class="fa fa-trash-o"></i> </button>
                                       </td> -->
                                    </tr>
                                    @endforeach
                                   
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- new table -->

                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonexport">
                              <a href="#">
                                 <h4>Sale Device Report</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                        

                           <div class="table-responsive">
                              <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Sale Date</th>
                                       <th>Sold to</th>
                                       <th>By User</th>
                                       <!-- <th>Action</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                
                                  @foreach($allsales as $row)
                                    <tr>
                                       <td>{{$row->date}}</td>
                                       <td>{{$row->allocated_to}}</td>
                                       <td>{{$row->user_id}}</td>
                                      
                                    </tr>
                                    @endforeach
                                   
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- new table  -->


                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="btn-add">
                              <a href="#">
                                 <h4>Device Internal Transfer</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                          
                           <div class="table-responsive">
                              <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                 <thead>
                                 
                                    <tr class="info">
                                       <th>Sender</th>
                                       <th>Receiver</th>
                                       <th>Date</th>
                                       
                                      
                                       <th>Transaction Type</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                                 @foreach($alltransaction as $row)
                                    <tr>
                                       <td>{{$row->sender}}</td>
                                       <td>{{$row->receiver}}</td>
                                       <td>{{$row->date}}</td>
                                      
                                     
                                    </tr>
                                    @endforeach
                                   
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               
<!-- //next table -->
               <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="btn-add">
                              <a href="#">
                                 <h4>Device Activation</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                          
                           <div class="table-responsive">
                              <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Activation Date</th>
                                       <th>Renewal Date</th>

                                       <th>Customer Id</th>
                                    
                                    </tr>
                                 </thead>
                                 
                                 <tbody>
                                 @foreach($alldevice as $row)
                                    <tr>
                                       <td>{{$row->activation_date}}</td>
                                       <td>{{$row->renewal_date}}</td>
                                       <td>{{$row->customer_id}}</td>
                                      
                                    </tr>
                                    @endforeach
                                    
                                   
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>




<!-- new -->
<div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="btn-add">
                              <a href="#">
                                 <h4>Device Service History</h4>
                              </a>
                           </div>
                        </div>
                        <div class="panel-body">
                          
                           <div class="table-responsive">
                              <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr class="info">
                                       <th>Device Id</th>
                                       <th>Purchase Date</th>
                                       <th>Vehicle Number</th>
                                       <th>Technician Name</th>
                                      
                                    
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td>01/05/2017</td>
                                       <td>Brac Bank</td>
                                       <td>Internet</td>
                                       <td>Iker cassias</td>
                                      
                                     
                                    </tr>
                                   
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
</div>



            </section>

</div>
@include('common_admin.footer')
