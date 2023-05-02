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
                              <i class="fa fa-list"></i>Add Sim Type</a>  
                           </div>

                        </div>
                        <div class="panel-body">
                             <h3> Sim Operator</h3>
                           <form class="col-sm-6" action="{{url('/')}}/simtypes-update/{{$data->id}}" method="post"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                     <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" class="form-control" name="name" placeholder="SIM Name" value="{{$data->name}}" required>
                              </div>
                              @if($errors->has('name'))
                             <div class="text-danger error">{{ $errors->first('name') }}</div>
                               @endif

                               

                              <div class="reset-button">
                                 <a href="#" class="btn btn-warning">Reset</a>
                                 <input class="btn btn-success" type="submit" value="Submit"/>
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