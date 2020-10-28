<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    //
    public function produtos()
    {
        echo "<h1>Produtos de informática</h1>";
        echo "<ol>";
        echo "<li>Mouse</li>";
        echo "</ol>";
    }

    public function multiplicar($n1, $n2)
    {
        return $n1 * $n2;
    }
}
