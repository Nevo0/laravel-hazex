@extends('include.master')

@section('conten')

<h1>Przekazywanie parametru {{$datap['name']}}</h1> 
@endsection

 
@section('scriptheader')
    <script>
        console.log("test scriptheader");
    </script>
@endsection 

@section('scriptFooter')
    <script>
        console.log("test scriptFooter");
    </script>
@endsection