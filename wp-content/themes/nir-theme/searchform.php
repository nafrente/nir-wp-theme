
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/'); ?>" >
    <div class="search-input-group">
        <input type="text" placeholder="Search" class="input-txt" name="s" id="search" value="<?php echo get_search_query(); ?>">
        <span class="search-btn">
            <input type="submit" class="btn" id="searchsubmit" value=""></input><i class="fa fa-search" aria-hidden="true"></i>
        </span>
    </div>
</form>