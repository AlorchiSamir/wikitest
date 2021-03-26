

<form method="POST" action="{{ url('ratecard/submit') }}" class='form-horizontal' id='ratecard-form'>
    @csrf
    <fieldset>
    	<legend>2. Choisissez votre produit</legend>
    @foreach($ratecards as $ratecard)
		<div>  	    	
			<input type="radio" id="{{ $ratecard->id }}" name="ratecard" value="{{ $ratecard->id }}" required <?php echo ($values['ratecard'] == $ratecard->id) ? 'checked' : ''  ?>>
  			<label for="{{ $ratecard->id }}">{{ $ratecard->name }}</label>
		</div>
	@endforeach
    </fieldset>

    <fieldset>
    	<legend>3. Rentrez votre consommation bi-horaire</legend>
	    <div class="form-group row">
            <label for="day_schedule" class="col-md-1 col-form-label text-md-right">Jour</label>

            <div class="col-md-12">
                <input id="day_schedule" type="text" pattern="^\d*(\.\d{0,4})?$" class="form-control" name="day_schedule" 
                value='{{ $values["day_schedule"] }}' placeholder="0.0000" required>               
            </div>
            <label for="day_schedule" class="col-md-1 col-form-label text-md-right">Nuit</label>
            <div class="col-md-12">
                <input id="night_schedule" type="text" pattern="^\d*(\.\d{0,4})?$" class="form-control" name="night_schedule" 
                value='{{ $values["night_schedule"] }}' placeholder="0.0000" required>               
            </div>
        </div>
	</fieldset>  
    
    <div class='form-group'>
        <input class='btn btn-success' type='submit' value='Envoyer'>
    </div>
    
</form>
<a href="{{ url('/') }}" class='btn btn-primary'>Revenir à l'étape précédente</a>