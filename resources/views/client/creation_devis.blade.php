@extends('client.template')
@section('contenu')
    <h3>Creation de devis</h3>
    <link rel="stylesheet" href="{{ asset('assets/css/label.css') }}">
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nouveau Devis</h4>
                                <form class="form-sample" action="{{ route('devis.create') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="date">Date de construction</label>
                                        <input type="date" name="date_debut" class="form-control" id="date" placeholder="Date">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        @foreach ($typemaison as $type)
                                            <input type="radio" value="{{ $type->id }}" style="display: none;" name="type_maison" id="radio{{ $type->id }}">
                                            <label class="col-3" id="type_maison" for="radio{{ $type->id }}">
                                                <div class="card" id="type{{ $type->id }}" style="width: 20rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><strong>{{ $type->name }}</strong></h5>
                                                        <h1 class="display-6">{{ number_format($type->getTotalMontant(),2, ',', ' ')}} Ar</h1>
                                                        <p class="card-description">
                                                            {{$type->description}}
                                                        </p>
                                                        <p class="btn btn-primary" onclick="select('type{{ $type->id }}')">Selection&eacute;</p>
                                                    </div>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="finitionselect">Finition</label>
                                        <select name="finition" class="form-control" id="finitionselect">
                                            @foreach ($finitions as $finition)
                                                <option value="{{ $finition->id }}">{{ $finition->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-dark text-light" value="Cr&eacute;er">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var labels = document.querySelectorAll("#type_maison");
        var selected = null;
        function select(id) {
            if (selected != null) {
                selected.childNodes[1].classList.remove('lb_selected');
            }
            selected = null;
            labels.forEach(label => {
                if (label.childNodes[1].id == id) {
                    selected = label;
                    selected.childNodes[1].classList.add('lb_selected');
                }
            });
        }
    </script>
@endsection
