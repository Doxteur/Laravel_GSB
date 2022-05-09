@extends('layouts.design')
@section('content')
    <style>
        input {
            color: white !important;
        }

    </style>
    <div class="container-scroller">
        <!-- partial:../partials/_sidebar.html -->
        @include('templates.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="../index.html"><img src="../assets/images/logo-mini.svg"
                            alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav w-100">
                        <li class="nav-item w-100">
                            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                <input type="text" class="form-control" placeholder="Chercher praticien">
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="../assets/images/faces/face15.jpg" alt="">
                                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                                        {{ session()->get('nom') . ' ' . session()->get('prenom') }}</p>
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                aria-labelledby="profileDropdown">
                                <h6 class="p-3 mb-0">Profile</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-settings text-success"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Mes Informations</p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item" href="{{ route('logout') }}">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>

                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Se Deconnecter</p>
                                    </div>

                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel ">
                <div class="content-wrapper">
                    <div class="page-header">
                        <nav aria-label="breadcrumb">
                            <H1>Mes informations</H1>
                        </nav>
                    </div>
                    <div class="row">
                        <div class=" grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="container-fluid">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Ville</th>
                                                    <th>Spécialité</th>
                                                </tr>

                                                <tbody>
                                                    @foreach ($praticiens as $praticien)
                                                        <tr>
                                                            <td>{{$praticien->PRA_NOM . " " . $praticien->PRA_PRENOM}}</td>
                                                            <td>{{$praticien->PRA_VILLE}}</td>
                                                            <td>{{$praticien->TYP_CODE}}</td>
                                                            
                                                        </tr>
                                                        
                                                    @endforeach
                                                </tbody>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- content-wrapper ends -->
                                <!-- partial:../partials/_footer.html -->

                                <!-- partial -->
                            </div>

                            <!-- main-panel ends -->
                        </div>
                        <!-- page-body-wrapper ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
