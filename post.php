<!DOCTYPE html>
<?php


	include_once('config.php');

	if(!($id = $_GET["id"])) {
		$id = 0;
	}

	mysql_connect($hostname,$username, $password) OR DIE ('Unable to connect to database! Please try again later.');
	mysql_select_db($dbname);
	
	$query = "SELECT * FROM blog WHERE id = $id";
	$result = mysql_query($query) or die(mysql_error());
	
	$row = mysql_fetch_array($result);
	$title = $row["title"];
	
	// Get Next and Previous by date
	$thisDate = $row["date"];
	// Next
	$query = "SELECT * from blog where date > '" . $thisDate . "' AND hide = 0 ORDER BY date ASC LIMIT 1";
	$result = mysql_query($query) or die(mysql_error());
	$nextRow = mysql_fetch_array($result);
	$nextID = $nextRow["id"];
	// Previous
	$query = "SELECT * from blog where date < '" . $thisDate . "' AND hide = 0 ORDER BY date DESC LIMIT 1";
	$result = mysql_query($query) or die(mysql_error());
	$prevRow = mysql_fetch_array($result);
	$prevID = $prevRow["id"];
	if ($row["color"] == "") { 
		$color1 = "rgba(102, 102, 102, 1)";
	} else {
		$color1 = "rgba(" . $row["color"] . ", 1)";
	}

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
				<img src="assets/nav-icon-writing.svg" class="nav-icons home-hiders" id="nav-icon-writing" /><a href="writing.php" id="nav-2" class="navs">Writing</a><p id="home-hider-6" class="home-hiders home-nav-descs"> - Read some of my writing. </p>
				<img src="assets/nav-icon-about.svg" class="nav-icons home-hiders" id="nav-icon-about" /><a href="about.php" id="nav-3" class="navs">About</a><p id="home-hider-7" class="home-hiders home-nav-descs"> - Learn more about me and the work I like to do. </p>
				<div id="home-screen"></div>
			</div>
		</header>
		<main class="cf" role="main">
			<div class="single-article single-article-writing">
				<script>boldNav("writing");</script>
				<p class="up-one-level"><a href="writing.php">&laquo; Back to Writing</a></p>
				<article itemscope itemtype="http://schema.org/Article" class="cf" style="border-top:20px solid <?php echo $color1; ?>">
					<header>
						<h1 id="page-title" itemprop="name"><?php echo $title; ?></h1>
						<p><time datetime="<?php echo $row["date"];?>" itemprop="datePublished" pubdate><?php echo date("F j, Y", strtotime($row["date"])); ?></time></p>
					</header>
					<!--<span itemprop="articleBody" class="entry-content">-->
						<?php echo $row["text"]; ?>
					<!--</span>-->
				</article>
				<?php if ($nextID != "") { ?>
					<p class="prev"><a href="post.php?id=<?php echo $nextID; ?>">&laquo; Next: <?php echo $nextRow["title"];?></a></p>
				<?php }
				if ($prevID != "") { ?>				
					<p class="next"><a href="post.php?id=<?php echo $prevID; ?>">Previous: <?php echo $prevRow["title"];?> &raquo;</a></p>
				<?php } ?>
			</div>
		</main>
		
	</body>
</html>