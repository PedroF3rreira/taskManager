<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">

</head>
<body >
	<x-navigation>
		
	</x-navigation>
	<div class="container">
		@yield('content')	
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript" ></script>

	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/jquery-form/form@4.3.0/dist/jquery.form.min.js"></script>
<script  type="text/javascript">
	$(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
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

		$('form[name=formDeleteTask]').submit(event => {
			event.preventDefault();

			$.ajax({
				url: "{{ route('task.destroy',$task->id??'') }}",
				type: "delete",
				data: $(this).serialize(),
				dataType: "json",
				success: function(response){
					if(response.success === true){		
						window.location.href = "{{ route('task.index') }}";
					}
					else{
						$(".error").css("display","block").html(response.message);
					}
				}

			});

		});
	});
</script>
</body>
</html>