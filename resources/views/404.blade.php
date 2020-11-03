@extends('layouts.painel')
@section('title', "- erro 404")
@section('pre-assets')
<style>
  body{
    overflow: hidden;
  }

  .text-center img{
    width: 55%;
  }

  @media only screen and (max-width: 600px) {
    .text-center img{
      width: 100%;
    }
  }
</style>
@endsection
@section('content')
        
        
 <section class="info">
              <div class="controle bg-branco">
              	<div class="col-sm-12 ">
                <div class="text-center">
                  
                  <h1>Página não encontrada</h1>
                  <img src="{{asset('min/img/404.png')}}" alt=""><br>

                  </div>

             

               </div>

               
                  
                
              
                <div class="clearfix"></div>
                </div>
            </section>
            
            
            
        
@endsection




@section('pos-script')





@endsection