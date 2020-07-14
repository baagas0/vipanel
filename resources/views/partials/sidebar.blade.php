<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="{{ asset('img/basic/logo.png') }}" alt="">
        </div>
        <div class="relative">
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="{{ asset('img/dummy/u1.png') }}" alt="User Image">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1">{{ auth('admin')->user()->name }}</h6>
                        <a href="javascript:void(0)"><i class="icon-circle text-primary blink"></i> Online</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="icon icon-sailing-boat-water red-text s-18"></i><span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users') }}">
                    <i class="icon icon-account_box blue-text s-18"></i><span>Users</span>
                </a>
            </li>
            <li class="treeview no-b">
                <a href="javascript:void(0)">
                    <i class="icon icon-attach_money yellow-text s-18"></i>
                    <span>Deposits</span>
                    <span class="badge r-3 badge-warning pull-right white-text">0</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.deposits') }}"><i class="icon icon-circle-o"></i>All Deposits</a>
                    </li>
                    <li><a href="{{ route('admin.deposits.waiting') }}"><i class="icon icon-circle-o"></i>Waiting Payment <span class="badge r-3 badge-warning pull-right">0</span></a>
                    </li>
                    <li><a href="{{ route('admin.deposits.success') }}"><i class="icon icon-circle-o"></i>Success Payment</a>
                    </li>
                    <li><a href="{{ route('admin.deposits.failed') }}"><i class="icon icon-circle-o"></i>Failed Payment</a>
                    </li>
                </ul>
            </li>
            <li class="treeview no-b">
                <a href="javascript:void(0)">
                    <i class="icon icon-package purple-text s-18"></i>
                    <span>Orders</span>
                    <span class="badge r-3 badge-warning pull-right">0</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.orders') }}"><i class="icon icon-circle-o"></i>All Orders</a>
                    </li>
                    <li><a href="{{ route('admin.orders.waiting') }}"><i class="icon icon-circle-o"></i>Waiting Payment <span class="badge r-3 badge-warning pull-right">0</span></a>
                    </li>
                    <li><a href="{{ route('admin.orders.success') }}"><i class="icon icon-circle-o"></i>Success Payment</a>
                    </li>
                    <li><a href="{{ route('admin.orders.failed') }}"><i class="icon icon-circle-o"></i>Failed Payment</a>
                    </li>
                </ul>
            </li>

            <!-- Deactive Vouchers -->
            <!-- <li>
                <a href="#">
                    <i class="icon icon-receipt orange-text s-18"></i><span>Vouchers</span>
                </a>
            </li> -->
            <!-- Deactive Vouchers -->
            
            <li class="header light mt-3"><strong>ADMIN NAVIGATION</strong></li>
            <li class="treeview"><a href="javascript:void(0)"><i class="icon icon-account_box red-text s-18"></i>Master Admin<i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.data') }}"><i class="icon icon-circle-o"></i>All Admins</a>
                    </li>
                    <li><a href="panel-page-users-create.html"><i class="icon icon-add"></i>Roles</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.news') }}">
                    <i class="icon icon-newspaper-o blue-text s-18"></i><span>News</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.payments') }}">
                    <i class="icon icon-cc-mastercard yellow-text s-18"></i><span>Payments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.settings') }}">
                    <i class="icon icon-gear purple-text s-18"></i><span>Settings</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.log') }}">
                    <i class="icon icon-signal green-text s-18"></i><span>Log Activity</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
<!--Sidebar End-->