<?php
namespace RW940cms\Http\Controllers\Painel;
use Illuminate\Http\Request;
use RW940cms\Http\Requests;
use RW940cms\Models\Curso;
use RW940cms\Models\User;
use RW940cms\Models\Equipe;
use RW940cms\Models\Media;
use RW940cms\Http\Controllers\Controller;
use RW940cms\Http\Requests\UsersRequest;
use RW940cms\Criteria\StatusCriteria;
use DB;
use Mail;
class UserController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate();
       
        return view('orientador.users.lista',compact('usuarios'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAluno()
    {
        $cursos = Curso::get();
        return view('cadastro.aluno.create',compact('cursos'));
    }

    public function createProfessor()
    {
        $cursos = Curso::get();
        return view('cadastro.professor.create',compact('cursos'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAluno(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['senha']);
        
        $media = Media::orderBy('created_at','desc')->first();

        $data['logo_id'] = $media['id'];

        User::create([
            'name' => $data['titulo'],
            'password' =>  $data['password'],
            'email' => $data['login'],
            'slug'=> strtolower($data['titulo']),
            'type' => 'member',
            'media_id'=> $data['logo_id'],
            'curso_id' => $data['curso_id'],
           ]);

        $idUser = User::orderBy('created_at','desc')->first();

        $data['id_user'] = $idUser['id'];

       Equipe::create($data);
      
           return response()->json([
            'erro' => 0,
            'msg' => 'Cadastro realizada com sucesso',
            'url'=> route('login'),
        ]);     
    }

    public function storeProfessor(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['senha']);
        
        $media = Media::orderBy('created_at','desc')->first();

        $data['profile_id'] = $media['id'];

       User::create([
        'name' => $data['name'],
        'password' =>  $data['password'],
        'email' => $data['email'],
        'slug'=> preg_replace('/( )/' , '-',strtolower($data['name'])),
        'status'=>'ativo',
        'type' => 'admin',
        'media_id'=> $data['profile_id'],
        'curso_id'=> $data['curso_id'],
       ]);
      
           return response()->json([
            'erro' => 0,
            'msg' => 'Cadastro realizada com sucesso',
            'url'=> route('login'),
        ]);     
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $usuario = User::find($id);
         return view('orientador.users.edit',compact('usuario'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(!empty($data['password'])){
           $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }
        $usuario = User::update($data,$id);
         return redirect()->route('admin.users.lista');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    


    public function listaEquipes(){
        $equipes = Equipe::paginate(10);
        return view('admin.equipes.lista',compact('equipes'));
    }

    public function deleteEquipe($id)
    {
        User::where('id',$id)->update(['status' => 'removido']);   
        return redirect()->route('admin.equipes.lista');
      
    }

    public function listaProfs(){
        $profs = User::where('status','ativo')->where('type','admin')->orWhere('type','super_admin')->paginate(10);
        return view('admin.profs.lista',compact('profs'));
    }

    public function deleteProfs($id)
    {
        User::where('id',$id)->update(['status' => 'removido']);   
        return redirect()->route('admin.profPainel.lista');
 
    }

    public function verifica_login(request $request){
        $name = $request['user_name'];
        $count = User::where('email',$name)->where('status','!=','removido')->count();
        if($count >= 1){
            return response()->json('True');
        }else{
            return response()->json('False');
        }
       
    }

}
