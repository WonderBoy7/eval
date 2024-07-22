@extends('client.template')
@section('contenu')
<div class="container">
    <h2>Paiements</h2>
     <form id="form-ws-validation">
        @csrf
        <div class="form-group">
            <label for="nom">Montant:</label>
            <input type="number" class="form-control" name="montant" id="number" placeholder="Entrez le montant en ariary ">
        </div>
        <div class="form-group">
            <input type="hidden" name="id_devis" value="{{ $devis->id }}">
            <label for="date">date</label>
            <input type="date" name="date_paiement" class="form-control" id="date" placeholder="Date">
        </div>

        <input type="submit" class="btn btn-primary" value="Payer">
    </form>
    <div class="" id="success-messages"></div>
    <div class="" id="error-messages"></div>

</div>
<script src="{{asset('assets/vendor/jquery-3.5.1/jquery.min.js')}}"></script>
<script>
     $(document).ready(function () {
        $('#form-ws-validation').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/client/payer',
                data: $(this).serialize(),
                success: function (response) {
                    console.log('',response);
                    if (response.errors != null) {
                        $('#error-messages').empty().show();
                        $('#error-messages').append('<p class="alert alert-danger">' + response.errors + '</p>');
                    } else {
                        $('#success-messages').empty().show();
                        $('#success-messages').append('<p class="alert alert-success">' + response.success + '</p>');
                    }
                },
                error: function (response) {
                    alert(response);
                    console.log(response);
                    $('#error-messages').empty().show();
                    $.each(response.responseJSON.errors, function (key, value) {
                        $('#error-messages').append('<p class="alert alert-danger">' + value + '</p>');
                    });
                }
            });
        });
    });
</script>
@endsection
