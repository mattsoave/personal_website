<!DOCTYPE html>
<?php


	include_once('config.php');

	if(!($id = $_GET["id"])) {
		$id = 0;
	}
				

	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	
	$query = "SELECT * FROM projects WHERE id = $id";
	$result = mysql_query($query) or die(mysql_error());
	
	$row = mysql_fetch_array($result);
	
	// Get Next and Previous by date
	$thisDate = $row["enddate"];
	// Next
	$query = "SELECT * from projects where enddate > '" . $thisDate . "' AND hide = 0 ORDER BY enddate ASC LIMIT 1";
	$result = mysql_query($query) or die(mysql_error());
	$nextRow = mysql_fetch_array($result);
	$nextID = $nextRow["id"];
	// Previous
	$query = "SELECT * from projects where enddate < '" . $thisDate . "' AND hide = 0 ORDER BY enddate DESC LIMIT 1";
	$result = mysql_query($query) or die(mysql_error());
	$prevRow = mysql_fetch_array($result);
	$prevID = $prevRow["id"];
	
	$title = $row["fullname"];
	
	if ($row["color"] == "") { 
		$color1 = "rgba(102, 102, 102, 1)"; 
		$color2 = "rgba(102, 102, 102, .5)"; 
	} else {
		$color1 = "rgba(" . $row["color"] . ", 1)";
		$color2 = "rgba(" . $row["color"] . ", .5)";
	}
	
	$imageCaptions = $row["imageCaptions"];
	$directory = $row["directory"];
	
	function displayImage($imageName) {
		global $imageCaptions, $directory;
		$delimiter = "[" . $imageName . "]";
		$caption = explode($delimiter, $imageCaptions);
		$caption = explode("\n", $caption[1]);
		$caption = $caption[0];
		return '<figure><img src="/projects/' . $directory . "/" . $imageName . '" /><figcaption>' . $caption . '</figcaption></figure>';
	}
	
	function addImagesCallback($matches) {
		return displayImage($matches[1]);
	}
	
	function addImages($sectionContent) {
		$pattern = '#\[image=(.*?)\]#';
		return preg_replace_callback($pattern, "addImagesCallback", $sectionContent);
	}
	
	
	
	//Array ( [0] => [image=sup] [1] => sup ) Array ( [0] => [image=hey] [1] => hey ) donefillerdone
