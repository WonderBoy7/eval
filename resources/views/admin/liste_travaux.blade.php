@extends('base.acceuil')

@section('contenu')
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste travaux</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">

                                        <thead>
                                            <tr>
                                                <th>code</th>
                                                <th>Designation</th>
                                                <th>Unite</th>
                                                <th>Prix unitaire</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($travaux as $travails)

                                            <tr>
                                                <td>{{$travails->code}}</td>
                                                <td>{{$travails->designation}}</td>
                                                <td class="text-info">{{$travails->unite->nom}}</td>
                                                <td class="text-end">{{ $travails->prix_unitaire }} ar.</td>
                                                <td><button type="button" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#modifModal{{ $travails->id }}"><i class="fas fa-edit"></i></button></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $travaux->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($travaux as $travails)

        <div class="modal fade" id="modifModal{{ $travails->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="forms-sample" action="{{ route('modif.travail') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="idtravail" value="{{ $travails->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="numero">Numero</label>
                            <input type="text" class="form-control" id="numero" name="code" value="{{ $travails->code }}" placeholder="Num">
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation" value="{{ $travails->designation }}" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label for="pu">Prix unitaire</label>
                            <input type="number" class="form-control" id="pu" name="prix_unitaire" value="{{ number_format($travails->prix_unitaire,2, ',', ' ') }}" placeholder="PU">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectGender">Unite</label>
                            <select class="form-control" id="exampleSelectGender" name="idunite">
                                @foreach ($unites as $unite)
                                    <option value="{{ $unite->id }}" @if($unite->id == $travails->unite->id) selected @endif>{{ $unite->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Modifie">
                    </div>
                </form>
            </div>
            </div>
        </div>
    @endforeach
@endsection
