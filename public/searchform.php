<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
	<input type="search" class="search-field search-form__input" placeholder="サイト内検索" value="<?php echo $_GET['s']; ?>" name="s">
	<button type="submit" class="search-submit search-form__button"><i class="fas fa-search"></i></button>
</form>
