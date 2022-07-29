import './bootstrap';


$('.dropdown').click((e) =>{
	
	if($('.dropdown-menu').css('display') == 'none'){
		$('.dropdown-menu').css('display', 'flex')
	}
	else{
		$('.dropdown-menu').css('display', 'none')	
	}


});