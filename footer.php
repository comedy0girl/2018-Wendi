        <footer>
    		<div class="twelve columns footer">
    			<div class="twelve columns">
			    	<span class="footer"><a href="/"><h3>Wendi <span class="light">McLendon-Covey</span> <span class="fancy">Fansite</span></h3></a></span>
			    </div>
			    <div class="footer-inner">
			    	
	        		<div class="four columns section">
	        			<?php dynamic_sidebar( 'footer-left' ); ?>
	        		</div>
	        		<div class="four columns section">
	        			<h2>Follow Us</h2>
	        			<ul class="social-links">
	        				<li><a href="https://instagram.com/wendimc_fansite/"><i class="fa fa-instagram black"></i></a></li>
	        				<li><a href="https://www.facebook.com/wendimclendoncoveyfan"><i class="fa fa-facebook-square"></i></a></li>
	        				<li><a href="https://twitter.com/wendifansite"><i class="fa fa-twitter-square"></i></a></li>
	        			</ul>
	        		</div>
	        		<div class="four columns section">
	        			<?php dynamic_sidebar( 'footer-right' ); ?>
	        		</div>
			    </div>                  
		  	</div>
	    	
        </footer>
        <div class="twelve columns footer-menu-wrapper"><?php 
			wp_nav_menu(['theme_location' => 'footer-menu' ]); ?>
		</div>
        <div class="twelve columns copyright">
        	<p> Designed and Developed by <a href="https://twitter.com/wendifansite">@wendifansite</a>.</p>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>