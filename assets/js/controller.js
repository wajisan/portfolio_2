function initInnovations() {
	$.each(globalData.projects, function(index, value){
		//this.full_url_project = globalData.files.find(x => x.id === value.thumbnail).data.thumbnails[0].url;//thumbnail
	  	this.full_url_project = globalData.files.find(x => x.id === value.thumbnail).data.full_url;
		$('#projects').append('<div class="grid-item"><a href="'+this.link+'" target="_blank"><img src="'+this.full_url_project+'"><h3>'+this.name+'</h3><span>'+this.description+'</span></a></div>')
	});
}

function initWebsite() {
	$('#spotify-module').append(globalData.website[0].playlist);
	$('#soundcloud-module').append(globalData.website[0].soundcloud);
	$('#website-description').append(globalData.website[0].description);
}

function initPartners() {
	$.each(globalData.partners, function(index, value) {
		this.logo_url = globalData.files.find(x => x.id === value.logo).data.full_url;
		//console.log(this.logo_url);
		$('.fade-carousel').append('<div class="fade-item"><a href="'+value.link+'" target="_blank"><div class="item-inner"><img src="'+value.logo_url+'" alt="'+value.name+'"></div></div>');
	});

	$('.fade-carousel').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  autoplay: true,
	  autoplaySpeed: 2000,
	  infinite: true,
	  arrows: false,
	  mobileFirst: true,
	  fade: true,
	  responsive: [
	    {
	      breakpoint: 410,
	      settings: {
	        infinite: true,
	        dots: false
	      }
	    }]
	});
}

function initSkills() {
	var words = [];
	$.each(globalData.skills, function(index, value) {
		words.push({'word' : value.word, 'weight' : value.weight, 'color' : value.color});
		//console.log('word = ' + value.word);
		$('#wordCloud').append('<div class="skills">'+value.word+'</div>');
	});
	/*$('#wordCloud').jQWCloud({
		words: words,
	});*/
	//https://www.jqueryscript.net/text/Word-Tag-Cloud-Generator-jQWCloud.html
}