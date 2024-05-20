@if(session()->has('message'))
<div class="alert alert-success alert-dismissible show fade">
    <h4 class="alert-heading">Success</h4>
    <p>{{ session('message') }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
