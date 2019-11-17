@include('admin.includes.header')

@include('admin.includes.navbar')

@include('admin.includes.sidebar')

@yield('content')
@include('admin.includes.content')


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->


@include('admin.includes.footer')