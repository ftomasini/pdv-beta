<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{

    private $clientes = [
        ['id'=>1,'nome'=>'Fabiano'],
        ['id'=>2,'nome'=>'Jonas Diel'],
        ['id'=>3,'nome'=>'Jonas Fronchetti'],
        ['id'=>4,'nome'=>'Jamiel Spezia']
    ];


    public function __construct()
    {
        $clientes = session('clientes');

        if(!isset($clientes))
        {
            session(['clientes'=>$this->clientes]);
        }
    }


    /**
     * 
     * Acessar uma determinada rota e mostrar por exemplo uma pagina inicial
     * com uma lista de todos os clientes
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = session('clientes');
        //return view('clientes.index', ['clientes'=>$clientes]);

        // ou

        //return view('clientes.index', compact(['clientes']));

        // ou
        // O comando with é utilizado para passar parametros do controller para a view
        return view('clientes.index')
        ->with('clientes',$clientes)
        ->with('titulo','Todos os clientes');
    }
    

    /**
     * Criar um novo Cliente na base de dados
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("clientes.create");
    }

    /**
     * Quando estiver em um formulário e clicar no salvar os dados 
     * serão recebidos nesse método 
     * 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Todos os dados
        //$dados = $request->all();
        
        $clientes = session('clientes');
        $id = end($clientes)['id'] + 1;
        $nome = $request->nome;
        $dados = ["id"=>$id, "nome"=>$nome];
        $clientes[] = $dados;

        session(['clientes'=>$clientes]);

        //Assim é o correto, porém como não estamos usando banco de dados ainda
        return redirect()->route('clientes.index');
        
        //Debug de informações
        //dd($dados);

        //return view('clientes.index', ['clientes'=>$clientes]);



    }

    /**
     * Para ver dados a mais de um cliente
     * 
     * Display the specified resource.
     *
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);

        $cliente = $clientes[$index];

        return view('clientes.info', compact('cliente'));

    }

    /**
     * 
     * Recebe os dados de um formuláro de edicao para 
     * editar informações de determinado cliente
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);

        $cliente = $clientes[$index];

        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Efetiva a edição na base de dados
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);

        $clientes[$index]['nome'] = $request->nome;


        session(['clientes'=>$clientes]);

        //Assim é o correto, porém como não estamos usando banco de dados ainda
        return redirect()->route('clientes.index');
    }

    /**
     * Apagar determinado cliente da base de dados.
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = session('clientes');
        $index = $this->getIndex($id, $clientes);
        array_splice($clientes, $index,1);

        session(['clientes'=>$clientes]);
        //
        return redirect()->route('clientes.index');
    }


    private function getIndex($id, $clientes)
    {
        $ids = array_column($clientes,'id');
        $index = array_search($id, $ids);
        return $index;
    }
}