<?php

//enqueue scripts and styles *use production assets. Dev assets are located in  /css and /js
function loadup_scripts() {
    wp_enqueue_script( 'text-gradient', get_template_directory_uri().'/js/pxgradient-1.0.3.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'match-height', get_template_directory_uri().'/js/jquery.sidr.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'sidr-min', get_template_directory_uri().'/js/jquery.matchHeight.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true );
    wp_enqueue_style('fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.1/css/font-awesome.min.css', true);
    wp_enqueue_style('sidr-css', get_template_directory_uri().'/css/jquery.sidr.bare.css', true);
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('background-fullscreen', 1800, 1200, true);
add_image_size('short-banner', 1800, 800, true);

add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

//Add ACF Pro options page
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

//Add/Change excerpt
function new_excerpt_more( $more ) {
  return '...  <div class="read-more"><a class="cta-link" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Explore radio science', 'your-text-domain' ) . '</a></div>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Header and breadcrumb trail heirarchy',
        'social_nav' => 'Social menu used throughout',
        'gateway_nav' => 'Global gateway nav'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );


add_shortcode('callout', 'my_shortcode_function' );
   function my_shortcode_function($atts, $content = null) {
        //$content_array = preg_split('~\s* \s*~', $content);
        //$return_array = array();
        //foreach($content_array as $arr){
              //$return_array[] = '<span class="s_callout">'.$arr.'</span>';
        //}
        //return implode($return_array);

        $loc = get_template_directory_uri('/');

        return '<div class="separator"><img src="'.$loc.'/img/squiggle-underline.png"></div>'.
         '<h2 class="text-gradient gradient" bottomColor="#a44fdf" topColor="#87e442"">' . $content . '</h2>'.
         '<div class="separator"><img src="'.$loc.'/img/squiggle-underline.png"></div>';
   }


//Events calendar stuff

/*
 * Alters event's archive titles
 */
function tribe_alter_event_archive_titles ( $original_recipe_title, $depth ) {

    // Modify the titles here
    // Some of these include %1$s and %2$s, these will be replaced with relevant dates
    $title_upcoming =   'Upcoming Events'; // List View: Upcoming events
    $title_past =       'Past Events'; // List view: Past events
    $title_range =      '%1$s - %2$s'; // List view: range of dates being viewed
    $title_month =      '%1$s'; // Month View, %1$s = the name of the month
    $title_day =        '%1$s'; // Day View, %1$s = the day
    $title_all =        'All events for %s'; // showing all recurrences of an event, %s = event title
    $title_week =       'Events for week of %s'; // Week view

    // Don't modify anything below this unless you know what it does
    global $wp_query;
    $tribe_ecp = Tribe__Events__Main::instance();
    $date_format = apply_filters( 'tribe_events_pro_page_title_date_format', tribe_get_date_format( true ) );

    // Default Title
    $title = $title_upcoming;

    // If there's a date selected in the tribe bar, show the date range of the currently showing events
    if ( isset( $_REQUEST['tribe-bar-date'] ) && $wp_query->have_posts() ) {

        if ( $wp_query->get( 'paged' ) > 1 ) {
            // if we're on page 1, show the selected tribe-bar-date as the first date in the range
            $first_event_date = tribe_get_start_date( $wp_query->posts[0], false );
        } else {
            //otherwise show the start date of the first event in the results
            $first_event_date = tribe_event_format_date( $_REQUEST['tribe-bar-date'], false );
        }

        $last_event_date = tribe_get_end_date( $wp_query->posts[ count( $wp_query->posts ) - 1 ], false );
        $title = sprintf( $title_range, $first_event_date, $last_event_date );
    } elseif ( tribe_is_past() ) {
        $title = $title_past;
    }

    // Month view title
    if ( tribe_is_month() ) {
        $title = sprintf(
            $title_month,
            date_i18n( tribe_get_option( 'monthAndYearFormat', 'F Y' ), strtotime( tribe_get_month_view_date() ) )
        );
    }

    // Day view title
    if ( tribe_is_day() ) {
        $title = sprintf(
            $title_day,
            date_i18n( tribe_get_date_format( true ), strtotime( $wp_query->get( 'start_date' ) ) )
        );
    }

    // All recurrences of an event
    if ( function_exists('tribe_is_showing_all') && tribe_is_showing_all() ) {
        $title = sprintf( $title_all, get_the_title() );
    }

    // Week view title
    if ( function_exists('tribe_is_week') && tribe_is_week() ) {
        $title = sprintf(
            $title_week,
            date_i18n( $date_format, strtotime( tribe_get_first_week_day( $wp_query->get( 'start_date' ) ) ) )
        );
    }

    if ( is_tax( $tribe_ecp->get_event_taxonomy() ) && $depth ) {
        $cat = get_queried_object();
        $title = '<a href="' . esc_url( tribe_get_events_link() ) . '">' . $title . '</a>';
        $title .= ' &#8250; ' . $cat->name;
    }

    return $title;
}
add_filter( 'tribe_get_events_title', 'tribe_alter_event_archive_titles', 11, 2 );

add_filter( 'tribe-events-bar-filters',  'setup_my_field_in_bar', 1, 1 );

// $cats = get_the_terms('tribe_events_cat');
//
$new_cats = "";
//
// var_dump($cats);

// $new_cats = $new_cats . " " . $cat;

// foreach($cats as $cat) { var_dump($cat->name);  }

function setup_my_field_in_bar( $filters ) {

    $taxonomy =  'tribe_events_cat';
    $event_query = get_terms($taxonomy);
    foreach ($event_query as $event_cat){
                $new_filter='';
                 $new_filter .=  '<li>'.$event_cat->name.'</li>';}
                 var_dump($new_filter);
    $filters['tribe-bar-my-field'] = array(
        'name' => 'tribe-bar-date',
        'caption' => 'Filter by',
        'taxonomy' => $new_filter,
        //'taxonomy' => '<li><a href="http://localhost:8888/greenbank/events/category/'.$event_cat->slug.'">'.$event_cat->name.'</a></li>',
        'html' => '<ul name="tribe-bar-date-filter" id="tribe-bar-date-filter"></ul>'

    );

    return $filters;
}

 add_filter( 'tribe_events_pre_get_posts', 'setup_my_bar_field_in_query', 10, 1 );

 function setup_my_bar_field_in_query( $event_query ){
     if ( !empty( $_REQUEST['tribe-bar-my-field'] ) ) {
        $event_query =  'Query found!';
           // $taxonomy = 'tribe_events_cat';
           //  var_dump($taxonomy);
           //  $event_query = get_terms($taxonomy)->name;
           //  var_dump($event_query);
           //  foreach ($event_query as $event_cat){
           //      echo '<li>'.$event_cat->name.'</li>';
           //  }
        //$event_query = tribe_get_events();
//         $args = array(
//             'post_type'=>'tribe_events',
//             //'eventDisplay' => 'upcoming',
//             //'tax_query' => array(
//                          //array(
//                              //'taxonomy' => 'tribe_events_cat',
//                              //'field' => 'slug',
//                             // 'terms' => array('meetings'),
//                             //'operator' => 'NOT IN'
//                         //)
//             //),
//             'order' => 'ASC',
//             'posts_per_page' => 1,
//             //'orderby' => 'event_date'


//                                 );
//         $event_query  = new WP_Query($args);

//         while ($event_query->have_posts()) : $events_query->the_post();

//             $categories = get_terms('tribe_events_cat');
//         foreach($categories as $category){
//             echo '<li>'.$category->slug.'</li>';
//         }

//             // echo '<li></li>';
//             endwhile;


    }

    //return $event_query;
//     var_dump($event_query);
}

add_filter( 'tribe-events-bar-filters',  'remove_date_from_bar', 1000, 1 );

function remove_date_from_bar( $filters ) {
  if ( isset( $filters['tribe-bar-date'] ) ) {
        unset( $filters['tribe-bar-date'] );
    }

    return $filters;
}

/**
 * Quick example of adding a custom filter
 * A simple copy and paste of the existing Category filter
 * Refer to the last line for how it adds itself to the interface
 * Find this new filter in: WP Admin > Events > Settings > Filterbar
 * Docs for TribeEventsFilter: http://docs.tri.be/Filter-Bar/class-TribeEventsFilter.html
 */
// class TribeEventsFilter_Custom extends TribeEventsFilter {
//         public $type = 'select';
 
//         public function get_admin_form() {
//                 $title = $this->get_title_field();
//                 $type = $this->get_type_field();
//                 return $title.$type;
//         }
 
//         protected function get_type_field() {
//                 $name = $this->get_admin_field_name('type');
//                 $field = sprintf( __( 'Type: %s %s', 'tribe-events-filter-view' ),
//                         sprintf( '<label><input type="radio" name="%s" value="select" %s /> %s</label>',
//                                 $name,
//                                 checked( $this->type, 'select', false ),
//                                 __( 'Dropdown', 'tribe-events-filter-view' )
//                         ),
//                         sprintf( '<label><input type="radio" name="%s" value="checkbox" %s /> %s</label>',
//                                 $name,
//                                 checked( $this->type, 'checkbox', false ),
//                                 __( 'Checkboxes', 'tribe-events-filter-view' )
//                         )
//                 );
//                 return '<div class="tribe_events_active_filter_type_options">'.$field.'</div>';
//         }
 
//         protected function get_values() {
//                 $event_categories = array();
//                 $event_categories_term = get_terms( TribeEvents::TAXONOMY, array( 'orderby' => 'name', 'order' => 'DESC' ) );
//                 $event_categories_by_id = array();
//                 foreach( $event_categories_term as $term ) {
//                         $event_categories_by_id[$term->term_id] = $term;
//                 }
//                 $event_categories_by_id_reverse = array_reverse( $event_categories_by_id );
//                 $parents = array( '0' );
//                 while ( !empty( $parents ) ) {
//                         $parents_copy = $parents;
//                         foreach ( $event_categories_by_id_reverse as $term ) {
//                                 if ( in_array( $term->parent, $parents_copy ) ) {
//                                         $parents[] = $term->term_id;
//                                         unset( $event_categories_by_id[$term->term_id] );
//                                         $event_categories_by_id = TribeEvents::array_insert_after_key( $term->parent, $event_categories_by_id, array( $term->term_id => $term ) );
//                                 }
//                         }
//                         $parents = array_diff( $parents, $parents_copy );
//                 }
//                 $child_spacer = '&nbsp;&nbsp;';
//                 foreach( $event_categories_by_id as $cat ) {
//                         $child_depth = 0;
//                         $parent_id = $cat->parent;
//                         while ( $parent_id != 0 ) {
//                                 $child_depth++;
//                                 $parent_id = $event_categories_by_id[$parent_id]->parent;
//                         }
//                         $child_indent = str_repeat($child_spacer, $child_depth);
//                         $event_categories[] = array(
//                                 'name' => $child_indent . $cat->name,
//                                 'value' => $cat->term_id,
//                                 'data' => array(
//                                         'slug' => $cat->slug,
//                                 ),
//                         );
//                 }
//                 return $event_categories;
//         }
 
//         protected function setup_query_args() {
//                 $this->queryArgs = array( 'tax_query' => array( array(
//                         'taxonomy' => TribeEvents::TAXONOMY,
//                         'field' => 'id',
//                         'terms' => $this->currentValue,
//                         'include_children' => false,
//                 ) ) );
//         }
 
// }
 
// // This adds our new filter to the Filterbar options
// // Invokes TribeEventsFilter::__construct($name, $slug);
// $taxonomy_example = new TribeEventsFilter_Custom('Taxonomy', 'taxonomy_filter');

?>
