@include('common.header')


 <!-- Main content -->
 <div class="content-wrapper">
 <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add " href="clist.html"> 
                              <i class="fa fa-list"></i>  Transaction List </a>  
                           </div>

                         
                        </div>
                        <div class="panel-body">
                           <form class="col-sm-6" action="{{url('/')}}/register_transaction-post" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                 
                                
                           <div class="form-group">
                                 <label>Sender</label>
                                 <input type="text" class="form-control" name="sender" placeholder=" sender" id="sender" required>
                              </div>
                              @if($errors->has('sender'))
                             <div class="text-danger error">{{ $errors->first('sender') }}</div>
                               @endif
                              
                              
                              <div class="form-group">
                                 <label>Receiver</label>
                                 <textarea class="form-control"  name="receiver"id="receiver" required></textarea>
                              </div>
                              @if($errors->has('receiver'))
                             <div class="text-danger error">{{ $errors->first('receiver') }}</div>
                               @endif
                               
                               <div class="form-group">
                                 <label> Date</label>
                              <input type="Date"  data-date_time_format="MMM DD, Y" class="form-control datetimepicker-input datePicker" name="date"  data-target="datePicker_renewal_date" data-toggle="datetimepicker" placeholder=" Date" >
                                </div>
                                @if($errors->has('date'))
                             <div class="text-danger error">{{ $errors->first('date') }}</div>
                               @endif

                               <div class="form-group">
                                 <label>Amount</label>
                                 <input type="text" class="form-control" name="amount" placeholder=" amount" id="amount" required>
                              </div>
                              @if($errors->has('amount'))
                             <div class="text-danger error">{{ $errors->first('amount') }}</div>
                               @endif
                               

                               <div class="form-group">
                                 <label>Transaction Type</label>
                                 <input type="text" class="form-control" name="transaction_type" placeholder=" transaction_type" id="transaction_type" required>
                              </div>
                              @if($errors->has('transaction_type'))
                             <div class="text-danger error">{{ $errors->first('transaction_type') }}</div>
                               @endif
                              
                           
                           
                             
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- /.content -->
            </div>

@include('common.footer')