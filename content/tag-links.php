<?php

// Outputs the tags the post used with their names hyperlinked to their permalink

$tags = get_the_tags();
$separator = ' ';
$output = '';
if($tags){
    echo "<p><span>Tags</span>";
    foreach($tags as $tag) {
        $output .= '<a href="'.get_tag_link( $tag->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts tagged %s", 'tracks' ), $tag->name ) ) . '">'.$tag->name.'</a>'.$separator;
    }
    echo trim($output, $separator);
    echo "</p>";
}