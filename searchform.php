<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-field">
		<label for="s_"><?php esc_html_e( 'Search for:', 'techabout' ); ?></label>
		<input type="text" value="" name="s" id="s_" class="validate" />
		<button type="submit" id="searchsubmit" class="btn waves-effect waves-light"><?php esc_html_e( 'Search', 'techabout' ); ?></button>
	</div>
</form>