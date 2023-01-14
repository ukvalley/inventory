 @include('common.header')

 <!-- Form controls -->
 <div class="content-wrapper">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="clist.html"> 
                              <i class="fa fa-list"></i>Transaction </a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6">
                              <div class="form-group">
                                 <label>Sender</label>
                                 <input type="text" class="form-control" placeholder="Sender" name="sender" required>
                              </div>
                              <div class="form-group">
                                 <label>Receiver</label>
                                 <input type="text" class="form-control" placeholder="Receiver" name="receiver" required>
                              </div>
                             
                              <div class="form-group">
                                 <label>Device Id</label>
                                 <input type="number" class="form-control" placeholder="Device Id" name="device_id" required>
                              </div>
                             
                              <div class="form-group">
                                 <label>Date</label>
                                 <input id='minMaxExample' type="text" class="form-control" name="date" placeholder="Enter Date...">
                              </div>
                             
                              <div class="form-group">
                                 <label>Transaction type</label>
                                 <select class="form-control" name="Transcation_type" id="Transcation_type">
                                    <option value="">type1</option>
                                    <option value="">type2</option>
                                 </select>
                              </div>

                              <div class="form-group">
                                 <label>Transaction Status</label>
                                 <select class="form-control" name="transcation_type">
                                    <option value="Completed"> Completed</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Failed">Failed</option>
                                 </select>
                              </div>
                              
                            
                              <div class="reset-button">
                                 <a href="#" class="btn btn-warning">Reset</a>
                                 <a href="#" class="btn btn-success">Save</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

                  </div>


                  @include('common.footer')