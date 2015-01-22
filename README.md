First Tee Submissions WordPress Plugin
======================================

This plugin was developed on behalf of the [Philly GiveCamp][givecamp] for
use by [The First Tee of Greater Philadelphia][firsttee]. It's a quick and
dirty plugin built for the very specific purpose of displaying the progress
of the program's golf students within a WordPress page or post.

Instructions
------------

This plugin displays the golfing records of (individual) golfers. Embed the
following shortcode into a page or post in order to display a list of player
golfing data as captured by Ninja Forms:

    [first_tee_submissions id=<form id>]

where the `id` attribute is the id of the Ninja Form that captures the player
progress submissions. It takes an optional `player` attribute which is the id
of the form field in which the golfer's name is stored:

    [first_tee_submissions id=<form id> player=<player name form field>]

When `player` is specified, the table that is displayed will only include
entries for the currently logged in user and will not display the golfer's
name in each row. If `player` is not provided, all entries will be displayed
with the name of the player associated with each entry displayed along with
the other fields.

For example, if the player progress form has an id number of 3, the shortcode
that should be embedded within a page or a post should look like this:

    [first_tee_submissions id=3]

If you want to only list submissions for the current user and the student
progress form captures golfer's names in field 21 of form 3, the shortcode
should look like this:

    [first_tee_submissions id=3 player=21]

Caveat
------

The table output by this plugin is hard-coded for its intended purpose and is
rendered with no CSS adornments.

[givecamp]: http://www.phillygivecamp.org
[firsttee]: http://www.thefirstteephiladelphia.org
