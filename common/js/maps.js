(function(){

		function currentLocation() {
				if (navigator.geolocation) {
				    navigator.geolocation.getCurrentPosition((function (position) {
				    
				    	var circle = L.circle([position.coords.latitude, position.coords.longitude], {
							color: 'rgba(255, 0, 0, 0.1)',
							fillColor: '#f03',
							fillOpacity: 0.4,
							radius: 15
						}).addTo(mymap);

				        mymap.panTo(new L.LatLng(position.coords.latitude, position.coords.longitude));   
				        
				    }));
				} else {
				    alert("La géolocalisation n'est pas supportée par ce navigateur.");
				}
		}
		
		document.getElementById('myLocation').onclick = function (e) {
			currentLocation();
		};
		
		
	/**********************************************
	 * carte Leaflet
	 **********************************************/

	
	var lat = document.getElementById('latitude');
	var lng = document.getElementById('longitude');
	var leZoom = lng ? 17 : 15;
	lat = lat ? lat.innerHTML : 5.322306;
	lng = lng ? lng.innerHTML : (-4.016299);
	

	var mymap = L.map('map-canvas').setView([lat, lng], leZoom);
	/*  mymap.zoomControl.setPosition('topright');  */
			
			L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    			
				maxZoom: 18,
				id: 'mapbox.streets',
				accessToken: 'your.mapbox.access.token'
			}).addTo(mymap);
			
