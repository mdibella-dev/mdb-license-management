<?php
/**
 * Indizierungsfunktion
 *
 * @author Marco Di Bella <mdb@marcodibella.de>
 * @package mdb-lv
 * @since 0.0.1
 * @version 0.0.1
 */



/*
auslesen aller medien einschließlich der custom meta values
kopieren in die entsprechenden Felder
https://shareurcodes.com/blog/real%20time%20progress%20bar%20in%20php
*/
function indexing()
{
    global $wpdb;
?>
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<div id="information" style="width"></div>
<?php
ini_set('max_execution_time', 0);

    $media_total = $wpdb->get_var( "SELECT COUNT(ID) FROM $wpdb->posts WHERE (post_type='attachment') AND (post_mime_type LIKE '%%image%%')" );

    print_r( $media_total . 'Bilder<br>' );

    $data = $wpdb->get_results( "SELECT ID, post_title FROM $wpdb->posts WHERE (post_type='attachment') AND (post_mime_type LIKE '%%image%%')" );

    $media_count = 1;
    foreach( $data as $image ) :
        //print_r( sprintf( '%1$s %2$s bearbeitet<br>', $image->ID, $image->post_title ) );
        $percent = intval( $media_count/$media_total * 100 ) . "%";
        update_progress( $media_count, $percent  );
        $media_count++;


        flush();
        ob_flush();
    endforeach;
}

// A function that you can pass a percentage as
// a whole number and it will generate the
// appropriate new div's to overlay the
// current ones:

function update_progress( $i, $percent)
{
    echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$i.' row(s) processed.";
    </script>';
}
