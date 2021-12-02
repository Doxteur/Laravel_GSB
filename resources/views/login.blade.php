
@extends('layouts.base')
@section('content')
    

<form action="" id="loginForm" method="POST" class="mx-4 mt-4">
    <label for="Username" class="form-label">Username:</label>
    <input type="text" name="Username" class="form-control">
    <label for="Password" class="form-label">Password:</label>
    <input type="password" name="Password" class="form-control">
    
    <input type="submit" name="envoyer" value="Se Connecter" class="btn btn-primary mt-4">
</form>
@endsection
<style>
    #loginForm {
        display: flex;
        flex-direction: column;
        width: 250px;
    }

</style>
