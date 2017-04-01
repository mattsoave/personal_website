<meta name="viewport" content="width=device-width, user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="author" href="https://plus.google.com/u/0/103520907987098229443">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700|Roboto+Slab:100,300,400,700|Roboto+Condensed:400italic,700italic,400,700' rel='stylesheet' type='text/css'>
<link href='stylesheets/reset.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/clearfix.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/global.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/header.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/multiple-articles.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/multiple-articles-projects.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/single-article.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/single-article-project.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/single-article-writing.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/single-article-about.css' rel='stylesheet' type='text/css'>
<link href='stylesheets/hide.css' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/plugins/scrollTo-min.js"></script>
<script src="js/main.js"></script>
<script>
	function boldNav(section) {
		$(".navs").removeClass("nav-active");
		var navItem = "#nav-";
		switch (section) {
			case "projects":
				navItem += "1";
				break;
			case "writing":
				navItem += "2";
				break;
			case "about":
				navItem += "3";
				break;
			default:
				break;
		}
		
		$(navItem).addClass("nav-active");
	}
</script>
<style>
	div.click { 
		width: 32px; 
		height: 32px; 
		border-radius: 16px; 
		background-color: #0080ff; 
		animation: click .3s;
		opacity: 0;
		position: absolute;
		z-index: 3;
	}
	
	@-webkit-keyframes click {
		0% {
			-webkit-transform:scale(0);
			opacity: .75;
		}
		50% {
			opacity: .75;
		}
		100% {
			-webkit-transform:scale(1);
			opacity: 0;
		}
	}
</style>
<link rel="shortcut icon" href="assets/favicon.png" />