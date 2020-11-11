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
    <h1 class="col-6">Equipes</h1>

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
                            <th class="text-center">Titulo</th>
                            <th class="text-center">Curso</th>
                            <th class="text-center">Integrantes</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($equipes as $equipe)
                        <tr>
                            <td class="text-center">{{$equipe->titulo}}</td>
                            <td class="text-center">{{@$equipe->curso->nome}}</td>
                            <td class="text-center">{{@$equipe->integrantes}}</td>
                            <td class="text-center">
                                <a href="{{route('admin.equipes.delete',['id'=>$equipe->id])}}" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>

        <!-- /.card -->
    </div>

    {{ $equipes->links() }}




</section>


@endsection

@section('pos-script')
<script type="text/javascript">

</script>
@endsection