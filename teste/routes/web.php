<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeuControlador;

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

/**Rotas utilizando controller  - esse
 * de implementar é do laravel 8
*/
Route::get('/informatica', [MeuControlador::class, 'produtos']);
Route::get('/conta/{n1}/{n2}', [MeuControlador::class, 'multiplicar']);

Route::get('/teste', function()
{
    echo "Hello World";
});

Route::get('/mensagem/{nome}', function($nome)
{
    echo "Hello ".$nome;
});

/**o ponto de interrogação serve para indicar que é opcional
 * passar o parametro
 */
Route::get('/opcional/{nome?}', function($nome=null)
{
    echo "Hello ".$nome;
});

/**Com o comando where posso colocar regras nos parametros que
 * passo na rota
 */
Route::get('/regras/{nome}/{n}', function($nome, $n) 
{
    for($i=0;$i<$n;$i++)
        echo $i ." ". $nome. "<br>";

})->where('nome','[A-Za-z]+')
  ->where('n','[0-9]+');

  /**
   * Método para agrupar as rotas
   */
// Route::prefix('/app')->group(function()
// {
//     Route::get('/', function()
//     {
//         echo "Meu app";
//     });

//     Route::get('/user/', function()
//     {
//         echo "User";
//     });

//     Route::get('/profile/', function()
//     {
//         echo "Profile";
//     });
// });


  /**
   * Método para nomear as rotas
   */
  Route::prefix('/aplicacao')->group(function()
  {
      Route::get('/', function()
      {
            return view('app');

      })->name('app');
  
      Route::get('/usuario/', function()
      {
            return view('user');

      })->name('app.user');;
  
      Route::get('/profile/', function()
      {
            return view('profile');

      })->name('app.profile');;
  });


/**
 * Abaixo será colocado maneiras para redirecionar as rotas
 */
Route::get('/produtos', function()
{
    echo "produtos";
})->name('meusprodutos');

/**
 * Formas para redirecionar rotas
 */
Route::redirect('todosprodutos', 'meusprodutos',301);

Route::get('todosprodutos2',function()
{
    return redirect()->route('meusprodutos');
});

/**tipo de requisições HTTP */
Route::post('/requisicoes', function(Request $request)
{
    return $request;
});

Route::get('/requisicoes', function(Request $request)
{
    return $request;
});


Route::delete('/requisicoes', function(Request $request)
{
    return $request;
});


Route::put('/requisicoes', function(Request $request)
{
    return $request;
});

Route::options('/requisicoes', function(Request $request)
{
    return $request;
});

Route::patch('/requisicoes', function(Request $request)
{
    return $request;
});




