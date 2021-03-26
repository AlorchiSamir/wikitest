@extends('layouts.app')

@section('content')
<div class='banner'>
	<div class='container'>
	    <ol class="breadcrumb-nav">
	        <li class="breadcrumb-item active">Formulaire</li>
	    </ol>
	 
	</div>
</div>
<div class="container">	
	<div class="providers-page">
        <fieldset>
        <legend>1. Choisissez un fournisseur</legend>
		@foreach($providers as $provider)
			<div>   
		    	<button class='provider' data-id='{{ $provider->id }}'>
					{{ $provider->name }}
				</button>
			</div>
		@endforeach
        </fieldset>
	</div>
</div>

<script>
    $(function(){

    	

        $('.provider').click(function (){
            var id = $(this).data('id');
           

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: "{{ url('/ratecard/ajax/list') }}",
                data: {
                    'provider': id
                },
                success: function(data){
                    $('.providers-page').html(data);
                },
                error:function(jqXHR, textStatus){
                  console.log(jqXHR);            
                }
            });
            
        });  
          });       
        
</script>
@endsection