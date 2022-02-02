<?php
namespace App\Http\Controllers\Articles;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as Controller;

class ArticlesController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function sobre(){
        return view('articles.sobre',['title'=>'CCAR | Sobre']);
    }

    public function servicos(){
        return view('articles.servicos', ['title'=>'CCAR | Serviços']);
    }

    public function galeria(){
        return view('articles.galeria', ['title'=>'CCAR | Galeria']);
    }

}
