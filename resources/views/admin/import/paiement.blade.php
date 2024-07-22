@extends('base.acceuil')

@section('contenu')
<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">CSV File Import</h4>
                            <p class="card-description">
                            </p>
                            <form action="{{ route('import.paiement') }}" class="forms-sample" method="post" enctype="multipart/form-data">
                                @csrf
                                @method("post")
                                <div class="form-group">
                                    <label>Paiement</label>
                                    <input type="file" name="paiements" class="form-control">
                                    @error('paiements')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary me-2">Importer</button>
                            </form>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