// entourer le la position du produit selectionné...
	var lat1 = document.getElementById('latitude');
	var lng1 = document.getElementById('longitude');
	
	if(lat1 && lng1){	
		lat1 =lat1.innerHTML;
		lng1 =lng1.innerHTML;	
	
		var circle1 = L.circle([lat1, lng1], {
							color: 'rgba(255, 0, 0, 0.1)',
							fillColor: '#f03',
							fillOpacity: 0.1,
							radius: 50
						}).addTo(mymap);
	}
			
			
	for(var i=0; i<marker.length; i++){
		var station = marker[i];
		var info;
	var logo = L.icon({
		iconUrl: 'common/images/marker-map/'+station['lib_categorie_produit']+'.png',
		iconSize: [32, 32],
	});
		var point = L.marker([station['latitude'], station['longitude']],{
			opacity: 1,
			// draggable: true,
			icon: logo,
			title: station['lib_produit']+ ' -' +station['reduction']+ '%'
		})
			.addTo(mymap);
			
		info =  "<a href='index.php?produit="+station['code_produit']+"&lat="+station['latitude']+"&lng="+station['longitude']+"'>"
				+"<div class='w3-container w3-row' style='padding:0px;margin:0px;width:300px;text-align:center;'>"
					+"<div class='w3-col s3' style='margin:0px;'>"
					+"  <img src='common/images/"+station['image_produit']+"' class='w3-circle w3-margin-right' style='width:60px'>"
					+"</div>"
					+"<div class='w3-col s9 w3-bar' style='margin:0px;'>"
					+"  <span style='font-size:1.3em;'><h2 style='padding:0px;margin:0px;'>"+station['lib_produit']+"</h2> Prix : <strong>"+(station['prix_initial']-(station['prix_initial']/100*station['reduction']))+" </strong>F</span><br>"
					+"  <span>"+station['nom_structure']+", tel:"+station['contact_structure']+"</span>"
					+"</div>"
				+"</div>"
				+"</a>";

		for(var ii=0; ii<marker.length; ii++){
			station2 = marker[ii];
			
			if(station['code_structure'] === station2['code_structure'] && station['code_produit'] !== station2['code_produit']){

				info += "<a href='index.php?produit="+station2['code_produit']+"&lat="+station2['latitude']+"&lng="+station2['longitude']+"'>"
					+"<div class='w3-container w3-row' style='padding:0px;margin:0px;width:300px;text-align:center;border-top:1px solid #CCC'>"
						+"<div class='w3-col s3'style='margin:0px;'>"
						+"  <img src='common/images/"+station2['image_produit']+"' class='w3-circle w3-margin-right' style='width:60px'>"
						+"</div>"
						+"<div class='w3-col s9 w3-bar' style='margin:0px;'>"
						+"  <span style='font-size:1.3em;'><h2 style='padding:0px;margin:0px;'>"+station2['lib_produit']+"</h2> Prix : <strong>"+(station2['prix_initial']-(station2['prix_initial']/100*station2['reduction']))+" </strong>F</span><br>"
						+"  <span>"+station2['nom_structure']+", tel:"+station2['contact_structure']+"</span>"
						+"</div>"
					+"</div>"
					+"</a>";
			}
			
		}
		point.bindPopup("<div id='infoWindow'>"+ info +"</div>");
		
			
	}


	var listProd = document.getElementById('list_produit'), i;
	var markerLen = marker.length;

	if(listProd){
		if(markerLen){
			listProd.innerHTML = '';
		}
		for (i=0; i<markerLen && i<50; i++){
			if(marker[i]){
				list = marker[i];
				listProd.innerHTML += "<a href='index.php?produit="+list['code_produit']+"&lat="+list['latitude']+"&lng="+list['longitude']+"'>"
									+"<li>"
										+"				<img alt='"+list['lib_produit']+"' src='common/images/"+list['image_produit']+"' />"
							
										+"				<div class='info'>"
						
										+"					<div class='row'>"
										+"						<div class='col-sm-10 col-sm-offset-1'>"
										+"							<h2 class='title'>"+list['lib_produit']+ ' -' +list['reduction']+ "%</h2>"
										+"						</div>"	
										+"					</div>"
										+"					<div class='row'>"
										+"						<div class='col-sm-3'>Prix:</div>"
										+"						<div class='col-sm-9'>"+(list['prix_initial']-(list['prix_initial']/100*list['reduction']))+" F</div>"
										+"					</div>"
										+"					<div class='row'>"
										+"						<div class='col-sm-3'>Fin:</div>"
										+"						<div class='col-sm-9'>"+list['date_fin_promo']+"</div>"
										+"					</div>"
										+"					<div class='row'>"
										+"						<div class='col-sm-3'>Structure:</div>"
										+"						<div class='col-sm-9'>"+list['nom_structure']+"</div>"
										+"					</div>"
										+"					<div class='row'>"
										+"						<div class='col-sm-3'>Address:</div>"
										+"						<div class='col-sm-9'>"+list['contact_structure']+"</div>"
										+"					</div>"							
										+"				</div>"

										+"		</li>";
									+"</a>";
								
			
			}
		}
	}
	


})();


/**************menu moovant******************/

// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
/***************** Masquer et afficher le menu *********************/

var masqAffich = document.getElementById('masquerAfficherMenu');
var img = masqAffich.getElementsByTagName('img')[0];
var menu = document.getElementById('menu');
var carte = document.getElementById('map-canvas');
var menuStyle = menu.style;
var reseauSociaux = document.getElementById('accordion');

masqAffich.onclick = function(){
	if(menuStyle.visibility == 'hidden'){
		this.style.left = '360px';
		carte.style.left = '360px';
		reseauSociaux.style.visibility = 'visible';
		img.src = 'common/images/masquer_menu.png';
		menuStyle.visibility = 'visible';
	}else{
		reseauSociaux.style.visibility = 'hidden';
		menuStyle.visibility = 'hidden';
		this.style.left = '0px';
		carte.style.left = '0%';
		img.src = 'common/images/afficher_menu.png';
	}
};

/****************** Soumettre le commentaire d'un produit **********************/
var formCmt = document.getElementById('form_commentaire');
var envoiCmt = document.getElementById('envoi_commentaire');

