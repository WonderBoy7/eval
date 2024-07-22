<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<style>
    *, *::before, *::after{
        box-sizing: border-box;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    table{
        width: 100%;
        border-collapse: collapse;
    }

    th, td{
        padding: 10px;
        text-align: left;
        border: solid 1px #ccc;
    }

    th{
        background: #f5f3f3;
        color: #1a1919;
    }

    tr:nth-child(odd) {
        background-color: #eee;
    }

    @media only screen and (max-width : 700px){
        .resp-table table,
        .resp-table thead,
        .resp-table tbody,
        .resp-table tr,
        .resp-table th,
        .resp-table td{
            display: block;
        }

        .resp-table thead{
            display: none;
        }

        .resp-table td{
            padding-left: 150px;
            position: relative;
            max-width: -1px;
            background-color: #FFF;
        }

        .resp-table td:nth-child(odd) {
            background-color: #eee;
        }

        .resp-table td::before{
            content: attr(data-label);
            position: absolute;
            top: 0;
            left: 0;
            width: 130px;
            bottom: 0;
            background: #000;
            color: #FFF;
            display: flex;
            align-items: center;
            padding: 10px;
            font-weight: bold;
        }
        .resp-table tr{
            margin-bottom: 1rem;
        }
    }
</style>
<body>
@php
    $details = $devis->details;
    $paiements = $devis->paiements;
@endphp
    <h4 class="card-title">Devis du : {{ $devis->created_at }}</h4>
    <table class="resp-table">
        <thead>
            <tr>
                <th>Numero</th>
                <th>Designation</th>
                <th>Unite</th>
                <th>Quantite</th>
                <th>Prix Unitaire (Ar)</th>
                <th>Total</th>
           </tr>
        </thead>
        <tbody>
            @foreach ($details as $detail)
                <tr>
                    <td>{{ $detail->travail->code }}</td>
                    <td>{{ $detail->travail->designation }}</td>
                    <td>{{ $detail->travail->unite->nom }}</td>
                    <td>{{ $detail->qte }}</td>
                    <td>{{ number_format($detail->pu, 2, ',', ' ') }}</td>
                    <td>{{ number_format($detail->pu * $detail->qte, 2, ',',' ') }}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $devis->getTotalFormated() }}</td>
            </tr>

        </tbody>
    </table>


    <table class="resp-table">
        <thead>
            <tr>

                <th>Ref_paiement</th>
                <th>montant</th>
                <th>Date paiement</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($paiements as $paiement)
                <tr>
                    <td>{{ $paiement->ref_paiement }}</td>
                    <td>{{ number_format($paiement->montant, 2, ',', ' ') }}</td>
                    <td>{{ $paiement->date_paiement}}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{ $devis->getTotalPayeFormated() }}</td>
            </tr>

        </tbody>
    </table>
    <div class="container">
        <p>Total avec finition {{ $devis->type_finition->name }}(+{{ $devis->type_finition->pourcentage }}%) :{{ $devis->getDenormalizeTotal() }}</p>
    </div>
</body>
</html>
