<?php
/*
Plugin Name: First Tee Player Submission Shortcut
Description: Displays the golfing records of (individual) golfers. Embed the [first-tee-submissions] shortcode into a page or post in order to display a list of player golfing data as captured by Ninja Forms. Requires the `id' attribute which is the id of the Ninja Form that represents the player tracking form. Takes an optional `player' attribute which is the id of the field in which the golfer's name is stored. When `player' is specified, the table that is displayed will only include entries for the currently logged in user and will not display the golfer's name in each row.  If `player' is not provided, all entries will be displayed with the name of the player assoicated with each entry displayed along with the other fields.
Version: 1.0
Author: Brian Cox on behalf of Philly GiveCamp
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
         exit;

function first_tee_submissions_shortcode( $atts ) {
  $user_id = get_current_user_id();
  $subs = Ninja_Forms()->subs()->get(array('form_id' => $atts['id']));
  $output = '<table><tr><th>Golf Course</th><th>Activity</th><th>Score</th><th>Played With</th>' . ($atts['player'] != '' ? '' : '<th>Golfer</th>') . '<th>Date</th></tr>';

  if ($user_id == '') {
    return '<span class="wp-caption">You must be logged in to view this page.';
  }
  if (count($subs) == 0) {
    return '<span class="wp-caption">You have not yet been to a golf course.</span>';
  }

  foreach ($subs as $sub) {
    if ($atts['player'] == '' || $sub->user_id == $user_id) {
      $all_fields = $sub->get_all_fields();
      $output .= '<tr>';
      foreach ($all_fields as $key => $value) {
        if ($key == $atts['player']) continue;
        $output .= '<td>';
        if (gettype($value) == "array") $output .= implode(", ", $value);
        else $output .= $value;
        $output .=  '</td>';
      }
      $output .= '<td>' . date('m/d/Y', strtotime($sub->date_submitted)) . '</td>';
    }
    $output .= '</tr>';
  }
  $output .= '</table>';

  return $output;
}
add_shortcode('first_tee_submissions', 'first_tee_submissions_shortcode');

?>