if(envoiCmt){
	envoiCmt.onclick = function(){
		var inputs = formCmt.getElementsByTagName('input');
		if(!inputs[0].value){
			inputs[0].focus();
		}else if(!inputs[1].value){
			inputs[1].focus();
		}else{
			formCmt.submit();
		}
	};
}
/****************** Fin soumettre le commentaire d'un produit **********************/

/****************** Nouveau design **********************/
/*!
    * Sidebar.js - Bootstrap Sidebar Hover Event toggle attribute
    * onHover
    
	* Version: v3.1.4

	* LGPL v3 LICENSE INFO
	* This file is part of a Sidebar Bootstrap Element. Copyright
	* 2015 Soldier-up Designs - Website Development Company.

	* sidebar.js is a free software: you can redistribute it and/or modify
	* it under the terms of the GNU Lesser General Public License as published by
	* the Free Software Foundation, either version 3 of the License, or
	* (at your option) any later version.

	* sidebar.js is distributed as a free tool that can help you
	* add a few extra dynamics to your Web Design code. However,
	* this code and any associated code "IS" "WITHOUT ANY WARRANTY";
	* without even the implied warranty of "MERCHANTABILITY" or
	* "FITNESS FOR A PARTICULAR PURPOSE".  See the GNU Lesser
	* General Public License for more details.
*/

/*! 
	======================= Notes ===============================
	* Used to close Sidebar on jQuery Element "Mouseleave" Event 
	* This was a pain in the Ass to create 
	* and to not break the rest of the jQuery 
	* and Bootstrap API Script ()Did that once or twice in
	- Development)
	========== END Crude Vocabulary (...and notes) ==============
*/

/*! 
	================= ^ Ranting Stops Here ^ ====================
	==================== Code Starts Below ======================
*/

// Open the Sidebar-wrapper on Hover
/* $("#menu-toggle").hover(function(e)							//declare the element event ...'(e)' = event (shorthand)
{
	$("#sidebar-wrapper").toggleClass("active",true);		//instead on click event toggle active CSS element
	e.preventDefault();										//prevent the default action ("Do not remove as the code
});

$("#menu-toggle").bind('click',function(e)							//declare the element event ...'(e)' = event (shorthand)
{
	$("#sidebar-wrapper").toggleClass("active",true);		//instead on click event toggle active CSS element
	e.preventDefault();										//prevent the default action ("Do not remove as the code
});														//Close 'function()'

$('#sidebar-wrapper').mouseleave(function(e)				//declare the jQuery: mouseleave() event 
															// - see: ('//api.jquery.com/mouseleave/' for details)
{
	/*! .toggleClass( className, state ) */
	/* $('#sidebar-wrapper').toggleClass('active',false); *//* toggleClass: Add or remove one or more classes from each element
															in the set of matched elements, depending on either the class's
															presence or the value of the state argument */
	/*e.stopPropagation();*/								//Prevents the event from bubbling up the DOM tree
															// - see: ('//api.jquery.com/event.stopPropagation/' for details)
															
	/*e.preventDefault();								    // Prevent the default action of the event will not be triggered
															// - see: ('//api.jquery.com/event.preventDefault/' for details)
}); */
/*!


Simply:

	a[href*=#] 

		* get all anchors (a) that contains # in href but with:

	:not([href=#])

		* exclude anchors with href exaclty equals to #

example:

	<a href="#step1">yes</a>
	<a href="page.php#step2">yes</a>
	<a href="#">no</a> 

		* the selectors get first two anchor but it exclude the last
		source: http://stackoverflow.com/questions/20947529/what-does-ahref-nothref-code-mean

*/

$(document).ready(function()
{

	//Easing Scroll replace Anchor name in URL and Offset Position
	$(function(){
		$('a[href*=#]:not([href=#])').click(function()
		{
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

				var target = $(this.hash);
				target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				if (target.length) {
					$('html,body').animate({
						scrollTop: target.offset().top -420
					}, 3500, 'easeOutBounce');
					return false;
				}
			}
		});
	});
});
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});

