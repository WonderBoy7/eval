@extends('base.acceuil')
@php
    $user=Auth::user();
@endphp
@section('contenu')


<button type="button" class="btn btn-dark">Export PDF</button>
 <h6 class="m-0 font-weight-bold text-primary">Tableau listes</h6>

 <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>

                        @if(Auth::check() && $user->isadmin==true)
                        <td><a href=""><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a></td>
                        <td><a href=""><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a></td>
                        @endif
                 </tr>
                </tbody>
            </table>
        </div>
@endsection
