@extends('base.acceuil')
@section('contenu')
    {{-- <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-3">
                        {{-- <div class="col-lg-4 d-flex grid-margin strech-card"> --}}
                            {{-- <div class="card-body">
                                <h4 class="card-title mb-2 ">Montant total de Tous les devis</h4>
                                <h2 class="text-dark mb-2 font-weight-bold">{{ $total }} Ar</h2>
                                <small class="text-muted"></small>
                            </div> --}}
                        {{-- </div> --}}
                    {{-- </div>
                    <div class="col-3">
                        {{-- <div class="col-lg-4 d-flex grid-margin strech-card"> --}}
                            {{-- <div class="card-body">
                                <h4 class="card-title mb-2 ">Montant total de Tous les Paiements</h4>
                                <h2 class="text-dark mb-2 font-weight-bold">{{ $total }} Ar</h2>
                                <small class="text-muted"></small>
                            </div> --}}
                        {{-- </div> --}}
                    {{-- </div>
                </div>
            </div>
        </div> --}}

    {{-- </div> --}}
    <h1>Montant</h1>
    <div class="row">
        <div class="col-xl-3 col-md-3 mb-3 col-lg-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Devis total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $montantTotal}} Ar</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-3 col-lg-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Paiement total </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalPaiement,2,',',' ')}} Ar</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (sizeof($annee) > 0)

    <h1>Histogramme</h1>
    <div class="card-body">
        <form action="{{route('admin.dashboard')}}">
            <div class="form-group">
                <label for="input-select">Selectionnez une ann&eacute;e</label>
                <select class="form-control" id="input-select" name="annee" >
                    @foreach ($annee as $an )
                    <option value="{{$an->annee}}">{{$an->annee}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Confirmer</button>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Devis par Mois</h5>
                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                    <script>
                            var mois = {!! $mois !!};
                            var montant = {!! $montantMois !!}
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar', //
                                    data: {
                                        labels: mois,
                                        datasets: [{
                                            label: 'Devis/Mois',
                                            data: montant,
                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            borderColor: 'rgb(201, 203, 207)',
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                    scales: {
                                        y:{
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                });
                            });
                        </script>
                <!-- End Bar CHart -->
                <script src="{{asset('assets/js/bootstrap.bundle.js')}}" ></script>
                <script src="{{asset('assets/js/script.js')}}" ></script>
                <script src="{{asset('assets/vendor/chart.js/Chart.js')}}" ></script>
                <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
                <script src="{{asset('')}}" ></script>



            </div>
            </div>
        </div>
        @endif

@endsection
