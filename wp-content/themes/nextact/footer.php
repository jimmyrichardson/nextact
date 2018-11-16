<footer>
        <div class="container">
            <img src="<?= get_stylesheet_directory_uri(); ?>/assets/img/logo.svg"
				 alt="Next Act Theatre" />
            <!--
			<div class="col-4">
                <h4>What's On</h4>
                <ul>
                    <li>
                        <a href="">One</a>
                    </li>
                    <li>
                        <a href="">One</a>
                    </li>
                    <li>
                        <a href="">One</a>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <h4>What's On</h4>
                <ul>
                    <li><a href="">One</a></li>
                    <li><a href="">One</a></li>
                    <li><a href="">One</a></li>
                </ul>
            </div>
            <div class="col-4">
                <h4>What's On</h4>
                <ul>
                    <li><a href="">One</a></li>
                    <li><a href="">One</a></li>
                    <li><a href="">One</a></li>
                </ul>
            </div>
            <div class="col-4">
                <h4>What's On</h4>
                <ul>
                    <li><a href="">One</a></li>
                    <li><a href="">One</a></li>
                    <li><a href="">One</a></li>
                </ul>
            </div>
			-->
			
			<?php wp_nav_menu('footer'); ?>
			
        </div>
        <div id="footnote">
            <p>&copy; 2018 Next Act Theater. All Rights Reserved.</p>
        </div>
    </footer>
    <div id="loading">
        <p id="progress" class="akz-cond">0</p>
        <svg width="100%" height="40%" version="1.1" xmlns="http://www.w3.org/2000/svg" class="wave">
            <path class="wave-1" d=""/>
            <path class="wave-2" d=""/>
            <path class="wave-3" d=""/>
            <path class="wave-4" d=""/>
            <path class="wave-5" d=""/>
        </svg>
    </div>
    <script type="text/javascript" src="<?= get_stylesheet_directory_uri(); ?>/assets/js/vendor.js"></script>
    <script type="text/javascript" src="<?= get_stylesheet_directory_uri(); ?>/assets/js/app.js"></script>
<?php wp_footer(); ?>
</body>
</html>
