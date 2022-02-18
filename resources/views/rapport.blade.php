@extends('layouts.template')
@section('content')
    @include('templates.header')
    <div class="container-fluid mt-4" style="color:#80a2cd; font-weight:bold;font-family:Arial, Helvetica, sans-serif;">
        <form class="FormRendus container-fluid" method="GET" >
            @csrf
            <div class="row">
                <div class="col-md-3 mb-4">
                    <label for="numeroRapport">Numero Rapport:</label>
                    <div class="d-flex ">

                        <select name="numeroRapport" id="numero_rapportSelect" class="form-select w-auto">
                            {{-- If get numeroRapport --}}
                            @if (isset($rapport))
                                <option value="{{ $rapport->RAP_NUM }}" disabled>{{ $rapport->RAP_NUM }}</option>
                            @endif
                            @foreach ($rapports as $item)
                                <option value="{{ $item->RAP_NUM }}">{{ $item->RAP_NUM }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-success mx-4">Chercher</button>
                    </div>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for="input disabledDate" class="form-label">Date :</label>
                    <input disabled type="text" class="form-control w-100" id="input disabledDate"
                        value="{{ date('Y-m-d', strtotime($rapport->RAP_DATE)) }}">
                </div>
                <div class="col-md-auto mx-auto">
                    <label for="echantillions" class="form-label">Offre d'échantillions</label>
                    <select name="echantillions" id="Selectechantillions" class="form-select w-auto">
                        <option value="{{ $rapport->MED_NOMCOMMERCIAL }}">{{ $rapport->MED_NOMCOMMERCIAL }}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="selectPraticien" class="form-label">Praticien :</label>
                    <div class="d-flex">
                        <input disabled type="text" class="form-control me-4 w-auto"
                            value="{{ $rapport->PRA_NOM . ' ' . $rapport->PRA_PRENOM }}">
                        <button class="btn btn-primary" id="detailsPraticien" type="button" value=''
                            onclick="showPraticienModal()">En Details </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <label for="input disabledAddress2" class="form-label">Motif Visite:</label>
                    <textarea disabled type="textarea disabled" class="form-control" id="input disabledAddress2">{{ $rapport->RAP_MOTIF }}</textarea disabled>
                                            </div>
                                            <div class="col-md-auto mx-auto">
                                                <label for="input disabledCity" class="form-label">Bilan : </label>
                                                <textarea disabled rows="3" cols="40" class="form-control text-justify w-auto" id="input disabledCity"></textarea disabled>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-4">
                                                <button type="button" class="btn btn-secondary" onclick="prevRapport()">Précédent</button>
                                                <button type="button" class="btn btn-primary" onclick="nextRapport()">Suivant</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
                                
                                <div id="praticienModal">

                                </div>
@endsection
