@extends('layouts.principal')

@section('titulo', 'Opções')

@section('conteudo')

<div class="options">        
 <ul>
     <li><a class="warning" href="{{ route('opcoes',1) }}">warning</a></li>
     <li><a class="info" href="{{ route('opcoes',2) }}">info</a></li>
     <li><a class="success" href="{{ route('opcoes',3) }}">success</a></li>
     <li><a class="error" href="{{ route('opcoes',4) }}">error</a></li>

 </ul>
</div>

@if(isset($opcao))

    @switch($opcao)

        @case(1)
        @component('components.alerta', ['titulo'=>'Erro fatal', 'tipo'=>'warning'])
        <p><strong>warning</strong></p>   
        <p>Ocorreu um erro inesperado</p>
        @endcomponent

        @break
        @case(2)
        @component('components.alerta', ['titulo'=>'Erro fatal', 'tipo'=>'info'])
        <p><strong>info</strong></p>   
        <p>Ocorreu um erro inesperado</p>
        @endcomponent
        @break
        @case(3)
        @component('components.alerta', ['titulo'=>'Erro fatal', 'tipo'=>'success'])
        <p><strong>Erro inesperado</strong></p>   
        <p>Ocorreu um erro inesperado</p>
        @endcomponent
        @break
        @case(4)
        @component('components.alerta', ['titulo'=>'Erro fatal', 'tipo'=>'error'])
        <p><strong>Error</strong></p>   
        <p>Ocorreu um erro inesperado</p>
        @endcomponent
        @break
        
    @endswitch

@endif

@endsection