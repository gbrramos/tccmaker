<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Equipe;
use RW940cms\Models\Documentacao;
use RW940cms\Models\ObjetivosEspecificos;

use RW940cms\Models\ComentariosProfessor;
use RW940cms\Models\Media;
use RW940cms\Models\User;

use RW940cms\Criteria\StatusCriteria;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Input as Input;
use Carbon\Carbon;
use DB;
class EquipeController extends Controller
{    
    public function profView(Request $request, $id)
    {
        $equipe = Documentacao::where('equipe_id','=',$id)->first();
        $equipeMain = Equipe::where('id','=',$id)->first();
        $objetivosEspecificos = ObjetivosEspecificos::where('documentacao_id','=',$id)->get();
        $idAuth = Auth::id();
        $auth = User::where('id',$idAuth)->first();

        if($auth['type'] == 'member'){
            return view('404');

            }
        else if($equipe){
            $coments = ComentariosProfessor::where('documentacao_id',$id)->orderBy('created_at','asc')->get();
            return view('orientador.view.index',compact('coments','equipe','objetivosEspecificos'));
        }
                else{
                    return view('orientador.view.erro',compact('equipeMain'));
                }
        }
    
    
    public function comentario(Request $request, $id)
    {
        $equipe = Documentacao::where('equipe_id','=',$id)->first();
        $data = $request->all();
        $data['documentacao_id'] = $id;
        $data['created'] = date("d/m/Y",time());
        $data['autor_id'] = Auth::id();

        ComentariosProfessor::create($data);

        return redirect()->route('admin.equipe.view',['id'=>$id]);
    }

    public function editar(Request $id)
    {
        $idAuth = Auth::id();
        $equipe = Equipe::where('id_user',$idAuth)->first();
        dd($equipe);
    }
}
