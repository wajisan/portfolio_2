const globalData = {
		"links" : null,
		"website" : null,
		"projects" : null,
		"skills" : null
	}

	const client = new DirectusSDK({
	  url: "https://api.wajisan.eu",
	  project: "portfolio",
	  token : "testtest"
	});

	client.getItems("links")
	  	.then(data => {
	    	globalData.links = data.data;
	  	})
	  	.catch(error => console.error(error));

	client.getItems("website")
	  	.then(data => {
	    	globalData.website = data.data;
	    	initWebsite();
	  	})
	  	.catch(error => console.error(error));


	client.request("get", "/files")
			.then(data => {
		    	globalData.files = data.data;
		    	client.getItems("projects")
				  	.then(data => {
					    globalData.projects = data.data;
					    initInnovations();
				  	})
				  	.catch(error => console.error(error));

				client.getItems("partner")
				  	.then(data => {
				    	globalData.partners = data.data;
				    	initPartners();
				  	})
				  	.catch(error => console.error(error));
			})
			.catch(error => console.error(error));

	client.getItems("skills")
	  	.then(data => {
	    	globalData.skills = data.data;
	    	initSkills();
	  	})
	  	.catch(error => console.error(error));


	

	//console.log(globalData);