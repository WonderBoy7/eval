@extends('client.template')

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
                                                <th>Paye</th>
                                                <th>Total a paye</th>
                                                <th>Debut de construction</th>
                                                <th>Fin Construction</th>
                                                <th>Détails</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($devis as $devi )

                                            <tr>
                                                <td>{{$devi->ref_devis}}</td>
                                                <td>{{$devi->type_maison->name}}</td>
                                                <td class="text-info">{{$devi->type_finition->name}}</td>
                                                <td class="text-end">{{ $devi->getTotalPayeFormated() }} ar.</td>
                                                <td class="text-end">{{ number_format($devi->getTotalMontant(),2,',',' ') }} ar.</td>
                                                <td>{{ $devi->date_debut}}</td>
                                                <td>{{ $devi->date_fin}}</td>
                                                {{-- <td><a href="">Exporter</a></td> --}}
                                                <td><a href="{{ route('pdf.devis', ['devis' => $devi->id]) }}" class="btn btn-inverse-warning">Exporter<i class="mdi mdi-file-pdf"></i></a></td>
                                                <td><a href="{{route('client.paiement',['devis' =>$devi->id])}}">Payer</a></td>
                                            </tr>
                                            @endforeach

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
