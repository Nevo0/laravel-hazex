@extends('include.master')

@section('conten')

@endsection

@section('scriptheader')
    <script>
        var data = {!! json_encode($datap, JSON_HEX_TAG) !!};
        console.log(data);
    </script>
@endsection

@section('scriptFooter')
    <script>
        console.log("test scriptFooter");

    </script>
@endsection
