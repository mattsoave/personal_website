$(document).ready(function(){
	bindLinks();
	
	/*// Dots on click
	$(document).on('click touchend', function(e) {
		$("<div class='click'></div>")
			.appendTo("body")
			.css({
				"top":(e.pageY-16),
				"left":(e.pageX-16)
				})
			.delay(500)
			.queue(function(){
				$(this).remove();
			});
	});*/
});

// This doesn't work if the user goes from page A to B, refreshes B, then presses back.
// Might also need to address anchor links.

// Set a flag to prevent this from happening on page load.
var popFlag = false;
$(window).on("popstate", function(e) {
	console.log("pop");
	// Only do this after the page has loaded. Chrome will call this on the initial page load.
	if (popFlag) {
		// Get the very end of the URL (minus any paths).
		var newURL = location.pathname.split("/").pop() + location.search;
		console.log(newURL);
		swap(newURL, true);
	}
});

function bindLinks() {
	// Unbind any remaning links, then bind all links with a click function
	$("a").off().on("click", function(e) {
		popFlag = true;
		console.log(popFlag);
		// Only on left mouse button clicks (i.e. not middle clicks, which should open in a new tab per standard behavior)
		if (e.which == 1 && $(this).attr("target") != "_blank") {
			// Get the URL of this link...
			var newURL = $(this).attr("href");
			// ... and run the swap() function.
			swap(newURL, false);
			scrollPosition.push($("html").scrollTop());
			
			e.preventDefault();
		}
		
	});
}

var scrollPosition = new Array();

// Function takes the URL and whether it's invoked by the browser's navigation.
// The second parameter is used so that the function doesn't push a new history state when going back or forward.
function swap(newURL, back) {
	
	// Need to figure this out........
	/*$.get('projects.php', function (data) {
		//data2 = $(data).find("main > div");
		
		//var swapData = $("main", data).html();
		//var swapData = $(data).html();
		//console.log(data);
		//console.log(data);
		data = $.parseHTML(data);
		console.log(data);
		var maindiv = $.parseHTML($("div", $(data))[0]).html();
		console.log(typeof maindiv);
	});*/
	
	// Run a separate process for the homepage
	if (newURL == "index.php" || newURL == "") {
		
		$(".navs").removeClass("nav-active");
		
		// Set a timeout to animate the header after the fade-out is complete
		setTimeout(function() {
			
			// Add the 'home' class to the header so that it animates
			$("header").addClass("home");
			if (!back) {
				// What was the split for?
				history.pushState(null, null, newURL.split("/")[0]);
			}
			
			// Change the page's title
			document.title = "Matt Soave \u2013 User Experience & Interaction Designer";
		}, 500);
		
	} else {
		// Remove the 'home' positioning of the header, if it exists
		$("header").removeClass("home");
		
		// Get the contents of the clicked URL...
		$.get(newURL, function (data) {
			// ... and only return what's in the "main" element
			var swapData = $(data).filter('main');
			// Append that data to the "main" element on the current page
			var incoming = $(swapData.html()).appendTo("main");
			// Assign an 'incoming' ID so that it fades in (?)
			$(incoming).attr("id", "incoming");
			$(incoming).addClass("hide");
			// Re-bind links so that the links of the new page respond to clicks properly.
			bindLinks();
			
			setTimeout(function() {					
				// needs to be conditional on whether data is loaded
				$("#incoming").removeClass("hide");	
				if (!back) {
					history.pushState(null, null, newURL.split("/")[0]);
				}
				
				// Change the page's title
				var pageTitle = $("#page-title").text();
				document.title = pageTitle + " \u2013 Matt Soave";
			}, 550);
			
			setTimeout(function() {
				// Remove the "incoming" designation after the fade-in is complete
				$("main > div#incoming").attr("id", "");
			}, 950);
		});
		
	}
	
	
	// Designate the existing div as outgoing
	$("main > div").attr("id", "outgoing");
	// Fade out the outgoing content
	$("#outgoing").addClass("hide");
	
	
	
	//var incoming = $("main").append();
	
	// If the user goes back, scroll to the 
	if (back) {
		setTimeout(function() {
				console.log("back");
				//$.scrollTo(0, scrollPosition.pop());
				window.scrollTo(0, scrollPosition.pop());
		}, 500);
	} else {
		console.log('else');
		// scroll to top of Main if the viewport is below the bottom of the header (once animation is complete)
		setTimeout(function() {
			if($(window).scrollTop() > $("main").offset().top) {
				//$.scrollTo($("main"));
				window.scrollTo(0, $("main").offset().top);
			}
		}, 500);
		
		
	}
	
	// Remove the previous page's contents once it is invisible
		setTimeout(function() {
			$("main > div#outgoing").remove();
			
		}, 550);
	
}