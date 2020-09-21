<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    //
    public function produto()
    {
        echo "<h1>Produtos</h1>";
        echo "<ol>";
        echo "<li>Notebook</li>";
        echo "<li>Impressora</li>";
        echo "<li>Mouse</li>";
        echo "</ol>";
    }

    public function getNome()
    {
        return'Fabiano';
    }
    public function getIdade()
    {
        return "30";
    }
    
    public function multiplicar($n1,$n2)
    {
        return $n1 * $n2;
    }
    

}

