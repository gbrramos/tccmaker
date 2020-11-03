

@section('pre-assets')



<style>

	.list-files{

		list-style: none;

		margin: 0;

		padding: 0;

	}

	.list-files li{

		display: inline-block;

		vertical-align: top;

		text-align: center;

		border: 1px solid #ededed;

		padding: 5px;

		border-radius: 4px;

		margin-bottom: 5px;

		width: 24%;

		min-width: 140px;

	}

	.list-files li img{

		width: auto%;

		height: auto;

		max-height: 85px;

	}

	.list-files li:hover{

		background: #ededed;

		transition: 0.2s all linear;

	}

	.list-files li a{

		display: block;

		height: 85px;

		overflow: hidden;

		line-height: 85px;

		vertical-align: middle;

		margin: 0 auto;

		color: #666;

	}
.newFolter{
		float: right;
		position: relative;
	}
	.box-newFolder{
		display: none;
	
		
		
	
		
		
		
		z-index: 100;
		
	}
</style>



 <!-- /.col -->

     <section class="content-header m-bottom-md">

                    <h1  class="col-6">Gerenciador de Media </h1>

                   

    <div class="clearfix"></div>

  </section>





      

<div class="content row">

	<div class="col-3">

		<div class="card card-primary">

			<!-- Default card contents -->

			





<div id="lista-pastas">
		@include('orientador.media._pastas')
</div>

		</div>

	</div>

	<div class="col-9 pull-right">

		<div class="card card-default">

			<div class="card-header"> <h3 class="card-title"><i class="fa fa-file"></i> Arquivos</h3> </div>

			<div class="card-body">

				<div class="row">

					<div class="col-12">

					<div class="form-group">

			          <label for="exampleInputFile">Upload</label>

			            <div class="container-upload m-0">

			               <div class="carregandoForm" style="display: none"><i class="fa fa-spinner fa-pulse fa-fw"></i><span class="sr-only">Loading...</span></div>

			               <input type="file"  id="uploadArquivos" class="uploadArquivos" multiple="" name="file">

			               <div><i class="fa fa-cloud-upload" aria-hidden="true"></i> UPLOAD ARQUIVO</div>

			            </div>

			        </div>

			        <div class="alert alert-success p-all-xs" role="alert" style="display: none"></div>



			        </div>

				</div>

				<hr>



				<div class="row  m-bottom-xs  hidden">

					<!--

					<div class="col-12 pull-right text-center">

						<a href="" class="btn btn-danger btn-xs actionRemove">Remover</a>

						<a href="" class="btn btn-primary btn-xs usarImage" data-alvo="banner">Usar Imagem em Banner</a>

						<a href="" class="btn btn-primary btn-xs usarImage" data-alvo="destaque">Usar Imagem em Destaque</a>

						<a href="" class="btn btn-primary btn-xs usarImage" data-alvo="galeria">Usar Imagem em Galeria de fotos</a>

					</div>

					-->

				</div>
				<div class="row">
<input placeholder="Pesquisar" onkeyup="searchUser('listaArquivos','filterListaFiles')" id="filterListaFiles" class="form-control " >
</div>
<hr>
				<div class="row" style="max-height: 280px;overflow: auto;">

					<form action="" id="formFiles">
						 @csrf
						<input type="hidden" name="folder" value="{{$folderAtual}}">
						<input type="hidden" name="folder_parent" value="{{$folder_parent}}">
						<div class="col-12">
							<ul class="list-files" id="listaArquivos">
							</ul>
						</div>
					</form>
				</div>

				<div class="row  m-top-xs  hidden" id="row">

					<!--

					<div class="col-12 pull-right text-center">

						<a href="" class="btn btn-danger btn-xs actionRemove">Remover</a>

						<a href="" class="btn btn-primary btn-xs usarImage" data-alvo="destaque">Usar Imagem em Destaque</a>

						<a href="" class="btn btn-primary btn-xs usarImage" data-alvo="galeria">Usar Imagem em Galeria de fotos</a>

					</div>

					-->

				</div>

				<div class="row">

					<div class="cols-m-12 text-center">

						{{$files}}

					</div>

				</div>

			</div>

			<div class="modal-footer">

				<a href="" class="btn btn-danger actionRemove">Remover</a>

				<a href="" class="btn btn-primary  usarImage">Inserir</a>

			</div>

		</div>

	</div>

</div>









<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>



