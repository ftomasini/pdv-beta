<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Rota normal 
Route::get('/teste', function() { 
    echo "Ola!";
});

// Rota com variável parametro
Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
    echo "Olá! seja bem vindo. " . $nome . " " . $sobrenome;
});


// Rota com variável parametro condicional, nesse caso com ?
Route::get('/seunome/{nome}/{sobrenome?}', function($nome, $sobrenome=null ){
    if(!isset($sobrenome)){
        return "digite um sobrenome também";
    }
    else{
        echo "Olá! seja bem vindo. " . $nome . " " . $sobrenome;
    }
});

//Rota com regras
Route::get('/rotacomregra/{nome}/{n?}', function($nome, $n=null ){
    
    for($i=0;$i<=$n;$i++){
        echo "Olá! seja bem vindo. " . $nome . " " . $n. '<br>';}
    }
)->where('nome','[A-Za-z]+')->where('n','[0-9]+');

//Rotas com agrupamento e nomes
Route::prefix('/app')->group(function() {

    Route::get('/',function() {
        return view('app');
    })->name('app');

    Route::get('/user',function() {
        return view('user');
    })->name('app-user');

    Route::get('/profile',function() {
        return view('profile');
    })->name('app-profile');

});

Route::get('/produtos', function (){
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
});

//Redirecionamento de rotas.
Route::redirect('todosprodutos', 'produtos', 301);

Route::get('todososprodutos2', function(){
    return redirect()->route('meusprodutos');
});

//Teste com outros métodos além de get
//foi colocado no arquivo abaixo exeção para não fazer verificação Csrf
//home/ftomasini/projetos/teste/app/Http/Middleware/VerifyCsrfToken.php
//na variavel $request são os dados que estao chegando via webservice nessa rota 

Route::post('requisicoes', function(Request $request){
    return 'Hello POST';
});
Route::delete('requisicoes', function(Request $request){
    return 'Hello DELETE';
});
Route::put('requisicoes', function(Request $request){
    return 'Hello PUT';
});
Route::patch('requisicoes', function(Request $request){
    return 'Hello PATCH';
});
Route::options('requisicoes', function(Request $request){
    return 'Hello OPTIONS';
});
Route::patch('requisicoes', function(Request $request){
    return 'Hello PATCH';
});

//Rota com controlador
Route::get('produto', 'MeuControlador@produto');
Route::get('nome', 'MeuControlador@getNome');
Route::get('idade', 'MeuControlador@getIdade');
//Controlador com parâmetro
Route::get('multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');


//Link a rota diretamente com o controlador
Route::resource('clientes', 'ClienteControlador');