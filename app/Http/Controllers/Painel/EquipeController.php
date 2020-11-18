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
        $documentacao = Documentacao::where('equipe_id','=',$id)->first();
        $equipe = Equipe::where('id','=',$id)->first();
        $objetivosEspecificos = ObjetivosEspecificos::where('documentacao_id','=',$documentacao['id'])->get();
        $idAuth = Auth::id();
        $auth = User::where('id',$idAuth)->first();

        if($auth['type'] == 'member'){
            return view('404');

            }
        else if($documentacao){
            $coments = ComentariosProfessor::where('documentacao_id',$documentacao['id'])->orderBy('created','asc')->get();
            return view('orientador.view.index',compact('coments','documentacao','objetivosEspecificos'));
        }
                else{
                    return view('orientador.view.erro',compact('equipe'));
                }
        }
    
    
    public function comentario(Request $request, $id)
    { 
        $equipe = Documentacao::where('equipe_id','=',$id)->first();
        $data = $request->all();
        $data['documentacao_id'] = $equipe['id'];
        $data['created'] = date("d/m/Y",time());
        $data['autor_id'] = Auth::id();

        ComentariosProfessor::create($data);

        return redirect()->route('admin.equipe.view',['id'=>$id]);
    }

}