?>
<html>
	<head>
		<title><?php echo strip_tags($title); ?> &#8211; Matt Soave</title>
		<?php include_once "header_elements.php"; ?>
	</head>
	<body>
		<header id="main-header">
			<div id="header-container">
				<p id="home-hider-1" class="home-hiders">Hi. I'm </p>
				<h1><a href="index.php">Matt&nbsp;Soave </a></h1> 
				<p id="home-hider-2" class="home-hiders">I'm an </p>
				<p id="job-title"><span>Interaction&nbsp;+&nbsp;User&nbsp;Experience&nbsp;Designer </span></p>
				<p id="home-hider-3" class="home-hiders">and sometimes a front-end developer. </p>
				<p id="home-hider-4" class="home-hiders">I enjoy learning about how people interact with their world and working to improve those experiences. I'm particularly interested in analytics-driven design and data visualization. </p>
				<img src="assets/nav-icon-projects.svg" class="nav-icons home-hiders" id="nav-icon-projects" /><a href="projects.php" id="nav-1" class="navs">Projects</a><p id="home-hider-5" class="home-hiders home-nav-descs"> - See the work I've done. </p>
				<img src="assets/nav-icon-writing.svg" class="nav-icons home-hiders" id="nav-icon-writing" /><a href="writing.php" id="nav-2" class="navs">Writing</a><p id="home-hider-6" class="home-hiders home-nav-descs"> - Read some of my (admittedly infrequent) writing. </p>
				<img src="assets/nav-icon-about.svg" class="nav-icons home-hiders" id="nav-icon-about" /><a href="about.php" id="nav-3" class="navs">About</a><p id="home-hider-7" class="home-hiders home-nav-descs"> - Learn more about me and the work I like to do. </p>
				<div id="home-screen"></div>
			</div>
		</header>
		<main class="cf" role="main">
			
			<div class="single-article single-article-project">
				<script>boldNav("projects");</script>
				<p class="up-one-level"><a href="projects.php">&laquo; Back to Projects</a></p>
				<article class="cf" style="border-top:20px solid <?php echo $color1; ?>">
				<!--<article class="cf" style="border-top-color: <?php echo $color1; ?>; border-bottom-color: <?php echo $color2; ?>;">-->
				<!--<article class="cf" style="border-top-color: rgb(0, 114, 197); border-bottom-color: rgba(0, 114, 197, 0.5);">-->
					<header>
						<h1 id="page-title" itemprop="name"><?php echo $title; ?></h1>
						<?php if ($via = $row["via"]) { ?>
								<p><?php echo $via; ?></p>
								<?php } ?>
								
					</header>
							
					<aside>
						<!-- THIS NEEDS TO BE RELATIVE LATER -->
						<?php if ($row["nologo"] != 1) { ?><img src="/projects/<?php echo $directory; ?>/logo.svg" /> <?php } ?>
						<dl>
						
							<?php if ($datetext = $row["datetext"]) { ?>
							<div class="metadata">
							<dt>Date</dt>
							<dd><?php echo $datetext; ?></dd></div>
							<?php } ?>
							
							<?php if ($client = $row["client"]) { ?>
							<div class="metadata">
							<dt>Client</dt>
							<dd><?php echo $client; ?></dd></div>
							<?php } ?>
							
							<?php if ($platform = $row["platform"]) { ?>
							<div class="metadata">
							<dt>Platform</dt>
							<dd><?php echo $platform; ?></dd></div>
							<?php } ?>
							
							<?php if ($row["tasks"]) { ?>
							<div class="metadata">
							<dt>Tasks</dt>
							<?php 
								$tasks = preg_split("/\r\n|\n|\r/", $row["tasks"]);
								foreach($tasks as $value) {
									echo "<dd>";
									echo $value;
									echo "</dd>";
								}?> </div> <?php
							} ?>
							
							
							<?php if ($row["tools"]) { ?>
							<div class="metadata">
							<dt>Tools</dt>
							<?php 
								$tools = preg_split("/\r\n|\n|\r/", $row["tools"]);
								foreach($tools as $value) {
									echo "<dd> ";
									echo $value;
									echo "</dd>";
								}?> </div> <?php
							} ?>
							
							<?php if ($row["collaborators"]) { ?>
							<div class="metadata">
							<dt>Collaborators</dt>
							<?php 
							
								// split collaborators field into each person
								$collaborators = preg_split("/\r\n|\n|\r/", $row["collaborators"]);
								foreach($collaborators as $value) {
									echo "<dd>";
									$collabComponents = explode("http", $value);
									if (count($collabComponents) > 1 ) {
										echo '<a href="http' . $collabComponents[1] . '" target="_blank">' . trim($collabComponents[0]) . '</a>';
										
									} else  {
										echo $value;
									}
									echo "</dd>";
								}?> </div> <?php
							} ?>
						</dl>
					</aside>
					
					<!-- Summary -->
					<section>
						<h1>Summary</h1>
						<?php echo $row["overview"]; ?></p>
						<?php 
							// Links
							if ($row["linkURLs"] != "") {
								echo "<div class='link-container'>";
								echo "<p>Project Links</p><ol>";
								$linkURLs = explode("\n", $row["linkURLs"]);
								$linktexts = explode("\n", $row["linktexts"]);
								
								for ($i = 0; $i < count($linkURLs); $i++) {
									echo "<li>";
									//echo "Link " . ($i+1) . ": ";
									echo "<a href='" . $linkURLs[$i] . "' target='_blank'>" . $linktexts[$i] . "</a>";
									if ($i + 1 != count($linkURLs)) {
										echo "</li>";
									}
								}
								echo "</ol>";
								echo "</div>";
							}
							
							if (strpos($imageCaptions, 'main') !== false) {
								echo addImages("[image=main.jpg]");
							}

						
						?>
						<!--<?php if ($row["numphotos"] > 0) { ?><p><a href="#">Skip to images...</a></p><?php } ?>-->
					</section>
					
					<!-- Problem -->
					<?php if ($row["problem"] != "") { ?>
					<section>
						<h1>Problem</h1>
						<?php 
							echo addImages($row["problem"]);
						?>
					</section>
					<?php 
						}
					?>
					
					<!-- Process -->
					<?php if ($row["process"] != "") { ?>
					<section>
						<h1>Process</h1>
						<?php 
							echo addImages($row["process"]);
						?>
					</section>
					<?php 
						}
					?>
					
					<!-- Results -->
					<?php if ($row["results"] != "") { ?>
					<section>
						<h1>Results</h1>
						<?php 
							echo addImages($row["results"]);
						?>
					</section>
					<?php 
						}
					?>
				</article>
				<?php if ($nextID != "") { ?>
					<p class="prev"><a href="project.php?id=<?php echo $nextID; ?>">&laquo; Next: <?php echo $nextRow["fullname"];?></a></p>
				<?php }
				if ($prevID != "") { ?>				
					<p class="next"><a href="project.php?id=<?php echo $prevID; ?>">Previous: <?php echo $prevRow["fullname"];?> &raquo;</a></p>
				<?php } ?>
			</div>
		</main>
		
	</body>
</html>