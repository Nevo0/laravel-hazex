@extends('include.master')

@section('conten')

<h1>CM</h1> 
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
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