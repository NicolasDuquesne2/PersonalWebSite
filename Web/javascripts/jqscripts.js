
jQuery(document).ready(function($) {

	//Evènements
		//Listner évènement clic sur lien (anchor)
		
		$("body").on("click", "a", scroll_if_anchor);
	
		//contrôle contenu formulaire contact
		$('form').submit(function(event)  
		{ 
			var fail = "Erreur mail: veuillez vérifier le formulaire d'envoi : \n"
			 var err = false
			if ($('#name').val() == "") 
			{
				fail += "\nVeuillez entrer un nom."
				err = true
			}
			if ($('#mail').val() == "") fail += "\nVeuillez entrer un email."
			else if (!(($('#mail').val().indexOf(".") > 0) && ($('#mail').val().indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test($('#mail').val())) 
			{
				fail += "\nL'adresse de courrier électronique n'est pas valide."
				err = true
			}
			if ($('#msg').val() == "") 
			{
				fail += "\nVeuillez entrer un message."
				err = true
			}
			
			if (err == true)
			{
				alert(fail)	
			}
		})
		
		//changement de style des encadrés menus souris entrante
		$('.opt').mouseenter(function(){
		
		})
		//changement de style des encadrés menus souris quittante
		$('.opt').mouseleave(function() {
		
		})

//Fonctions
	
		//fonction des ancres, appellée par l'évènement de click sur le menu
		function scroll_if_anchor (href)
		{
			href = typeof(href) == 'string' ? href : $(this).attr('href')
			var fromTop = $('header').height()
			if (href.indexOf("#") == 0)
			{
				var target = $(href)
				if (target.length)
				{
					$('html, body').animate({scrollTop: target.offset().top - fromTop})
					if(history && "pushState" in history) {
                		history.pushState({}, document.title, window.location.pathname + href);
                		return false;
					}
				}
			}
		}
	
});