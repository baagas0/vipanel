@extends('layouts.app')
@section('tab')
<div class="row justify-content-between">
    <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
        <li>
            <a class="nav-link" href="{{ route('admin.news') }}"><i class="icon icon-home2"></i>All
                News</a>
        </li>
        <li>
            <a class="nav-link active" href="{{ route('admin.news.add') }}"><i class="icon icon-plus-circle"></i>
                {{ $page_title }}</a>
        </li>
    </ul>
</div>
@endsection
@section('content')
<div class="container-fluid my-3">
    <div class="card mb-3 shadow no-b r-0">
        <div class="card-header white">
            <h6>{{ $page_title }}</h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="needs-validation" novalidate>
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ (empty($data) ? old('title') : $data->title) }}" min="5" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <textarea name="content" class="form-control editor" placeholder="Write Something...">{{ (empty($data) ? old('content') : $data->content) }}
						</textarea>
                    </div>
                </div>
                <button class="btn btn-primary mr-3" type="submit" name="submit"><i class="icon icon-save2"></i> Publish</button>
                <button class="btn btn-warning mr-3" type="submit" name="submit" value="draft"><i class="icon icon-save2"></i> Save as Draft</button>
            </form>

            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function () {
                    'use strict';
                    window.addEventListener('load', function () {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function (form) {
                            form.addEventListener('submit', function (event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();

            </script>
        </div>
    </div>
</div>
@endsection
