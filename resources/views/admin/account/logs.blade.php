@extends('layouts.custom')
@section('content')
<div class="page has-sidebar-left">
  <header class="blue accent-3 relative">
    <div class="container-fluid text-white">
      <div class="row p-t-b-10 ">
        <div class="col">
          <div class="pb-3">
            <div class="image mr-3  float-left">
              <img class="user_avatar no-b no-p" src="{{ asset(auth('admin')->user()->photo) }}" alt="User Image">
            </div>
            <div>
              <h6 class="p-t-10">{{ auth('admin')->user()->name }}</h6>
              {{ auth('admin')->user()->email }}
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-between">
        <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
          <li>
            <a class="nav-link" href="{{ route('admin.account') }}"><i class="icon icon-user"></i>Account</a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.account.change.password') }}"><i class="icon icon-lock"></i>
              Change Password</a>
          </li>
          <li>
            <a class="nav-link active" href="{{ route('admin.account.logs') }}"><i class="icon icon-clock-o"></i>
              Log Activity</a>
          </li>
        </ul>
      </div>

    </div>
  </header>

  <div class="container-fluid my-3">
    <div class="card no-b">
      <div class="card-body">
        <div class="table-responsive">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Date</th>
                <th>Page</th>
                <th>Description</th>
                <th>IP</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Date</th>
                <th>Page</th>
                <th>Description</th>
                <th>IP</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('bottom')
<script>
  var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        "ajax": {
            url: '{{ route('admin.api.logs') }}',
            type: 'POST',
            'headers': {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        },
        columns: [{
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'page',
                name: 'page'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'ip',
                name: 'ip'
            },
        ],
    });

</script>
@endpush