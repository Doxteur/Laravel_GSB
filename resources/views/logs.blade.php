@extends('layouts.design')
@section('content')
    <style>
        td {
            white-space: normal !important;
            word-wrap: break-word;
        }

    </style>
    <div class="container-scroller">
        <!-- partial:../partials/_sidebar.html -->
        @include('templates.header')
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
                            <input type="text" class="form-control" placeholder="Chercher un praticien">
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
                            <a class="dropdown-item preview-item" href="{{ route('infovisiteur') }}">
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
        <div class="main-panel ">
            <div class="content-wrapper">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <H1>Mes Connexions</H1>
                    </nav>
                </div>

                {{-- Main Panel --}}
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('getlogsbymonth') }}" method="POST">
                                    @csrf
                                    <select name="month" id="">
                                        <option value="1">Janvier</option>
                                        <option value="2">Février</option>
                                        <option value="3">Mars</option>
                                        <option value="4">Avril</option>
                                        <option value="5">Mai</option>
                                        <option value="6">Juin</option>
                                        <option value="7">Juillet</option>
                                        <option value="8">Aout</option>
                                        <option value="9">Septembre</option>
                                        <option value="10">Octobre</option>
                                        <option value="11">Novembre</option>
                                        <option value="12">Décembre</option>
                                    </select>
                                    <button class="btn btn-success">Chercher</button>
                                </form>
                                <a href="{{ route('allLogs') }}">
                                    <button class="btn btn-warning mt-2 mb-4">Tous mes logs</button>
                                </a>
                                <div class="table-responsive">
                                    {{-- <h2>Date de <span style="text-decoration: underline;">{{$month_name = date('F', mktime(0, 0, 0, $month, 10))??'Mai'}}</span>.</h2> --}}
                                    <table class="table table-bordered text-light ">
                                        <thead>
                                            <tr>
                                                <th>VIS_MATRICULE</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($logs as $log)
                                                <tr>
                                                    <td>{{ $log->VIS_MATRICULE }}</td>
                                                    <td>{{ $log->date }}</td>
                                                    <td style="color:green;">{{ $log->action }}</td>
                                                </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
