@include('common.header') <style>
  h4 {
    font-weight: 600;
    font-size: 13px;
    color: black
  }

  .spaninfo {
    color: #129f90
  }

  .divid {
    background: #e8f1f3;
    padding: 5px;
  }

  .imgwid {
    width: 100%;
  }

  /*   
.zoom {
   padding: 55px;
    transition: transform .2s;
    width: 315px;
    height: 216px;
    margin: 0 auto;
}


.zoom:hover {
  transform: scale(2.0); (150% zoom - Note: if the zoom is too large, it will go outside of the viewport)
} */
</style>
<!-- Main content -->
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <!-- Form controls -->
      <div class="col-sm-8">
        <div class="panel panel-bd lobidrag">
          <div class="panel-heading">
            <div class="btn-group" id="buttonlist">
              <a class="btn btn-add " href="clist.html">
                <i class="fa fa-list"></i> Vehicle Registration </a>
            </div>
          </div>
          <div class="panel-body">
            <form method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <h4 class="divid"> Vehicle Details </h4>
              <h4> Vehicle Number <span class="spaninfo">{{$data->vechicle_number}}</span>
              </h4>
            <h4> Customer <span class="spaninfo">{{$data->customer}}</span>
              </h4>
              <h4 class="divid"> RC Book </h4>
              <div class="row">
                <div class="col-sm-6 zoom">
                  <img class="imgwid" src="{{url('/')}}/upload/{{$data->rc_book_file}}" alt="">
                  <a href="{{url('/')}}/upload/{{$data->rc_book_file}}" download>
                    <b>RC Book Image</b>
                  </a>
                </div>
              </div>
              <h4 class="divid"> Vehicle Images </h4>
              <div class="row">
                <div class="col-sm-6 zoom">
                  <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_1}}" alt="">
                  <a href="{{url('/')}}/upload/{{$data->vehicle_image_1}}" download>
                    <b>Vehicle Front View</b>
                  </a>
                </div>
                <div class="col-sm-6 zoom">
                  <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_2}}" alt="">
                  <a href="{{url('/')}}/upload/{{$data->vehicle_image_2}}" download>
                    <b>Vehicle Rear View</b>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 zoom">
                  <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_3}}" alt="">
                  <a href="{{url('/')}}/upload/{{$data->vehicle_image_3}}" download>
                    <b>Vehicle Back View</b>
                  </a>
                </div>
                <div class="col-sm-6 zoom">
                  <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_4}}" alt="">
                  <a href="{{url('/')}}/upload/{{$data->vehicle_image_4}}" download>
                    <b>Vehicle Leftside View</b>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 zoom">
                  <img class="imgwid" src="{{url('/')}}/upload/{{$data->vehicle_image_5}}" alt="">
                  <a href="{{url('/')}}/upload/{{$data->vehicle_image_5}}" download>
                    <b>Vehicle Rightside View</b>
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div> @include('common.footer')