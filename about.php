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

?>
<html>
	<head>
		<title>About &#8211; Matt Soave</title>
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
			<div class="single-article single-article-about">
				<script>boldNav("about");</script>
				<article itemscope itemtype="http://schema.org/Article" class="cf">
					<header>
						<h1 id="page-title" itemprop="name">About</h1>
					</header>
					<aside>
						<dl>
							<div class="metadata no-comma">
								<dt>Info & Contact</dt>
								<dd><a href="assets/Matt_Soave_resume.pdf" target="_blank">Resume (PDF, 0.2 MB)</a><br />Last updated 7/2014</dd><dd>See resume for contact information</dd>
							</div>
							<div class="metadata no-comma">
								<dt>Online Profiles</dt>
								<dd><a href="http://www.linkedin.com/in/mattsoave" target="_blank">LinkedIn</a></dd><dd><a href="https://plus.google.com/+MattSoave/" target="_blank">Google+</a></dd><dd><a href="http://www.facebook.com/MattSoave" target="_blank">Facebook</a></dd><dd><a href="http://www.twitter.com/MattSoave" target="_blank">Twitter</a></dd><!--<dd><a href="http://stackoverflow.com/users/2554970/mattsoave" target="_blank">Stack&nbsp;Overflow</a></dd>-->
							</div>
							<div class="metadata">
								<dt>Skills</dt>
								<dd>User research</dd><dd>Usability analysis</dd><dd>Usability testing</dd><dd>User scenarios</dd><dd>Persona creation</dd><dd>Conceptualization & ideation</dd><dd>Wireframing</dd><dd>Visual design</dd><dd>Documentation and specifications</dd><dd>Front-end development (HTML, CSS, JavaScript)</dd><dd>Rapid prototyping</dd><dd>Analytics & conversion rate optimization</dd><dd>Information visualization</dd>
							</div>
							<div class="metadata">
								<dt>Preferred tools</dt>
								<dd>Adobe Illustrator</dd><dd>Adobe Photoshop</dd><!--<dd>Adobe Edge Animate</dd>--><dd>Axure RP</dd><dd>HTML / JavaScript / CSS</dd>
							</div>
					</aside>
					<span itemprop="articleBody">
						<section>
							<h1>Summary</h1>
<!--							<p>My name is Matt Soave. I consider myself a user experience and interaction designer, and a front-end developer when I have the time. My interests lie in learning more about how people interact with their world (and more specifically, with technology) &#8211; how do we use interfaces to interact with objects and make life easier? And more importantly, how can we improve these experiences?</p>-->
                        <p>My name is Matt Soave. I consider myself a user experience, interaction designer, and a front-end prototyper. I hold a master's degree in Human-Centered Design and Engineering, and I work as a design technologist at Amazon. I enjoy all aspects of the user experience field, and I specialize in UX design and high-fidelity prototyping.</p>
							<!--<p>I'm especially interested in the following areas:</p>
							<ul>
								<li>Data visualization</li>
								<li>UI animation</li>
								<li>Interaction design</li>
								<li>Behavioral analytics (to inform design)</li>
							</ul>-->
							<h1>About Me</h1>
                            <p>I'm currently a full-time <strong>design technologist</strong> at <strong>Amazon</strong>. I work on the Online Device Sales team, where I work on projects that help customers learn about and purchase Kindle and Fire devices. As a design technologist, I'm involved in the entire design process, including collaborating with stakeholders to gather and write requirements; designing the overarching and on-page user experiences; creating interactive prototypes with HTML, CSS, and JavaScript; and working with developers to get my designs properly implemented.</p>
                            <p> I have a M.S. in Human Centered Design and Engineering from the University of Washington. Before that, I graduated summa cum laude with a B.S. in Cognitive Science (with a specialization in Human-Computer Interaction) from the University of California, San Diego, with a GPA of 3.94.</p>
							<p>Previously, I worked as a user experience designer at a Seattle-based UX design and development agency called <strong>UpTop</strong> (a company resulting from the merger of Peak Systems and Produxs) where my work ranged from early, higher-level conceptualizations (ideation, information architecture, wireframes, etc.) to low-level, detailed design (visual design, specifications, asset production, etc.). I worked with enterprise and mid-market clients, and my work spanned multiple platforms and markets. Before that, I worked as an Associate Human-Factors Engineer at Cubic Corporation and as an Interaction Design Intern at Hewlett-Packard.</p>
                            <p>Feel free to explore my <a href="http://www.linkedin.com/in/mattsoave" target="_blank">LinkedIn account</a> to learn more about my work and academic experience, or reach out to me directly via the email address on my <a href="assets/Matt_Soave_resume.pdf" target="_blank" >resume</a>.</p>
							<p>I was introduced to the field of Human-Computer Interaction from a human perception and cognition perspective, though I also love to do front-end web development; I try to combine the two as much as I can. I approach HCI as a field meant to minimize the gap between human intention and execution &#8211; what is the most efficient and effective way for the user to accomplish a task?</p>
							<p><strong>Availability: </strong>I enjoy my current position but am always open to networking. Please take a look at my work and my resume and feel free to reach out.</p>
						</section>
						<section>
							<h1>About this Website</h1>
							<p>I hand-coded this website using HTML, PHP, a MySQL database, CSS (via <a href="http://less.github.io/" target="_blank">LESS</a>), and JavaScript (via <a href="http://jquery.com/" target="_blank">jQuery</a>). My primary goal in creating this site (beyond needing an updated portfolio) was to learn more about designing and developing responsive websites. I also wanted to try some techniques that were new to me, such as transitioning seamlessly between pages using the HTML5 history API, using more advanced CSS selectors (like <code>dd + dd + dd:last-child:before {content: ", & "; }</code>), and using a CSS pre-processor (LESS).</p>
						</section>
					</span>
				</article>
			</div>
		</main>
		
	</body>
</html>