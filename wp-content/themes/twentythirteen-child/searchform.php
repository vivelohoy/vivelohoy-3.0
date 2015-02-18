<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
<input type="text" class="field" name="s" placeholder="BUSCAR ..." value="<?php echo esc_attr( get_search_query() ); ?>" />
</form>