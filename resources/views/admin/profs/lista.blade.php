@extends('layouts.painel')
@section('pre-assets')
<style>
.pagination{
    margin: 0 auto;
}
.col-12 nav {
    text-align: center;
}

section.content {
      max-width: 800px;
      margin: 0 auto;
      float: inherit;
    }
</style>
@endsection
@section('content')


<section class="content-header">
    <h1 class="col-6">Professores</h1>

</section>


<section class="col-12">
    <div class="col-12">
        <div class="card">

            <!-- <div class="card-header">

                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" name="table_search" class="form-control" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>



                    </div>
                </div>

            </div> -->
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th >ID</th>
                            <th class="text-center">Nome</th>
                          
                            <th class="text-center">Curso</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Deletar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($profs as $prof)
                        <tr>
                        <td >{{$prof->id}}</td>
                            <td class="text-center">{{$prof->name}}</td>
                          
                            <td class="text-center">{{$prof->curso->nome}}</td>
                            <td class="text-center">
                                @if($prof->type == 'admin')
                                Professor
                                @else
                                Super admin
                                @endif
                            </td>
                            @if(Auth::user()->id == $prof->id)
                            <td class="text-center"><p class="btn btn-success ">Você está conectado a essa conta</p></td>
                            @else
                            <td class="text-center">
                                <a href="{{route('admin.profPainel.delete',['id'=>$prof->id])}}" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>

        <!-- /.card -->
    </div>

    {{ $profs->links() }}




</section>


@endsection

@section('pos-script')
<script type="text/javascript">

</script>
@endsection