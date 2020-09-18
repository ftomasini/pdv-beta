<?php

use Illuminate\Support\Facades\Route;

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

