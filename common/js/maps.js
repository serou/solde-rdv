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

	

	var mymap = L.map('map-canvas').setView([5.322306, -4.016299], 16);
	/*  mymap.zoomControl.setPosition('topright');  */
			
			L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    			
				maxZoom: 18,
				id: 'mapbox.streets',
				accessToken: 'your.mapbox.access.token'
			}).addTo(mymap);
			
			
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
			
		info =  "<a href='index.php?produit="+station['code_produit']+"'>"
				+"<div class='w3-container w3-row'>"
					+"<div class='w3-col s3'>"
					+"  <img src='/w3images/avatar2.png' class='w3-circle w3-margin-right' style='width:46px'>"
					+"</div>"
					+"<div class='w3-col s9 w3-bar'>"
					+"  <span>"+station['lib_produit']+", <strong>"+(station['prix_initial']-(station['prix_initial']/100*station['reduction']))+"fr</strong> "+station['prix_initial']+"fr</span><br>"
					+"  <span>"+station['nom_structure']+", tel:"+station['contact_structure']+"</span>"
					+"</div>"
				+"</div>"
				+"</a>";

		for(var ii=0; ii<marker.length; ii++){
			station2 = marker[ii];
			
			if(station['code_structure'] === station2['code_structure'] && station['code_produit'] !== station2['code_produit']){

				info += "<a href='index.php?produit="+station['code_produit']+"'>"
					+"<div class='w3-container w3-row'>"
						+"<div class='w3-col s3'>"
						+"  <img src='/w3images/avatar2.png' class='w3-circle w3-margin-right' style='width:46px'>"
						+"</div>"
						+"<div class='w3-col s9 w3-bar'>"
						+"  <span>"+station['lib_produit']+", <strong>"+(station['prix_initial']-(station['prix_initial']/100*station['reduction']))+"fr</strong> "+station['prix_initial']+"fr</span><br>"
						+"  <span>"+station['nom_structure']+", tel:"+station['contact_structure']+"</span>"
						+"</div>"
					+"</div>"
					+"</a>";;
			}
			
		}
		point.bindPopup("<div id='infoWindow'>"+ info +"</div>");
		
			
	}


	var listProd = document.getElementById('list_produit'), i;
	var markerLen = marker.length;

	if(listProd){
		for (i=0; i<markerLen && i<50; i++){
			if(marker[i]){
				list = marker[i];
				listProd.innerHTML += "<a href='index.php?produit="+list['code_produit']+"'>"
										+"<div class='w3-container w3-row'  style='border-bottom: 1px solid green;padding:5px;margin:0;font-size:0.9em;'>"
											+"<div class='w3-col s3'>"
											+"  <img src='/w3images/avatar2.png' class='w3-circle w3-margin-right' style='width:46px'>"
											+"</div>"
											+"<div class='w3-col s9 w3-bar'>"
											+"  <span>"+list['lib_produit']+", <strong>"+(list['prix_initial']-(list['prix_initial']/100*list['reduction']))+" fr</strong></span>, <span>"+list['prix_initial']+"<br>"
											+"  <span>"+station['nom_structure']+", tel:"+station['contact_structure']+"</span>"
									+"</div>"
									+"</a>"
								
			
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

masqAffich.onclick = function(){
	if(menuStyle.visibility == 'hidden'){
		menuStyle.visibility = 'visible';
		this.style.left = '360px';
		carte.style.left = '360px';
		img.src = 'common/images/masquer_menu.png';
	}else{
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
		formCmt.submit();
	};
}
/****************** Fin soumettre le commentaire d'un produit **********************/
