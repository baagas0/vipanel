@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
    <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
        <li>
            <a class="nav-link active" href="{{ route('admin.roles') }}"><i
                    class="icon icon-home2"></i>{{ $page_title }}</a>
        </li>
    </ul>
</div>
@endsection
@section('content')
<div class="container-fluid my-3">
    <div class="card no-b">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover data-tables">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Last Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->updated_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Last Updated</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