<script type="text/javascript">
function searchUser(id,input) {
			// Declare variables
			var input, filter, ul, li, a, i, txtValue;

			input = document.getElementById(input);
			filter = input.value.toUpperCase();
			ul = document.getElementById(id);
			li = ul.getElementsByTagName('li');
			// Loop through all list items, and hide those who don't match the search query
			for (i = 0; i < li.length; i++) {
			a = li[i].getElementsByClassName("nome")[0];
			txtValue = a.textContent || a.innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
			li[i].style.display = "";
			} else {
			li[i].style.display = "none";
			}
			}
			
		}

  	$("body").on('click','.newFolter',function(e){
  		e.preventDefault();
  		$(".box-newFolder").fadeIn('fast');
  	
  		
  	})
$("body").on('click','.cancelNewFolder',function(e){
  		e.preventDefault();
  		$(".box-newFolder").fadeOut('fast');
  	
  		
  	})

$("body").on('submit','.formNewFolder',function(e) { 
e.preventDefault();
            var url =  $(this).attr('action'); // the script where you handle the form input.
            $.ajax({
             type: "POST",
            url: url,
                   data: $(this).serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                    $("#lista-pastas").html(data);

                  }

                });

            e.preventDefault(); // avoid to execute the actual submit of the form.

          });


	var ajaxLoading = false;

