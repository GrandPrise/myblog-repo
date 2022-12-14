@props(['status'])
@if (Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
@if (Session::has('fail'))
    <div class="alert alert-danger">
        <p>{{ Session::get('fail') }}</p>
    </div>
@endif
