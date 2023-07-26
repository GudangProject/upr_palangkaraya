<x-master-layouts>
@include('sweetalert::alert')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        @livewire('jobs.jobs-table')
    </div>
</div>
</x-master-layouts>
