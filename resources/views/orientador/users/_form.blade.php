 <div class="card-body">

   <!-- radio -->

   <div class="form-group col-md-6">

     <label for="">Status </label><br>

     <div class="col-sm-6 p-all-0">

       <label>

         <input type="radio" name="status" value="1" class="minimal" @if(@$usuario->status == '1') checked @endif> Ativo

       </label>

     </div>

     <div class="col-sm-6 p-all-0">

       <label>

         <input type="radio" name="status" value="0" class="minimal" @if(@$usuario->status == '0') checked @endif>
         Desativado

       </label>

     </div>





   </div>
   @if(Auth::user()->type == "super_admin")
   <div class="form-group col-md-6">

     <label>Perfil</label>

     <select class="form-control select2" name="type" style="width: 100%;">

       <option value="">Selecione</option>

       <option value="member" @if(@$usuario->type == 'user') selected="selected" @endif>Usuário</option>

       <option value="admin" @if(@$usuario->type == 'admin') selected="selected" @endif>Administrador</option>

     </select>

   </div>

   @endif

   <div class="form-group col-md-6">

     <label for="">Nome</label>

     <input type="text" class="form-control" name="name" required="" value="{{@$usuario->name}}">

   </div>


   <div class="form-group col-md-6">

     <label for="">Empresa</label>

     <select class="form-control select2" name="id_empresa" style="width: 100%;">
       <option value="">Selecione</option>
       @foreach($empresas as $option)
       <option value="{{$option->id}}">{{$option->nome}}</option>

       @endforeach
     </select>
   </div>

   <div class="form-group col-md-6">

     <label for="">E-mail</label>

     <input type="email" class="form-control" name="email" required="" value="{{@$usuario->email}}">

   </div>

   <div class="form-group col-md-6">

     <label for="">Senha</label>

     <input type="password" class="form-control" name="password" required="">

   </div>

   <div class="form-group col-md-6">

     <label for="">Confirmação</label>

     <input type="password" class="form-control" name="password_confirmation" required="">

   </div>




   <div class="clearfix"></div>



   <!-- /.card-body -->

   <div class="card-footer">

     <a href="{{route('admin.users.lista')}}" class="btn btn-default  btn-flat">Cancel</a>

     <button type="submit" class="btn btn-success btn-flat float-right">Salvar</button>

   </div>



 </div>