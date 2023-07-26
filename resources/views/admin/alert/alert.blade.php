@if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
        <div class="alert-body">
            <i data-feather="check"></i>
            <span> {{ session('success') }}</span>
        </div>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger" role="alert">
        <div class="alert-body">
            <i data-feather="alert-circle"></i>
            <span> {{ session('error') }}</span>
        </div>
    </div>
@endif
