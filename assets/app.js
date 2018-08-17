
$(document).ready(function()
{


	/*
		Leaflet, a visual map to select the place
		(the front part)
	*/

	if( $('#map').length )
	{
		var map = L.map('map').setView([43.6267463, 0.5836353], 11);
		var marker;

		L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
			attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
			subdomains: 'abcd',
			minZoom: 1,
			maxZoom: 16,
			ext: 'png'
		}).addTo(map);

		map.on('click', function mapClickListen(e) {
			if( ! marker ){
				genMarker(e.latlng);
				updateInputs(e.latlng);
			}
		});
	}

	var blueIcon = L.icon({
	    iconUrl: 'node_modules/leaflet/dist/images/marker-icon.png',
	    shadowUrl: 'node_modules/leaflet/dist/images/marker-shadow.png',
	    iconSize:     [25, 41],
	    shadowSize:   [41, 41],
	    iconAnchor:   [13, 41],
	    shadowAnchor: [13, 41],
	    popupAnchor:  [0, -30]
	});

	function genMarker(pos){
		marker = L.marker( pos, {draggable:true,icon:blueIcon} );

		marker.on('dragend', function(e) {
			updateInputs( e.target._latlng );
		});
		marker.addTo(map);
	}

	function updateInputs(e){
		$('input[name="latitude"]').val(e.lat);
		$('input[name="longitude"]').val(e.lng);
	}





	/*
		Leaflet, the admin part
	*/

	$('.place').each(function(){
		var lat = $(this).data('lat');
		var lon = $(this).data('lon');
		var map = L.map(this).setView([lat, lon], 11);
		var marker;

		L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
			attribution: '',
			subdomains: 'abcd',
			minZoom: 1,
			maxZoom: 16,
			ext: 'png'
		}).addTo(map);

		marker = L.marker( {lat:lat,lng:lon}, {draggable:true,icon:blueIcon} );
		marker.addTo(map);
	});



	/*
		If there is a modal, we consider it is opened
		by default, as it is a message from the server.
	*/

	$('.modal').modal('toggle');




	/*
		The number of selected ducks is printed in realtime.
		BUG : this should break in mobile, as we use mouse move !
	*/

	$('#howmany').on('mousemove', function(){
		var num_duck = $(this).val();
		$('#selected-range').html( num_duck );
	});



	/*
		A datetime picker for the "when" field
	*/

	$.extend(true, $.fn.datetimepicker.defaults, {
		icons: {
			time: 'far fa-clock',
			date: 'far fa-calendar',
			up: 'fas fa-arrow-up',
			down: 'fas fa-arrow-down',
			previous: 'fas fa-chevron-left',
			next: 'fas fa-chevron-right',
			today: 'fas fa-calendar-check',
			clear: 'far fa-trash-alt',
			close: 'far fa-times-circle'
		}
	});

	$('#when').datetimepicker({
		inline: true,
		sideBySide: true,
		format: 'YYYY/MM/DD HH:mm',
		keepOpen: false,
		debug: true
	});

});



