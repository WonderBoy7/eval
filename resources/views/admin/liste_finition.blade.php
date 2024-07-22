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
                                                <th>Nom</th>
                                                <th>Pourcentage</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($finition as $finitions)

                                            <tr>
                                                <td>{{$finitions->name}}</td>
                                                <td>{{$finitions->pourcentage}}</td>
                                                <td><button type="button" class="btn btn-warning text-light" data-bs-toggle="modal" data-bs-target="#modifModal{{ $finitions->id }}"><i class="fas fa-edit"></i></button></td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{ $finition->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($finition as $finitions)

        <div class="modal fade" id="modifModal{{ $finitions->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="forms-sample" action="{{ route('modif.finition') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="idfinition" value="{{ $finitions->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" name="name" value="{{ $finitions->name }}" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label for="pu">Pourcentage</label>
                            <input type="number" class="form-control" id="pu" name="pourcentage" value="{{ $finitions->pourcentage }}" placeholder="PU">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Modifier">
                    </div>
                </form>
            </div>
            </div>
        </div>
    @endforeach
@endsection
