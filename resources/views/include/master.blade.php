{{-- @extends('include.master-head')
@extends('include.master-nav')
@extends('include.master-content')
@extends('include.master-fotter') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @yield('scriptheader')
</head>
<body>
  
    @yield('conten')
    {{$datap['name']}}
</body>
@yield('scriptFooter')
</html>




