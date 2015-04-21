			<div class="col-sm-4 sidebar">
				<?php dynamic_sidebar( "sidebar" ); ?>
			</div>
		</div><!-- row -->
	</div> <!-- main  -->
	</div>
	<footer>
		<div class="container">
			<div class="row" >
				<div class="col-sm-5 contact-links">
					<p>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
						<img src="<?php echo bloginfo('template_url') .'/images/logo-periodico-am-footer.png' ?>" alt="Periódico Área Metropolitana">
					</a>
					<a href="http://www.metropol.gov.co" class="pull-right">
						<img src="<?php echo bloginfo('template_url') .'/images/logo-amva.png' ?>" alt="Área Metropolitana del Valle del Aburrá">
					</a>
					</p>
				</div>
				<div class="col-sm-6 copyright">
					<?php
				 		wp_nav_menu(
									array(
										'theme_location' => 'util-menu',
										'menu_class' => 'nav navbar-nav',
										'container_class' => 'menu-util-container' 
										)
									); 
					
					?>
					<p>Todos los derechos reservados Periódico Área Metropolitana 2014</p>
				</div>
				<div class="col-sm-1">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('redes-sociales') ) : ?><?php endif; ?>
				</div>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?> 
<!-- Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&appId=1416538475270198&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Twitter -->
<script type="text/javascript">
window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
</script>
<!-- G+ -->
<script src="https://apis.google.com/js/plusone.js"></script>
</body>
</html>