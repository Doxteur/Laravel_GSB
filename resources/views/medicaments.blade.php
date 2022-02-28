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
                        <H1>Medicaments</H1>
                    </nav>
                </div>

                {{-- Main Panel --}}
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('medicamentByID') }}" method="GET">
                                    @csrf
                                    <div class="form-group w-50">
                                        <label for="selectMedId">Choisir Medicament :</label>
                                        <select name="selectMedId" id=""
                                            class="form-control bg-dark text-light mb-2 mt-2 w-25">
                                            @if (isset($medicament))
                                                <option value="{{ $medicament->MED_DEPOTLEGAL }}" disabled selected>
                                                    {{ $medicament->MED_NOMCOMMERCIAL }}</option>
                                                </option>
                                            @endif
                                            @foreach ($medicaments as $medicamentselect)
                                                <option value="{{ $medicamentselect->MED_DEPOTLEGAL }}">
                                                    {{ $medicamentselect->MED_NOMCOMMERCIAL }}</option>
                                            @endforeach
                                        </select>
                                        <button class="btn btn-success">Chercher</button>
                                        <a class="btn btn-warning" href="{{ route('medicaments') }}">Afficher tout</a>

                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-light ">
                                        <thead>
                                            <th>Nom</th>
                                            <th>Effets</th>
                                            <th>Contre-Indiqué</th>
                                        </thead>
                                        <tbody>
                                            @if (isset($medicament))
                                                <tr>
                                                    <td>{{ $medicament->MED_NOMCOMMERCIAL }}</td>
                                                    <td>{{ $medicament->MED_EFFETS }}</td>
                                                    <td>{{ $medicament->MED_CONTREINDIC }}</td>
                                                </tr>
                                            @else
                                                @foreach ($medicaments as $eachMedicament)
                                                    <tr>
                                                        <td>{{ $eachMedicament->MED_NOMCOMMERCIAL }}</td>
                                                        <td>{{ $eachMedicament->MED_EFFETS }}</td>
                                                        <td>{{ $eachMedicament->MED_CONTREINDIC }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
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
