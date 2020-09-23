<h3>{{$titulo}}:</h3>
<a href="{{route('clientes.create')}}">Novo cliente</a>

@if(count($clientes)>0)

    <ul>
        @foreach ($clientes as $c)
            <li>{{$c['id']}} | {{$c['nome']}}
                <a href="{{route('clientes.edit', $c['id'] )}}">Editar</a>
                <a href="{{route('clientes.show', $c['id'] )}}">info</a>
                <form action="{{route('clientes.destroy', $c['id'])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Apagar">
                </form>
            </li>
        @endforeach
    </ul>


@else
<h4>Não existe clientes cadastrados</h4>
@endif

@empty($clientes)
    <h4>Nao existe clientes</h4>
@endempty