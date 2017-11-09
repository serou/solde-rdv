$(function() {
	// Code JS pour la partie administration
/*	$('#form').hide();

	$('#ajout').click(function(){
		$('#form').slideToggle();
	}); */

	$('p.description').hide();

	$('h4.titre').click(function(){
		$(this).next('p.description').slideToggle();
	});

	$('.deleteCat').click(function(){
		var id = $(this).attr('id');
		var dataString = 'id='+id;
		var parent = $(this).parent();
  
		$.ajax({
			type:'GET',
			url:'category.php',
			data:dataString,
			
			beforeSend: function(){
				parent.animate({opacity: 0.20}, 'slow');
			},
			success: function(){
				parent.slideUp('slow',function(){$(this).remove();});
			}
		});
		return false;
	});

	$('.deleteMarkers').click(function(){
		var id = $(this).attr('id');
		var dataString = 'id='+id;
		var parent = $(this).parent();
  
		$.ajax({
			type:'GET',
			url:'markers.php',
			data:dataString,
			
			beforeSend: function(){
				parent.animate({opacity: 0.20}, 'slow');
			},
			success: function(){
				parent.slideUp('slow',function(){$(this).remove();});
			}
		});
		return false;
	});
});


// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("ajout");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

/******************dire qu'un element a été supprimé************************/
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

var alertSupp = document.querySelectorAll('img[alt=supprimer]'),
alertSuppLen = alertSupp.length, i;

for(i=0; i<alertSuppLen; i++){
	alertSupp[i].onclick = myFunction;
}

/********************fin dire qu'un element a été supprimé**********************/
