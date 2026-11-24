
		function AbreHam() {
		  var Ham = document.getElementById("Ham");
		 

		  if (Ham.style.display === "none") {
			Ham.style.display = "block";
			Sob.style.display = "none";
			Beb.style.display = "none";
			Promo.style.display = "none";
		  }
		 
		};

		

		function AbreSob() {
		var Sob = document.getElementById("Sob");

		if (Sob.style.display === "none") {
			Ham.style.display = "none";	
			Sob.style.display = "block";
			Beb.style.display = "none";
			Promo.style.display = "none";
		  }
		 
		  };
		 

		  function AbreBeb() { 
			var Beb = document.getElementById("Beb");
 		 if (Beb.style.display === "none") {
			Ham.style.display = "none";
			Sob.style.display = "none";
			Beb.style.display = "block";
			Promo.style.display = "none";
		  } };

		  function AbrePromo() {
			 var Promo = document.getElementById("Promo");
		if (Promo.style.display === "none") {
			Ham.style.display = "none";	
			Sob.style.display = "none";
			Beb.style.display = "none";
			Promo.style.display = "block";
		  }
		  };

		  function AbreAco() {
			var Aco = document.getElementById("Aco");
		   
			if (Aco.style.display === "none") {
			  Ham.style.display = "none";	 
			  Sob.style.display = "none";
			  Beb.style.display = "none";
			  Promo.style.display = "none";
			   Aco.style.display = "block";
			}
		   
		  };