/*!
    * Sidebar.js - Bootstrap Sidebar Hover Event toggle attribute
	* onHover
	
	* Version: v2.5.8

	* LGPL v3 LICENSE INFO
	* This file is part of a Sidebar Bootstrap Element. Copyright
	* 2015 Soldier-up Designs - Website Development Company.

	* sidebar.js is a free software: you can redistribute it and/or modify
	* it under the terms of the GNU Lesser General Public License as published by
	* the Free Software Foundation, either version 3 of the License, or
	* (at your option) any later version.

	* sidebar.js is distributed as a free tool that can help you
	* add a few extra dynamics to your Web Design code. However,
	* this code and any associated code "IS" "WITHOUT ANY WARRANTY";
	* without even the implied warranty of "MERCHANTABILITY" or
	* "FITNESS FOR A PARTICULAR PURPOSE".  See the GNU Lesser
	* General Public License for more details.
*/

/*! 
	======================= Notes ===============================
	* Used to close Sidebar on jQuery Element "Mouseleave" Event 
	* This was a pain in the Ass to create 
	* and to not break the rest of the jQuery 
	* and Bootstrap API Script ()Did that once or twice in
	- Development)
	========== END Crude Vocabulary (...and notes) ==============
*/

/*! 
	================= ^ Ranting Stops Here ^ ====================
	==================== Code Starts Below ======================
*/

$(document).ready(function()
{
	
	// Closes the sidebar menu on menu-close button click event
	$("#menu-close").click(function(e)							//declare the element event ...'(e)' = event (shorthand)
	{
																// - will not work otherwise")
		$("#sidebar-wrapper").toggleClass("active");			//instead on click event toggle active CSS element
		e.preventDefault(); 									//prevent the default action ("Do not remove as the code
		
		/*!
		======================= Notes ===============================
		* see: .sidebar-wrapper.active in: style.css
		==================== END Notes ==============================
		*/
	});															//Close 'function()'

	// Open the Sidebar-wrapper on Hover
	$("#menu-toggle").hover(function(e)							//declare the element event ...'(e)' = event (shorthand)
	{
		$("#sidebar-wrapper").toggleClass("active",true);		//instead on click event toggle active CSS element
		e.preventDefault();										//prevent the default action ("Do not remove as the code
	});

	$("#menu-toggle").bind('click',function(e)					//declare the element event ...'(e)' = event (shorthand)
	{
		$("#sidebar-wrapper").toggleClass("active",true);		//instead on click event toggle active CSS element
		e.preventDefault();										//prevent the default action ("Do not remove as the code
	});															//Close 'function()'

	$('#sidebar-wrapper').mouseleave(function(e)				//declare the jQuery: mouseleave() event 
																// - see: ('//api.jquery.com/mouseleave/' for details)
	{
		/*! .toggleClass( className, state ) */
		$('#sidebar-wrapper').toggleClass('active',false);		/* toggleClass: Add or remove one or more classes from each element
																in the set of matched elements, depending on either the class's
																presence or the value of the state argument */
		e.stopPropagation();									//Prevents the event from bubbling up the DOM tree
																// - see: ('//api.jquery.com/event.stopPropagation/' for details)
																
		e.preventDefault();										// Prevent the default action of the event will not be triggered
																// - see: ('//api.jquery.com/event.preventDefault/' for details)
	});
});
// Closes the sidebar menu on menu-close button click event
$("#menu-close").click(function(e)							//declare the element event ...'(e)' = event (shorthand)
{
															// - will not work otherwise")
	$("#sidebar-wrapper").toggleClass("active");			//instead on click event toggle active CSS element
	e.preventDefault(); 									//prevent the default action ("Do not remove as the code
	
	/*!
	======================= Notes ===============================
	* see: .sidebar-wrapper.active in: style.css
	==================== END Notes ==============================
	*/
});	
/****************** Fin nouveau design **********************/

