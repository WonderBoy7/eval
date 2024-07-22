@extends('base.acceuil')
@section('contenu')
<div class="mb-3">
    {{-- <label for="formFileSm" class="form-label">Small file input example</label>
    <input class="form-control form-control-sm" id="formFileSm" type="file"> --}}
    <label for="formFileMultiple" class="form-label">Import the csv files</label>
  <input class="form-control" type="file" id="formFileMultiple" multiple>
</div>
@endsection
