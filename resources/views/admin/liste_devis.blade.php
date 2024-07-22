@extends('base.acceuil')

@section('contenu')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste devis</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>R&eacute;ference</th>
                                                <th>Type de maison</th>
                                                <th>Finition</th>
                                                <th>Payé</th>
                                                <th>montant total</th>
                                                <th>Debut de construction</th>
                                                <th>Fin de construction </th>
                                                <th>Paiement Effectue</th>
                                                <th>% Paiement</th>
                                                <th>lien Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($devis as $devi)

                                            <tr style="background-color: {{$devi->AleaCss()}}">
                                                <td>{{$devi->ref_devis}}</td>
                                                <td>{{$devi->type_maison->name}}</td>
                                                <td class="text-info">{{$devi->type_finition->name}}</td>
                                                <td class="text-end">{{ $devi->getTotalPayeFormated() }} ar.</td>
                                                <td class="text-end">{{ $devi->getDenormalizeTotal() }} ar.</td>
                                                <td>20/05/2024</td>
                                                <td>10/05/2024</td>
                                                <td>{{$devi->getEtatPaiement()}}</td>
                                                <td>{{ $devi->getPayPourcent() }}%</td>
                                                <td> <a href="{{route('devis.details',['devis'=>$devi->id])}}">voir details</a></td>
                                                {{-- <td><button class="btn btn-inverse-success"><i class="mdi mdi-file-pdf"></i></button></td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$devis->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
