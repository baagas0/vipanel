@include('partials.head')
<!-- partial -->
@include('partials.sidebar')
<!-- partial -->
<div class="has-sidebar-left">
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            @include('partials.navbar')
            <!-- partial -->
        </div>
    </div>
</div>