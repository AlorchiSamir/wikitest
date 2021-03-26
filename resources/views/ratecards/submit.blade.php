@extends('layouts.app')

@section('content')
<div class='banner'>
	<div class='container'>
	    <ol class="breadcrumb-nav">
	        <li class='breadcrumb-item'><a href="{{ url('/') }}">Formulaire</a></li>
	        <li class="breadcrumb-item active">Résultats</li>
	    </ol>
	 
	</div>
</div>
<div class="container">	
	<div class="simulation-page">
		<table>
			<tr>
		        <th colspan="2">Informations</th>
		        </tr>      

		        <tr>
		            <td>Fournisseur</td>
		            <td>{{ $ratecard->provider->name }}</td>
		        </tr>
		        <tr>
		            <td>Produit</td>
		            <td>{{ $ratecard->name }}</td>
		        </tr>
		    
		        <tr>
		            <th colspan="2">Sous-total</th>
		        </tr>   
		   

		        <tr>
		            <td>Votre consommation de jour</td>
		            <td>{{ $submit['day_schedule'] }}</td>
		        </tr>
		        <tr>
		            <td>Sous-total jour</td>
		            <td>{{ $results['day'] }}</td>
		        </tr>
		        <tr>
		            <td>Votre consommation de nuit</td>
		            <td>{{ $submit['night_schedule'] }}</td>
		        </tr>
		        <tr>
		            <td>Sous-total nuit</td>
		            <td>{{ $results['night'] }}</td>
		        </tr>
		        <tr>
		            <th colspan="2">Total</th>
		        </tr>
		        <tr>
		            <td>Votre facture annuelle</td>
		            <td>{{ $results['total'] }}</td>
		        </tr>
		   
		</table>
		

		
		<a href="{{ url('/ratecard/'.$ratecard->provider->id) }}" class='btn btn-primary'>Revenir à l'étape précédente</a>
	</div>
</div>
@endsection