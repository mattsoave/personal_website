<?php
	include_once('config.php');

	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	
	
	$query = "SELECT * FROM blog";
	
	
	$query .= " ORDER BY date DESC";
	
	$result = mysql_query($query) or die(mysql_error());
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Writing &#8211; Matt Soave</title>
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
			<div class="multi-articles multi-articles-writing cf">
				<script>boldNav("writing");</script>
				<!--<p class="up-one-level"><a href="index.php">&laquo; Up One Level (Home)</a></p>-->
				<header><h1 id="page-title">Writing</h1></header>
				
				<?php
					
					$i = 0;
					while($row = mysql_fetch_array($result)){
						if ($row["hide"] != 1) {
							if ($row["color"] == "") { 
								$color1 = "rgba(102, 102, 102, .9)"; 
								$color2 = "rgba(102, 102, 102, .5)"; 
							} else {
								$color1 = "rgba(" . $row["color"] . ", .9)";
								$color2 = "rgba(" . $row["color"] . ", .5)";
							}
							
				?>
				
				<a href="post.php?id=<?php echo $row['id']; ?>">
					<article 
					 <?php if ($row["image"]) { ?>
					 style="background-image: url('<?php echo $row["image"]; ?>')"
					 <?php } ?>
					>
						<header style="background-color:<?php echo $color1; ?>"><h1><?php echo $row['title']; ?></h1><p><?php echo date("F j, Y",strtotime($row['date'])); ?></p></header>
						
						<!--<?php echo $row["summary"]; ?>-->
						
						
					</article>
				</a>
				
				<?php
						}
					}
				?>
				
			</div>
		</main>
	</body>
</html>