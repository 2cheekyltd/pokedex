<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content= "width=device-width, user-scalable=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('head_meta')

<link rel="shortcut icon" href="{{ asset('images/pokemon.png') }}">
<link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
@yield('head_links')

<script language="javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script language="javascript" src="{{ asset('js/app.js') }}"></script>
@yield('head_scripts')

@include('includes.smartTab')
