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
	        			
	        			<ul class="social-links">
	        				<li><a href=""><i class="fa fa-instagram black"></i></a></li>
	        				<li><a href=""><i class="fa fa-facebook-square"></i></a></li>
	        				<li><a href=""><i class="fa fa-twitter-square"></i></a></li>
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