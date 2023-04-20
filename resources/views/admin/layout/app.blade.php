<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    <title>Admin Panel</title>


    @include('admin.layout.styles')
    @include('admin.layout.scripts')
</head>

<body>
<div id="app">
    <div class="main-wrapper">

        <div class="navbar-bg"></div>
        @include('admin.layout.nav')



        @include('admin.layout.sidebar')

        <div class="main-content">
            <section class="section">
                <div class="section-header justify-content-between">
                    <h1>@yield('heading')</h1>
                    @yield('button')
                </div>
                @yield('main_content')
            </section>
        </div>

    </div>
</div>

@include('admin.layout.scripts_footer')

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title:'',
                position:'bottomRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            message: '{{session()->get('error')}}',
            position: 'bottomRight'
        });
    </script>
@endif
@if(session()->get('success'))
    <script>
        iziToast.success({
            title: 'success',
            message: '{{session()->get('success')}}',
            position: 'bottomRight'
        });
    </script>
@endif

</body>
</html>