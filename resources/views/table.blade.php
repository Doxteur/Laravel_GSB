@extends('layouts.design')
@section('content')
    <style>
        input {
            color: white !important;
        }

    </style>

    @php

    $listOfRapportsName = [];
    // Get list of all rap Num
    foreach ($rapports as $key) {
        array_push($listOfRapportsName, $key->RAP_NUM);
    }
    $nextRapport;
    $previousRapport;

    if (count($listOfRapportsName) == 0) {
        $nextRapport = $rapport->RAP_NUM;
    } else {
        // Check if the last rapport is the last one
        if ($listOfRapportsName[count($listOfRapportsName) - 1] == $rapport->RAP_NUM) {
            $nextRapport = $listOfRapportsName[0];
        } elseif ($listOfRapportsName[0] == $rapport->RAP_NUM) {
            $nextRapport = $listOfRapportsName[count($listOfRapportsName) - 1];
            $previousRapport = $listOfRapportsName[count($listOfRapportsName) - 1];
        } else {
            $nextRapport = $rapport->RAP_NUM;
            $previousRapport = $rapport->RAP_NUM;
            for ($i = 0; $i < count($listOfRapportsName); $i++) {
                if ($listOfRapportsName[$i] == $rapport->RAP_NUM) {
                    $nextRapport = $listOfRapportsName[$i + 1];
                }
            }
            for ($i = 0; $i < count($listOfRapportsName); $i++) {
                if ($listOfRapportsName[$i] == $rapport->RAP_NUM) {
                    $previousRapport = $listOfRapportsName[$i - 1];
                }
            }
        }
    }

    @endphp

    <body>
        <div class="container-scroller">
            <!-- partial:../partials/_sidebar.html -->
            @include('templates.header')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:../partials/_navbar.html -->
                <nav class="navbar p-0 fixed-top d-flex flex-row">
                    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="../index.html"><img
                                src="../assets/images/logo-mini.svg" alt="logo" /></a>
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
                <!-- partial -->
                <div class="main-panel ">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <nav aria-label="breadcrumb">
                                <H1>Mes Rapports</H1>
                            </nav>
                        </div>
                        <div class="row">
                            <div class=" grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid mt-4"
                                            style="color:#80a2cd; font-weight:bold;font-family:Arial, Helvetica, sans-serif;">
                                            <form class="FormRendus container-fluid" method="POST"
                                                action="{{ route('changeRap') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-3 mb-4">
                                                        <label for="numeroRapport">Numero Rapport:</label>
                                                        <div class="d-flex ">

                                                            <select name="numeroRapport" id="numero_rapportSelect"
                                                                class="form-select w-auto">
                                                                {{-- If get numeroRapport --}}
                                                                @if (isset($rapport))
                                                                    <option value="{{ $rapport->RAP_NUM }}"
                                                                        selected="true" disabled>{{ $rapport->RAP_NUM }}
                                                                    </option>
                                                                @endif
                                                                @foreach ($rapports as $item)
                                                                    <option value="{{ $item->RAP_NUM }}">
                                                                        {{ $item->RAP_NUM }}</option>
                                                                @endforeach
                                                            </select>
                                                            <button class="btn btn-success mx-4">Chercher</button>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label for="input disabledDate" class="form-label">Date
                                                            :</label>
                                                        <input disabled type="text" class="form-control bg-dark w-100"
                                                            id="input disabledDate"
                                                            value="{{ date('Y-m-d', strtotime($rapport->RAP_DATE)) }}">
                                                    </div>
                                                    <div class="col-md-auto mx-auto">
                                                        <label for="echantillions" class="form-label">Offre
                                                            d'échantillions</label>
                                                        <select name="echantillions" id="Selectechantillions "
                                                            class="form-select w-auto bg-dark text-light">
                                                            @if (count($offrir) != 0)
                                                                @foreach ($offrir as $item)
                                                                    <option class="text-light"
                                                                        value="{{ $item->MED_NOMCOMMERCIAL }}">
                                                                        {{ $item->MED_NOMCOMMERCIAL }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="">Vide</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
<<<<<<< HEAD
=======

>>>>>>> d743e10a8d051aef745f67749355127689f23713

                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="selectPraticien" class="form-label">Praticien
                                                            :</label>
                                                        <div class="d-flex">
                                                            <input disabled type="text"
                                                                class="form-control bg-dark me-4 w-auto"
                                                                value="{{ $praticien->PRA_NOM . ' ' . $praticien->PRA_PRENOM }}">
<<<<<<< HEAD
                                                            <button class="btn btn-primary" id="detailsPraticien"
                                                                type="button" value='' data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">En
=======
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal" class="btn btn-primary"
                                                                id="detailsPraticien" type="button" value=''
                                                                onclick="showPraticienModal()">En
>>>>>>> d743e10a8d051aef745f67749355127689f23713
                                                                Details </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-auto">
                                                        <label for="input disabledAddress2" class="form-label">Motif
                                                            Visite:</label>
                                                        <textarea disabled type="textarea disabled"
                                                            class="form-control bg-dark" id="input disabledAddress2">{{ $rapport->RAP_MOTIF }}</textarea disabled>
<<<<<<< HEAD
                                                                                                                                    </div>
                                                                                                                                    <div class="col-md-auto mx-auto">
                                                                                                                                        <label for="input disabledCity" class="form-label">Bilan : </label>
                                                                                                                                        <textarea disabled rows="3" cols="40" class=" bg-dark form-control text-justify w-auto" id="input disabledCity">{{ $rapport->RAP_BILAN }}</textarea disabled>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-12 mt-4">
                                                                                                                                        <a href="{{ route('rapportByID', ['id' => $nextRapport]) }}"><button type="button" class="btn btn-secondary" onclick="prevRapport()">Précédent</button></a>
                                                                                                                                        <a href="{{ route('rapportByID', ['id' => $nextRapport]) }}"><button type="button" class="btn btn-primary" >Suivant</button></a>
                                                                                                                                    </div>
                                                                                                                                    @if (session()->get('role') == 'Responsable')
    <div class="col-12 mt-4">
                                                                                                                                        <hr>
                                                                                                                                        <h1>Gestion Rapport :</h1>
                                                                                                                                        <button type="button" class="btn btn-success" onclick="prevRapport()">Ajouter</button>
                                                                                                                                        <button type="button" class="btn btn-warning" onclick="nextRapport()">Modifier</button>
                                                                                                                                    </div>
    @endif
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            
                                                                                                                            
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    
                                                                                                                </div>
                                                                                                                
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <footer class="footer">
                                                                                                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                                                                                                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Doussain Jimmy</span>
                                                                                                                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Mon <a href="http://www.jimmydoussain.fr" target="_blank"> site web</a></span>
                                                                                                            </div>
                                                                                                        </footer>
                                                                                                    </form>
=======
                                                                                                                                            </div>
                                                                                                                                            <div class="col-md-auto mx-auto">
                                                                                                                                                <label for="input disabledCity" class="form-label">Bilan : </label>
                                                                                                                                                <textarea disabled rows="3" cols="40" class=" bg-dark form-control text-justify w-auto" id="input disabledCity">{{ $rapport->RAP_BILAN }}</textarea disabled>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                        <div class="row">
                                                                                                                                            <div class="col-12 mt-4">
                                                                                                                                                <a href="{{ route('rapportByID', ['id' => $nextRapport]) }}"><button type="button" class="btn btn-secondary" onclick="prevRapport()">Précédent</button></a>
                                                                                                                                                <a href="{{ route('rapportByID', ['id' => $nextRapport]) }}"><button type="button" class="btn btn-primary" >Suivant</button></a>
                                                                                                                                            </div>
                                                                                                                                            @if (session()->get('role') == 'Responsable')
    <div class="col-12 mt-4">
                                                                                                                                                <hr>
                                                                                                                                                <h1>Gestion Rapport :</h1>
                                                                                                                                                <button type="button" class="btn btn-success" onclick="prevRapport()">Ajouter</button>
                                                                                                                                                <button type="button" class="btn btn-warning" onclick="nextRapport()">Modifier</button>
                                                                                                                                            </div>
    @endif
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    
                                                                                                                                    
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            
                                                                                                                        </div>
                                                                                                                        
                                                                                                                    </div>
                                                                                                                    
                                                                                                                </div>
                                                                                                                <footer class="footer">
                                                                                                                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                                                                                                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Doussain Jimmy</span>
                                                                                                                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Mon <a href="http://www.jimmydoussain.fr" target="_blank"> site web</a></span>
                                                                                                                    </div>
                                                                                                                </footer>
                                                                                                            </form>
                                                                                                        </div>
                                                                                                    </div>
>>>>>>> d743e10a8d051aef745f67749355127689f23713
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
<<<<<<< HEAD
                                                                        </div>
                                                                    </div>
                                                                    <!-- content-wrapper ends -->
                                                                    <!-- partial:../partials/_footer.html -->
                                                                    
                                                                    <!-- partial -->
=======
                                                                            <!-- content-wrapper ends -->
                                                                            <!-- partial:../partials/_footer.html -->
                                                                            
                                                                            <!-- partial -->
                                                                        </div>
                                                                        
                                                                        <!-- main-panel ends -->
                                                                    </div>
                                                                    <!-- page-body-wrapper ends -->
>>>>>>> d743e10a8d051aef745f67749355127689f23713
                                                                </div>
                                                                
                                                                <!-- main-panel ends -->
                                                            </div>
                                                            <!-- page-body-wrapper ends -->
                                                        </div>
                                                </div>
<<<<<<< HEAD
                                        </div>
                                       
                                                        <style>
                                                            input{
                                                                margin-bottom: 15px;
                                                                
                                                            }
                                                        </style>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="row">
                                        <h1>Praticien</h1>

                                        <div class="form-group ">
                                            <label for="">Nom Praticien:</label>
                                            <input type="text" class="form-control bg-dark" disabled value="{{ $praticien->PRA_NOM . ' ' . $praticien->PRA_PRENOM }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="">Adresse :</label>
                                            <input type="text" class="form-control bg-dark" disabled value="{{ $praticien->PRA_ADRESSE }}">
                                        </div>
                                    
                                        <div class="form-group col-6">
                                            <label for="">Ville:</label>
                                            <input type="text" class="form-control bg-dark" disabled value="{{ $praticien->PRA_VILLE . ' ' . $praticien->PRA_CP }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                        <label for="">Specialite</label>
                                        <input type="text" class="form-control bg-dark" disabled value="{{ $PraType->TYP_LIBELLE }}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="">Lieux</label>
                                            <input type="text" class="form-control bg-dark" disabled value="{{ $PraType->TYP_LIEU }}">
                                            </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
=======



                                                {{-- Modal Praticien --}}
                                                <!-- Button trigger modal -->

                                  <!-- Modal -->

                                  
                                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md">
                                                <label for="">Numero :</label>
                                                <input type="text" class="bg-dark form-control" value="{{ $praticien->PRA_NUM }}" disabled>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Nom :</label>
                                                <input type="text" class="bg-dark form-control" value="{{ $praticien->PRA_NOM }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Prenom :</label>
                                                <input type="text" class="bg-dark form-control" value="{{ $praticien->PRA_PRENOM }}" disabled>
                                            </div>
                                        </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <label for="">Ville :</label>
                                                <input type="text" class="bg-dark form-control" value="{{ $praticien->PRA_VILLE }}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">CP :</label>
                                                <input type="text" class="bg-dark form-control" value="{{ $praticien->PRA_CP }}" disabled>
                                            </div>
                                         </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <label for="">COef :</label>
                                                <input type="text" class="bg-dark form-control" value="{{ $praticien->PRA_COEFNOTORIETE }}" disabled>
                                            </div>   
                                            <div class="col-md-6">
                                                <label for="">CODE :</label>
                                                <input type="text" class="bg-dark form-control" value="{{ $praticien->TYP_CODE }}" disabled>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                                
                                                                <style>
                                                                    input{
                                                                        margin-bottom: 15px;
                                                                        
                                                                    }
                                                                </style>
                                                               
>>>>>>> d743e10a8d051aef745f67749355127689f23713
@endsection
