{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['customer_allow', 'customer_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "customer" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.customer.index')}}"><i class="fas fa-file-alt fa-fw"></i>Customer</a></li>
@endIf
@if(Gate::any(['vechicles_allow', 'vechicles_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "vechicles" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.vechicles.index')}}"><i class="fas fa-file-alt fa-fw"></i>Vechicles</a></li>
@endIf
@if(Gate::any(['users_allow', 'users_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "users" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.users.index')}}"><i class="fas fa-file-alt fa-fw"></i>Users</a></li>
@endIf
@if(Gate::any(['device_allow', 'device_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "device" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.device.index')}}"><i class="fas fa-file-alt fa-fw"></i>Device</a></li>
@endIf
@if(Gate::any(['sim_types_allow', 'sim_types_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "sim_types" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.sim_types.index')}}"><i class="fas fa-file-alt fa-fw"></i>Sim Types</a></li>
@endIf
@if(Gate::any(['purchase_allow', 'purchase_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "purchase" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.purchase.index')}}"><i class="fas fa-file-alt fa-fw"></i>Purchase</a></li>
@endIf
@if(Gate::any(['sales_allow', 'sales_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "sales" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.sales.index')}}"><i class="fas fa-file-alt fa-fw"></i>Sales</a></li>
@endIf
@if(Gate::any(['records_allow', 'records_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "records" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.records.index')}}"><i class="fas fa-file-alt fa-fw"></i>Records</a></li>
@endIf
@if(Gate::any(['device_transfer_allow', 'device_transfer_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "device_transfer" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.device_transfer.index')}}"><i class="fas fa-file-alt fa-fw"></i>Device Transfer</a></li>
@endIf