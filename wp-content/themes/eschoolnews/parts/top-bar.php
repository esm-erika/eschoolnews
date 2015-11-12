<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<div class="top-bar-container contain-to-grid show-for-medium-up">

        <div class="title-area row show-for-large-up">
            <div class="name large-5 large-centered columns">
                <div class="show-for-large-up" style="height: 20px;"></div>
                <h1>
                    <a href="<?php echo home_url(); ?>">
                        <?php //bloginfo( 'name' ); ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/eschoolnewslogo.png"/>
                    </a>
                </h1>
            </div>
        </div>

    <div class="sticky">

        <nav class="top-bar row" data-topbar role="navigation">
            <section class="top-bar-section medium-12 columns">

                <?php foundationpress_top_bar_c(); ?>
               
            </section>
        </nav>

    </div>
</div>