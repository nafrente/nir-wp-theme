<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>

</head>

<body class="front-page">

<header name="top" style="background-color: #26C1DC; background-image:url('<?php echo get_template_directory_uri(); ?>/img/homepage1.jpg');">
    <div class="container">
    <nav>
        <div class="branding"><a href="index.php"><?php echo file_get_contents( get_template_directory_uri() . "/svg/nir-01.svg"); ?><span>Newport Integrated <br />Resiliency</span></a></div>
        <ul>
            <li><a href="#">About</a></li>
            <li><a href="#">Model</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Newport</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    </div>
</header>
<div class="paper-edge"></div>
<div class="main">
    <div class="container">
        <article class="home">
            <div class="abstract">
                <h1>We envision a bright future where today’s local solutions are tomorrow’s foundation for global sustainability.</h1>
            </div>
            
            <div class="portfolio-carousel">
                <h2>The Newport Integrated Resiliency Portfolio</h2>
                <ul>
                    <li><a href="#" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/picture.jpg);"><span>Resilience Innovation Hub</span></a></li>
                    <li><a href="#" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/sheffield1.jpg);"><span>Sheffield Project</span></a></li>
                </ul>
                <a href="#" class="btn">All Projects</a>
            </div>
            
            <div class="mission">
                <h2>The Newport Integrated Resiliency Model</h2>
                <p>Newport’s model of integrated resiliency is a response to challenges, and synergy of opportunities among the built/natural environment, economics, social/political, educational, health and cultural sub-systems.</p>
                <a href="model.php" class="btn">Read Model Details</a>
            </div>
            
            <div class="about-newport">
                <h2>About Newport, RI</h2>
                <p>Newport, a world famous historic city, located on the New England coast between New York City and Boston, is poised to offer itself as a demonstration location for the development and implementation of a national resilience model.  Newport’s goal is to use the next 25 years, in preparation for its 400th Anniversary, to position itself as the representative ecosystem for global thought leadership and the applied innovation center for integrated resilience.</p>
                <a href="#" class="btn">Model Residency</a>
            </div>
        </article>
        
    </div>
</div>
    
<footer>
    <div class="container">
        <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> Return to Top</a>
        <p class="copyright">&copy; 2015 Worldways, Inc.</p>
    </div>
</footer>
    
    <input type="checkbox" id="trigram-trigger" class="trigram-trigger" />
<label for="trigram-trigger">Menu</label>
    
<div class="off-canvas">
    <ul>
        <li><a>Newport Integrated <br />Resiliency <br /></a></li>
        <li><a href="#">About</a></li>
        <li><a href="model.php">Model</a></li>
        <li><a href="#">Portfolio</a></li>
        <li><a href="#">Newport</a></li>
        <li><a href="#">Contact</a></li>
</ul>
</div>
    
<?php wp_footer(); ?>
</body>
</html>