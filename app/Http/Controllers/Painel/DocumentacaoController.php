<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Models\Equipe;
use RW940cms\Models\Documentacao;
use RW940cms\Models\ComentariosProfessor;
use RW940cms\Models\ObjetivosEspecificos;
use RW940cms\Models\Media;
use RW940cms\Models\User;
use RW940cms\Criteria\StatusCriteria;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input as Input;

use DB;

class DocumentacaoController extends Controller
{            
    public function lista(){
        $idAuth = Auth::id();
        $equipe = Equipe::where('id_user',$idAuth)->first();
        $documentacao = Documentacao::where('equipe_id',$equipe['id'])->first();
        $objetivosEspecificos = ObjetivosEspecificos::where('documentacao_id',$documentacao['id'])->get();

        return view('alunos.documentacao.lista',compact('equipe','documentacao','objetivosEspecificos'));
    }

    public function novo(){     
        $idAuth = Auth::id();
        $equipe = Equipe::where('id_user',$idAuth)->first();
        $documentacao = Documentacao::where('equipe_id',$equipe['id'])->first();
        $objetivosEspecificos = ObjetivosEspecificos::where('documentacao_id',$equipe['id'])->get();
        return view('alunos.documentacao.novo',compact('objetivosEspecificos'));
    }

    public function store(Request $request){
        $data = $request->all();
        $idAuth = Auth::id();
        $equipe = Equipe::where('id_user',$idAuth)->first();
        $data['equipe_id'] = $equipe['id'];

        Documentacao::create($data);
       
        $doc = Documentacao::where('equipe_id',$equipe['id'])->first();
        $array = array_values($data['objetivo_especifico']);
        $max = count($array);

        for($i=0;$i<$max;$i++){
            $linha = $array[$i];
            ObjetivosEspecificos::create([
                'documentacao_id'=>$doc['id'],
                'descricao'=>$linha,
            ]);

        }

        return response()->json([
            'error' => '0',
            'msg' => 'Atualização realizada com sucesso',
        ]);
           
           

    }

    public function notas(){
        $idAuth = Auth::id();
        $equipe = Equipe::where('id_user',$idAuth)->first();
        $doc = Documentacao::where('equipe_id',$equipe['id'])->first();
        $comentarios = ComentariosProfessor::where('documentacao_id',$doc['id'])->orderBy('created','asc')->get();
        return view('alunos.notas.index',compact('comentarios'));
    }

    public function editar(Request $id){
        $idAuth = Auth::id();
        $equipe = Equipe::where('id_user',$idAuth)->first();
        $doc = Documentacao::where('equipe_id',$equipe['id'])->first();
        $objetivosEspecificos = ObjetivosEspecificos::where('documentacao_id',$doc['id'])->get();
        return view("alunos.documentacao.editar", compact('doc','objetivosEspecificos'));
    }

    public function update(Request $request, $id){
        $data = $request->except('_token');
        $idAuth = Auth::id();
        $equipe = Equipe::where('id_user',$idAuth)->first();
        $data['equipe_id'] = $equipe['id'];

        $doc = Documentacao::where('equipe_id',$equipe['id'])->first();
        $array = array_values($data['objetivo_especifico']);
        $max = count($array);
        ObjetivosEspecificos::where('documentacao_id',$doc['id'])->delete();
        for($i=0;$i<$max;$i++){
            $linha = $array[$i];
            ObjetivosEspecificos::create([
                'documentacao_id'=>$doc['id'],
                'descricao'=>$linha,
            ]);

        }

        unset($data['objetivo_especifico']);

        Documentacao::where('id',$id)->update($data);
       
       

        return response()->json([
            'error' => '0',
            'msg' => 'Atualização realizada com sucesso',
        ]);
           
    }
}
