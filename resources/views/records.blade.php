 @include('common.header')

 <!-- Form controls -->
 <div class="content-wrapper">
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="records"> 
                              <i class="fa fa-list"></i>records</a>  
                           </div>
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6">
                              <div class="form-group">
                                 <label>Date</label>
                                 <input type="Date" class="form-control" placeholder="Date" name="date" required>
                              </div>
                              <div class="form-group">
                                 <label>Total Device</label>
                                 <input type="text" class="form-control" placeholder="Total Device" name="total_device" required>
                              </div>

                             
                              <div class="form-group">
                                 <label>Alloted Device</label>
                                 <input type="number" class="form-control" placeholder="Alloted Device" name="alloted_device" required>
                              </div>
                               <div class="form-group">
                                 <label>Available Device</label>
                                 <input type="text" class="form-control" placeholder="Total Device" name="total_device" required>
                              </div>
                             
                              <div class="form-group">
                                 <label>Not Alloted</label>
                                 <input id='minMaxExample' type="text" class="form-control" name="Not Alloted" placeholder="received_by">
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



