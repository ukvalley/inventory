@include('common.header')
        <!-- Content Wrapper -->
        <div class="login-wrapper">
            <div class="container-center">
                        <div class="login-area">
                <div class="panel panel-bd panel-custom">
                    <div class="panel-heading">
                        <div class="view-header">
                            <div class="header-icon">
                                <i class="pe-7s-refresh-2"></i>
                            </div>
                            <div class="header-title">
                                <h3>Password Reset</h3>
                                <small><strong>Please fill the form to recover your password</strong></small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{url('/')}}/resetpassword_post">
                            @csrf

                            <p>Enter your mail for resetting your password</p>
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email adress" required="" value="" name="email" id="email" class="form-control">
                                <span class="help-block small">Your registered email address</span>
                            </div>
                            <div>
                                <a class="btn btn-add btn-block" type="submit">Reset password</a>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        @include('common.footer')