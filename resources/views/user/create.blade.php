@extends('include.master')

@section('conten')

   <h1>Test</h1>
@include('user.validation.validation')
  

   <form method="POST" action="{{route("createuser")}}">
    @csrf
       <input type="text" name="name" id="name" placeholder="Name">
       <input type="text" name="email" id="email" placeholder="email">
       <input type="password" name="password" id="password" placeholder="password">

       <textarea name="notes" id="notes" placeholder="notes"></textarea>

       <button type="submit">Create User</button>
   </form>
@endsection

{{--  
$table->id();
$table->string('name');
$table->string('email')->unique();
$table->timestamp('email_verified_at')->nullable();
$table->string('password');
$table->rememberToken();
$table->timestamps(); --}}