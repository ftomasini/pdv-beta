<h3>{{$titulo}}:</h3>
<a href="{{route('clientes.create')}}">Novo cliente</a>


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
