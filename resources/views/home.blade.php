@extends('layouts.app')

@section('content')

@if(session()->has('message'))
<script>

	alert('message');

</script>
<!-- 
    <div class="alert alert-success">

        {{ session()->get('message') }}
    </div> -->
    @endif

    <div class="container">
    	<h1>Mon équipe</h1>
    	@if(count($conseillers) < 1) 

    	<h4> Vous n'avez pas de conseiller</h4>



    	@endif

    	<table id="myTable" class="table-stripped table table-bordered">

    		<thead>

    			<tr>
    				<th>Nom</th>
    				<th>Email</th>
    				<th></th>
    				<th></th>

    			</tr>

    		</thead>
    		<tbody>
    			@foreach ($conseillers as $conseiller) 
    			<tr>
    				<th>
    					<form action="/agendaConseiller/{{$conseiller->id}}"  method="get">
    						{{csrf_field()}}
    						<button class="red ui button ">{{$conseiller->nom}}</button>
    					</form>

    				</th>

    				<th>{{$conseiller->email}}</th>
    				<th>
    					<form action="/editConseiller/{{$conseiller->id}}"  method="get">
    						{{csrf_field()}}
    						<button class="red ui button ">Edit</button>
    					</form>
    				</th>

    				<th><form action="/deleteAdvisor/{{$conseiller->id}}" method="delete">
    					{{csrf_field()}}
    					<button class="btn btn-danger delete">Supprimer<span class="glyphicon glyphicon-remove"></span></button>
    				</form>

    			</th>

    		</tr>


    		@endforeach
    	</tbody>
    </table>



    <a href="backOffice">Ajouter un conseiller</a>
    @endsection

    <script src="//code.jquery.com/jquery.js"></script>

    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    
    <script>
    	$('#myTable').DataTable();
    </script> 