<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\User;
use RW940cms\Models\Equipe;
use RW940cms\Models\Documentacao;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use \utilphp\util;
class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct(){     
     	setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo'); 
    }
    public function index()
    {        
        $userId = Auth::id();
        $user = User::where('id',$userId)->first();

        if($user['type'] == 'member'){
            $equipe = Equipe::where('id_user',$user['id'])->first();
            $d = Documentacao::where('equipe_id',$equipe['id'])->count();
            $doc = Documentacao::where('equipe_id',$equipe['id'])->first();

            return view('alunos.dashboard.index',compact('equipe','d','doc'));
        }else{
            $profId = $user['curso_id'];
            $equipes = Equipe::where('curso_id',$profId)->get();

            return view('orientador.dashboard.index',compact('equipes'));
        }
        
    }

    public function loginView()
    {   
        return view("auth.login");
    }
    
}
