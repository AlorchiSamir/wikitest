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
        @include('ratecards.form')
    </div>
</div>
@endsection