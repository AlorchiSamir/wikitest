<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{url('graphics/icon.jpg')}}" />

    <!-- Scripts -->
    <script src="{{ asset('js/dionysos.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <!-- Styles -->
    <link href="{{ asset('css/wikipower.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
</head>
<body>
  
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm top-bar">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class='logo' src="{{url('graphics/logo.jpg')}}">
                    {{ config('app.name', 'Laravel') }}
                </a>
               
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>

        <main> 
            @yield('content')           
        </main>
        <footer id='footer-page'>
           
        </footer>
      
        
    </div>
    <script>
  
    $(function(){
  
        $('#button-modal').click(function() {
            $('#message-modal-admin').modal();
        });
  
       $(document).on('submit', '#message-admin-form', function(e) {  
            e.preventDefault();
              
            $('input+small').text('');
            $('input').parent().removeClass('has-error');
              
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                //dataType: "json"
            })
            .done(function(data) {
                console.log(data);
                $('.alert-success').removeClass('hidden');
                $('#message-modal').modal('hide');
            })
            .fail(function(data) {
                console.log(data);
                $.each(data.responseJSON, function (key, value) {
                    var input = '#message-form input[name=' + key + ']';
                    $(input + '+small').text(value);
                    $(input).parent().addClass('has-error');
                });
            });
        });
  
    })
  
    </script>
 
</body>
</html>
