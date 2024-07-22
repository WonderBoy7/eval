@extends('base.acceuil')
@php
    $details = $devis->details;
    echo(sizeOf($details));
@endphp
@section('contenu')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Devis du = {{$devis->created_at}}</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>Num</th>
                                                <th>Designation</th>
                                                <th>Unite</th>
                                                <th>Quantite</th>
                                                <th>Prix Unitaire</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($details as $detail)

                                            <tr>
                                                <td>{{$detail->travail->code}}</td>
                                                <td>{{$detail->travail->designation}}</td>
                                                <td class="text-info">{{$detail->unite->nom}}</td>
                                                <td class="text-end">{{ $detail->qte }} ar.</td>
                                                <td class="text-end">{{ number_format($detail->pu,2,',',' ') }} ar.</td>
                                                <td class="text-end">{{ number_format($detail->pu*$detail->qte,2,',',' ') }} ar.</td>
                                            </tr>
                                            @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>Total {{$devis->getTotalFormated()}}</td>
                                                </tr>
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
