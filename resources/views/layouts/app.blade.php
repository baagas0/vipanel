@include('partials.header')
<!-- partial -->
<div class="page has-sidebar-left">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-database"></i>
                        {{ ucwords(request()->segment(2)) }}
                    </h4>
                </div>
            </div>
            @yield('tab')
            @if(session()->has('message'))
            <div class="toast" data-title="{{ ucwords(session()->get('message_type')) }}" data-message="{{ session()->get('message') }}" data-type="{{ session()->get('message_type') }}"></div>
            @endif
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="toast" data-title="Error!" data-message="{{ $error }}" data-type="error"></div>
            @endforeach
            @endif
        </div>
    </header>
    @yield('content')
</div>
@include('partials.right-sidebar')
@include('partials.foot')
<!-- partial -->