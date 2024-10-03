
var refreshAll = function() {
	location.reload(true);
}

var initInfoStation = function(type, number, station, way, color) {
	var api_url = 'https://api-ratp.pierre-grimaud.fr/v3/schedules/' + type + '/' + number + '/' + station + '/' + way;

	$.get(api_url, function(data, status){

		if (status == 'success'){
			console.log('yes');
			for (var i = 0; i < data.result.schedules.length; i++) {
				if (i >= 2)
					break;
				$('#content').append('<div class="wrapper"><div><h1><span class="pairname" style="background-color:'+color+'">'+ number+'</span></h1>' + station.replace(/_/g, ' ') + ' <br/>' + data.result.schedules[i].message + ' ' + data.result.schedules[i].destination + '</div></div>');
			}
			$('#content').append('<hr/>')
		}
		else{
			console.log('status = ' + status);
		}

		console.log(data);
		console.log(status);
	});
}

$( document ).ready(function() {
	var a = new XMLHttpRequest();

	https://api-ratp.pierre-grimaud.fr/v3/schedules/rers/A/bussy-saint-georges/A

	initInfoStation('rers', 'A', 'bussy-saint-georges', 'A', '#eb163f');
	initInfoStation('rers', 'A', 'bussy-saint-georges', 'R', '#eb163f');

	/*initInfoStation('bus', '292', 'boulevard_des_belges', 'A', 'trans1', '#f59eb3');
	initInfoStation('bus', '292', 'boulevard_des_belges', 'R', 'trans2', '#f59eb3');
	initInfoStation('bus', '292', 'Savigny-Carnot-RER', 'R', 'trans3', '#f59eb3');
	initInfoStation('bus', '399', 'marche_de_juvisy', 'R', 'trans4', '#87d3df');
	initInfoStation('bus', '399', 'les_fleurs', 'R', 'trans5', '#87d3df');
	initInfoStation('bus', '399', 'les_fleurs', 'A', 'trans6', '#87d3df');*/

});