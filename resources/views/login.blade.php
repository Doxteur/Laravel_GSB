@extends('layouts.base')
@section('content')
    <section class="vh-100" style="background-color: #191c24;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <img src="images/logo_2.png" alt="">
                            <h3 class="mb-5">Se connecter</h3>
                            <form action="{{ route('checkLogin') }}" id="loginForm" method="POST" class="mx-4 mt-4">
                                @csrf
                                <input type="text" name="Username" class="form-control form-control-lg">
                                <div class="form-outline mb-4"> <label for="Username" class="form-label">Nom:</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="Password" class="form-control form-control-lg">
                                    <label for="Password" class="form-label">Password:</label>
                                </div>

                                <!-- Checkbox -->

                                @if (isset($_GET['error']))
                                    <div class="alert alert-danger mt-4 p-1">
                                        {{ $_GET['error'] }}
                                    </div>
                                @endif
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Se Connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<style>


</style>
