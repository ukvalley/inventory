@include('common.header')

<div class="content-wrapper">
   <section class="content">
               <div class="row">
                  <!-- Form controls -->
                  <div class="col-sm-12">
                     <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                           <div class="btn-group" id="buttonlist"> 
                              <a class="btn btn-add "href="purchase_device"> 
                              <i class="fa fa-list"></i>EXel 1 </a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3>Device Data </h3>
                           <form class="col-sm-6" action="" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                     <div class="form-group">
                                 <label>Select File</label>
                                 <input type="File"  class="form-control" name="file" placeholder="file" required>
                              </div>

                              <div class="form-group">

                               
                               <div class="reset-button">
                                
                                 <input class="btn btn-success" type="submit" value="Submit" />
                                  <a href="{{ route('export-device')}}" class="btn btn-primary">Export Excel</a>
                              </div>

                     </form>
                        </div>
                      </div>
                   </div>
                </div>
             </section>


 <!-- Main content -->

            </div>




@include('common.footer')