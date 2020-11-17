@extends('include.master')

@section('conten')

<h1>CM</h1> 
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if($datap["ConferencesInactive"])
<div class="container">
  <div class="row">
@foreach ($datap["ConferencesInactive"] as $inActive)

<div class="col-3">
<div class="card  bg-green" >
  <div class="card-body ">
    <h5 class="card-title">{{ $inActive["name"] }}</h5>
    <h6 class="card-subtitle mb-2 text-muted"> {{  $inActive["starts_at"]}}</h6>  
    <!-- Button trigger modal -->
<!-- <button type="button" >
  Zobacz uczestników
</button>
<button type="button" class="btn btn-primary" >
  Wyslij do salesmenago
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="uczestnicy" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uczestnicy">Uczestnicy</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    <a href="{{ route('cn_id',  $inActive['id_cm'] ) }}" class="card-link" data-toggle="" data-target="#">Zobacz uczestników</a>
    <a href="#" class="card-link"> Wyslij do salesmenago</a>
    <!-- <p>{{ $inActive["id_cm"] }}</p> -->
    </div>
    </div>
    </div>
    
@endforeach 
</div>
</div>
@endif
 
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