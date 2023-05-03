<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Dec 2022 10:00:14 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CRM Admin Panel</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="{{url('/')}}/asset/img//dist/img/ico/favicon.png" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="{{url('/')}}/asset/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="{{url('/')}}/asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="asset/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="{{url('/')}}/asset/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="{{url('/')}}/asset/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="{{url('/')}}/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="{{url('/')}}/asset/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="{{url('/')}}/asset/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins 
         =====================================================================-->
      <!-- Emojionearea -->
      <link href="{{url('/')}}/asset/plugins/emojionearea/emojionearea.min.css" rel="stylesheet" type="text/css"/>
      <!-- Monthly css -->
      <link href="{{url('/')}}/asset/plugins/monthly/monthly.css" rel="stylesheet" type="text/css"/>
      <!-- End page Label Plugins 
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="{{url('/')}}/asset/dist/css/stylecrm.css" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="asset/dist/css/stylecrm-rtl.css" rel="stylesheet" type="text/css"/>-->
      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
      <!--preloader-->
      <!-- <div id="preloader">
         <div id="status"></div>
      </div> -->
      <!-- Site wrapper -->
      <div class="wrapper">
         <header class="main-header">
            <a href="index.html" class="logo">
               <!-- Logo -->
               <span class="logo-mini">
               <img src="{{url('/')}}/asset/dist/img/mini-logo.png" alt="">
               </span>
               <span class="logo-lg">
               <img src="{{url('/')}}/asset/dist/img/logo.png" alt="">
               </span>
            </a>
 <!-- Header Navbar -->
 <nav class="navbar navbar-static-top">
               <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <!-- Sidebar toggle button-->
                  <span class="sr-only">Toggle navigation</span>
                  <span class="pe-7s-angle-left-circle"></span>
               </a>
               <!-- searchbar-->
               <a href="#search"><span class="pe-7s-search"></span></a>
               <div id="search">
                 <button type="button" class="close">×</button>
                 <form>
                   <input type="search" value="" placeholder="Search.." />
                   <button type="submit" class="btn btn-add">Search...</button>
                </form>
             </div>
             <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                     <!-- Orders -->
<!-- Messages -->

                     <!-- Notifications -->

                     <!-- Tasks -->
                     <!-- Help -->
                     <!-- user -->
                     <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{url('/')}}/asset/dist/img/avatar5.png" class="img-circle" width="45" height="45" alt="user"></a>
                        <ul class="dropdown-menu" >
                           <li>
                              <a href="{{url('/')}}/admin/adminprofile">
                              <i class="fa fa-user"></i>Profile</a>
                           </li>
                           <li><a href="{{url('/')}}/admin/logout">
                              <i class="fa fa-sign-out"></i> Signout</a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </div>
            </nav>
         </header>
        <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="{{url('/')}}/admin/dashboard"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                 

                   <li class="treeview">
                     <a href="/transaction">
                     <i class="fa fa-users"></i><span>Customer</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                     <li><a href="{{url('/')}}/admin/customer1/customer_table">Show Customer</a></li>
                         <li><a href="{{url('/')}}/admin/customer1/register_customer">Add New Customer</a></li>
                         <li><a href="{{url('/')}}/admin/vehicle/vehicle_table">Show Vehicle</a></li>
                        <li><a href="{{url('/')}}/admin/vehicle/register_vehicle">Add New Vehicle</a></li>
                        <li><a href="{{url('/')}}/admin/manifacturer1/manifacturer_table">Show Manifacturers</a></li>

                        
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-bitbucket-square"></i><span>Device</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/')}}/admin/device1/device_table">Show Device</a></li>
                        <li><a href="{{url('/')}}/admin/purchase1/purchase_device">Purchase Device</a></li>
                        <li><a href="{{url('/')}}/admin/getImport">Import Device</a></li>
                        <li><a href="{{url('/')}}/admin/transfer">Transfer Device</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-shopping-cart"></i><span>Sales</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{url('/')}}/admin/device_sale">Sale Device</a></li>
                        <li><a href="{{url('/')}}/admin/sale/sales_table">Show Sale Device</a></li>
                      
                     </ul>
                  </li>
                 
                  
                  <!-- <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i><span>Report</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="#">Customer Report</a></li>
                        <li><a href="#">Vehicle Report</a></li>
                        <li><a href="#">Device Report</a></li>
                        <li><a href="#">Device Transfer Report</a></li>
                        <li><a href="#">Device Sell Report</a></li>
                        <li><a href="#">Device History</a></li>

                     </ul>
                  </li> -->
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gear"></i><span>Setting</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>

                     <ul class="treeview-menu">
                        <li><a href="{{url('/')}}/admin/sim/simtypes">Add Sim Types</a></li>
                        <li><a href="{{url('/')}}/admin/manifacturer1/manifacturer">Add Manifacturer</a></li>
                        <li><a href="{{url('/')}}/admin/user/register_user">Add User</a></li>
                     </ul>
                     
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-book"></i><span>Service Order</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="">Service1</a></li>
                        <li><a href="">Service2</a></li>
                     
                        
                     </ul>
                  </li>

                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>MAdmin  Delete</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu" >
                        <li><a href="{{url('/')}}/admin/customer1/customer_table">Customer</a></li>
                        <li><a href="{{url('/')}}/admin/vehicle/vehicle_table">Vehicle</a></li>
                        <li><a href="{{url('/')}}/admin/user/user_table">User</a></li>
                        <li><a href="{{url('/')}}/admin/device/device_table">Device</a></li>
                        <li><a href="{{url('/')}}/admin/purchase1/purchase_table">Purchase</a></li>
                        <li><a href="{{url('/')}}/admin/sale/sales_table">Sales</a></li>
                         <!-- <li><a href="/records/records_table">Records</a></li> -->
                         <li><a href="{{url('/')}}/admin/sim/sim_table">Sim Types</a></li>
                         <li><a href="{{url('/')}}/admin/manifacturer1/manifacturer_table">Manifacturer</a></li>
                         <li><a href="{{url('/')}}/admin/transaction1/transaction_table">Transaction</a></li>
                         <li><a href="{{url('/')}}/admin/device_sale">Device Sale</a></li>
                         <li><a href="{{url('/')}}/admin/purchase1/purchase_table">Purchase Table</a> </li>
                         <li><a href="{{url('/')}}/admin/sale/sales_table">Sales Table</a></li>
                     </ul>
                  </li>
                
         </aside>
         <!-- =============================================== -->