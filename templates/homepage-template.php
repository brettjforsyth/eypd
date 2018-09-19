<?php
/**
 * Early-Years Theme: homepage template
 *
 * Modified from original header template in cbox theme
 * @author Brad Payne
 * @package early-years
 * @since 0.9
 * @license https://www.gnu.org/licenses/gpl.html GPLv3 or later
 *
 * Original:
 * @author Bowe Frankema <bowe@presscrew.com>
 * @copyright Copyright (C) 2010-2011 Bowe Frankema
 */

infinity_get_header();

?>
<div class="flex-column">
    <div class="c-banner">
        <div class="center">
            <img class="eypd_logo"
                 src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/eypd-logo-final.svg"
                 alt="EYPD logo">
            <img class="eypd_logo_text"
                 src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/eypd-logo-final-text.svg"
                 alt="EYPD logo text">
        </div>
    </div>
</div>
<div class="c-search">
    <h2 class="text-blue text-center">Search for training events</h2>
    <p class="text-center">Fill in one or more of the fields below</p>
	<?php echo do_shortcode( '[events_search]' ); ?>
</div>
<div class="c-map row">
	<div class="row justify-content-center align-self-center">
		<h2 class="text-blue">Find training events near you</h2>
	</div>
	    <!-- tabs start -->
	    <div id="tabs" class="col-sm-6">
		    <ul class="nav nav-tabs" id="myTab" role="tablist">
			    <li class="nav-item">
				    <a class="nav-link active" id="upcoming-tab" data-toggle="tab" href="#upcoming" role="tab"
				       aria-controls="home" aria-selected="true">Upcoming Events</a>
			    </li>
			    <li class="nav-item">
				    <a class="nav-link" id="recent-tab" data-toggle="tab" href="#recent" role="tab"
				       aria-controls="profile" aria-selected="false">Recently Posted</a>
			    </li>
		    </ul>
		    <div class="tab-content" id="myTabContent">
			    <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
				    <?php
				    $events_list = '[events_list scope="after-today" limit="4"]';
				    echo do_shortcode( $events_list );
				    ?>
			    </div>
			    <div class="tab-pane fade" id="recent" role="tabpanel" aria-labelledby="recent-tab">
				    <?php
				    // documentation http://wp-events-plugin.com/documentation/event-search-attributes/event-location-grouping-ordering/
				    $events_recent = '[events_list orderby="event_date_created" order="DESC" groupby="location_id" groupby_orderby="event_date_created" groupby_order="DESC" limit="4"]';
				    echo do_shortcode( $events_recent );
				    ?>
			    </div>
		    </div>
	    </div>
	<!-- tabs end -->

    <div class="col-sm-6">
		<?php
		infinity_load_template( 'templates/google-map.php' );
		?>
        <h2 class="text-center"><a class="text-gray" href="events"><?php eypd_display_count_events(); ?> Training Events
                Currently Posted</a></h2>
    </div>
</div>
<div id="content" role="main" class="sixteen columns">
	<?php
	do_action( 'open_content' );
	do_action( 'open_home' );
	?>

    <h2 class="text-blue text-center">Explore the professional learning showcase</h2>
	<?php infinity_load_template( 'templates/featured-stories.php' ); ?>

	<?php
	do_action( 'close_home' );
	do_action( 'close_content' );

	?>
</div>
<?php
infinity_get_footer();
?>