function copyToClipboard(element) {

	

  $(element).select();

  document.execCommand("copy");

	$(".alert-success").html('Link Copiado').fadeIn('fast').delay(2000).fadeOut('fast',function(){

		$('#modalMedia').modal('hide');



	})





}

	



  $(document).ready(function() {



	




  	$('[data-toggle="tooltip"]').tooltip();
  	 function listaFiles(folder,page = 1){

	  	if(!folder){

	  		folder = 'uploads/';

	  	}else{



	  	}

	  	 var data = new FormData();

	  	 data.append('folder', folder);

	  	 data.append('_token', '{{ csrf_token() }}');

	  	 data.append('page', page);



	  	 $.ajax({

            url: '{{route("admin.media.lista-files")}}',

           		type: 'POST',

	         	cache: false,

	         	contentType: false,

	          	processData: false,

	          	data : data,

	          	success: function(result){

	           		$(".list-files").html(result)

	          	}

          });

         

     

	  }

	   listaFiles();

	   $(".list-files").on('click','a',function(e){

	   			e.preventDefault();

	   });

	  

	   

	   $("body").on('click','.actionRemove',function(e){

	   	e.preventDefault();

	  	 	$.post('{{route("admin.ajax.delete-media")}}',$("#formFiles").serialize(),function(data){

	   		//console.log(data);

	   		//var href = $('.pagination .active a').attr('href');

	   		//var page = $('.pagination .active a').attr('href').split("=");



	 		listaFiles($("input[name='folder']").val());

	   	})

 		

	   })

 $("body").on('click','.removeImg',function(e){

	   	e.preventDefault();

	  	 	$.post('{{route("admin.ajax.delete-media")}}',$("#formFiles").serialize(),function(data){

	   		//console.log(data);

	   		//var href = $('.pagination .active a').attr('href');

	   		//var page = $('.pagination .active a').attr('href').split("=");



	 		listaFiles($("input[name='folder']").val());

	   	})

 		

	   })

 		 $("body").on('click','.usarImage',function(e){

	   		e.preventDefault();

	  	 	var count = $('input[name="file[]"]:checked').length;

	  	 	var val = $('.list-files input[name="file[]"]:checked').val();

	  	 	var alvo =  localStorage.getItem("media_target");

	  

	  	 			if(alvo == "conteudo"){

	  	 				$.get('{{route("admin.media.getFile")}}/'+val,function(data){

	  	 				$('#summernote').summernote('pasteHTML', '<img src="' + data.fullpatch +'" alt="">');

	  	 					$('#modalMedia').modal('hide');

	  	 					});



	  	 			}

	  	 			if(alvo == "banner"){

						$.get('{{route("admin.media.getFile")}}/'+val,function(data){



		                  $("input[name='img_fundo']").attr("disabled",false)

				            $("#preview .imgBanner").html('<img src="' + data.fullpatch +'" alt="">')

				            $("#carregandoForm").hide(0);

				            $("#media_id").val(data.id);

				            $(".container-upload").addClass("hidden");

				            $(".thumb-img .img").html('<img src="' + data.fullpatch +'" style="height: 120px;" width="auto" alt="">');

				            $(".thumb-img").removeClass("hidden");

				           // var position = $("#image").offset().top; $("HTML, BODY").animate({ scrollTop: position }, 1000);

			  	 			$('#modalMedia').modal('hide');



		  	 			});

	  	 			}

	  	 			if(alvo == "icone"){

						$.get('{{route("admin.media.getFile")}}/'+val,function(data){

		                  	var html = '<li>';

		                    html += '<input type="hidden" name="icone_id" value="'+data.id+'" />';

		                    html += '<a href="#" class="remove" data-file="'+data.arquivo+'">';

		                      html += '<i class="fas fa-times"></i> ';

		                    html += '</a>';

		                    html += '<img src="' + data.fullpatch +'">';

		                 	html += ' </li>';

		               		$("#preview_icon ul").html(html);

			  	 			$('#modalMedia').modal('hide');

		  	 			});

	  	 			}

	  	 			if(alvo == "destaque"){

						$.get('{{route("admin.media.getFile")}}/'+val,function(data){

		                  	var html = '<li>';

		                    html += '<input type="hidden" name="media_id" value="'+data.id+'" />';

		                    html += '<a href="#" class="remove" data-file="'+data.arquivo+'">';

		                      html += '<i class="fas fa-times"></i> ';

		                    html += '</a>';

		                    html += '<img src="' + data.fullpatch +'">';

		                 	html += ' </li>';

		               		$("#preview ul").html(html);

		               		$("#cardImage").show('fast');

			  	 			$('#modalMedia').modal('hide');

		  	 			});

	  	 			}



	  	 			if(alvo == "galeria"){

	  	 				 

	  	 					 $('.list-files input[name="file[]"]:checked').each(function () {

					          	$.get('{{route("admin.media.getFile")}}/'+$(this).val(),function(data){

					          		

					          	

					          		



									var html = '';

									



									html +='<tr>'

					                html +='<td><i class="fa fa-arrows-v" aria-hidden="true"></i></td>';

					                html +='<td> <input type="hidden" name="galeria_id[]" value="'+data.id+'" />';

					                  html +='<input type="hidden" class="ordemGaleria" name="ordem[]" value="'+data.id+'">';

					                  html +='<img src="' + data.fullpatch +'" style="max-height: 50px" alt=""></td>';

					                  html +='<td> ';



					                    html +='<a href="" class="btn btn-danger btn-xs  remove "  data-file="'+data.id+'">';

					                      html +='<i class="fa fa-trash-o"></i>';

					                    html +='</a>';

					                  html +='</td>';

					                html +='</tr>';



									console.log(html)

									$('#previewGaleria .ordenar').append(html);



									

								});

						      

								     

							});

  							$('#modalMedia').modal('hide');	

					       	$('#previewGaleria').addClass("teste")

					       //	$('#previewGaleria ul').append(html);

	  	 			}

	  	 		

	  	 	

	   	})

	  

	$("body").on('click','.checkFile',function(e){

  	

  		if($('.checkFile:checked').length > 0){

  			$(".actionRemove").closest('.row').removeClass("hidden");

  		}else{

  			$(".actionRemove").closest('.row').addClass("hidden");

  		}



  	})

  	$(".list-group a").click(function(e){

  		e.preventDefault();

  		var folder = $(this).data('folder');



  		$("input[name='folder']").val(folder)

 		listaFiles(folder);

  	})

  	$(".pagination li").eq(1).html('<a class="page-link" href="{{route("admin.media.index")}}?page=1">1</a>');

  	$(".page-link").click(function(e){

  		e.preventDefault();

  		var page = $(this).attr('href').split("=");

  		$(".pagination").find(".active").removeClass("active");

  		$(this).parent().addClass("active")

 		listaFiles($("input[name='folder']").val(),page[1]);

  	})

	  $('body' ).on('change','#uploadArquivos', function() {
 		$(this).siblings('.carregandoForm').fadeIn('fast');
          $("#carregandoForm").show(0);

          var data = new FormData();

        $.each($(this)[0].files, function(i, file) {

              data.append('file[]', file);

        });

         data.append('folder', $("input[name='folder']").val());

         data.append('folder_parent',  $("input[name='folder_parent']").val());

          data.append('_token', '{{ csrf_token() }}');

if(!ajaxLoading) {

            ajaxLoading = true;

          $.ajax({

            url: '{{route("admin.ajax.upload-media")}}',

           type: 'POST',

          

          cache: false,

          contentType: false,

          processData: false,

          data : data,

          success: function(result){

           console.log(result);
            $('.carregandoForm:visible').fadeOut('fast');
            

           listaFiles($("input[name='folder']").val());

          ajaxLoading = false;

          }

          });

         }

        });



	 

      });

</script>

