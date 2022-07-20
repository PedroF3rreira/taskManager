<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	 @vite([
	 	'resources/css/app.css', 
	 	'node_modules/bootstrap/dist/css/bootstrap.min.css',
	 	'node_modules/bootstrap-icons/font/bootstrap-icons.css'
	 	]) 
</head>
<body>
	<x-navigation>
		
	</x-navigation>
	<div class="container">
		@yield('content')	
	</div>
	
	<script src="{{ route('admin') }}/assets/js/jquery-3.6.0.min.js" type="text/javascript" ></script>
	<script src="{{ route('admin') }}/assets/js/jquery.form.min.js" type="text/javascript" ></script>
	<script src="{{ route('admin') }}/assets/js/bootstrap.min.js" type="text/javascript" ></script>
	
	@vite([
		'resources/js/app.js',
		])
	
	<script  type="text/javascript">
		$(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			/*Requisição ajax para Logar no sistema*/
			$('form[name="formLogin"]').submit(function(event) {
				event.preventDefault();

				$.ajax({
					url: "{{ route('login.do') }}",
					type: "post",
					data: $(this).serialize(),
					dataType: "json",
					success: function(response){
						if(response.success === true){		
							window.location.href = "{{ route('admin') }}";
						}
						else{
							$(".error").css("display","block").html(response.message);
						}
					}
				});
			});

			/*Requisição ajax para deletar tarefa*/
			$('form[name=formDeleteTask]').submit(event => {
				event.preventDefault();
			
				let id = $(event.target).attr("data");

				$.ajax({
					url: "http://localhost:8000/tarefas/"+id,
					type: "delete",
					data: $(this).serialize(),
					dataType: "json",
					success: function(response){
						if(response.success === true){
							let el = $(event.target).parent();
							el.parent().css("display", "none");
						}
						else{
							$(".error").css("display","block").html(response.message);
						}
					},
					beforeSend: function(){
						$(event.target).find("button#delete").find('i').removeClass("bi bi-trash");
						$(event.target).find("button#delete").find('i').addClass("bi bi-x-circle");
					},
					beforeComplete: function(){
						console.log("completo")
					}

				});
			});

			/**
			 * requisição ajax para alterar estado da tarefa
			 */
			$('form[name=formUpdateTask]').submit(event => {
				event.preventDefault();
			
				let id = $(event.target).attr("data");

				$.ajax({
					url: "http://localhost:8000/tarefas/"+id,
					type: "patch",
					data: $(this).serialize(),
					dataType: "json",
					success: function(response){
						
						if(response.success === true){
							
							let el = $(event.target).parent();
							let button = $(event.target).find('button');
							
							if(response.status === 1){
								
								button.removeClass('btn-outline-success');
								button.addClass('btn-success');
								el.parent().find('span.status').removeClass('bg-warning').addClass('bg-success');
								el.parent().find('span.status').html('Concluido');

							}
							else{
								button.addClass('btn-outline-success');
								button.removeClass('btn-success');
								el.parent().find('span.status').removeClass('bg-success').addClass('bg-warning');
								el.parent().find('span.status').html('Pendente');	
							}
							
						}
						else{
							$(".error").css("display","block").html(response.message);
						}
					},
					beforeSend: function(){
						$(event.target).find("button#delete").find('i').removeClass("btn-outline-warning");
						$(event.target).find("button#delete").find('i').addClass("btn-outline-danger");
					},
					beforeComplete: function(){
						console.log("completo")
					}

				});
			});
		});
		</script>
	</body>
	</html>