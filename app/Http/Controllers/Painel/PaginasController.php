<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;
use DB;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use RW940cms\Criteria\WherePaginasCriteria;
use RW940cms\Criteria\WhereServicosCriteria;
use RW940cms\Models\Curso;

use Input;
use URL;
use Illuminate\Support\Str;
use Carbon\Carbon;
class PaginasController extends Controller
{
  
   
    public function indexDashboard(Request $request)
    {
        return view('auth.login');
    }
    
   
    public function paginas(Request $request)
    {
        return view('404');
    }
    
    
  
  
    

    public function deleteImgDestaque(Request $request)
    {
        $data = $request->all();
        $del = unlink("./img/".$data['name']);
        if ($del) {
            echo 1;
        }
    }
    
}
