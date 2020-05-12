<?php
/**
 * @author      Marco Di Bella <mdb@marcodibella.de>
 * @package     mdb-lv
 */



/**
 *  StockImage_PxHere
 *
 * @since   0.0.2
 **/

class StockImage_PxHere extends StockImage {

    /**
     * Constructor dieser Klasse
     *
     * @since   0.0.2
     */

    public function __construct( $url ) {

        $content = $this->retrieve_content( $url );

        if( false !== $content) :

            /** JSON-Datensatz einlesen **/

            preg_match( '/<script type="application\/ld\+json">(.*?)<\/script>/i', $content, $match ); // evtl. nach umschließenden <div class="hub-media-content"> suchen, zwecks fehlervermeidung */
            $pxhere_data = json_decode( $match[1], true );


            /** Image-URL **/

            $this->set_image_url( $url );


            /** Image-ID **/

            preg_match( '/(?:.*)\/(\d{1,}?)$/', parse_url( $url, PHP_URL_PATH ), $match );
            $this->set_image_id( $match[1] );


            /** Image-Author-Name, Image-Author-Link **/

            if( false !== strpos( $content, 'profile-link') ) :

                preg_match( '/<div class="hub-infoauthor-details">\n<p><a(?:.*?)href="(.*?)"(?:.*?)>/i', $content, $match );
                $link = parse_url( $url, PHP_URL_SCHEME ) . '://'. parse_url( $url, PHP_URL_HOST ) . $match[1];
                $this->set_image_author( $pxhere_data[ 'author' ]['name'], $link );

            endif;


            /** Image-Description **/

            if( false !== preg_match( '/<div class="photo-descriptioninfo-main">\n<p>(.*?)<\/p>\n<br>\n<br>/i', $content, $match ) ) :

                $this->set_image_description( $match[1] );

            endif;


            /** Image-Tags **/

            $a1   = explode( ':', $pxhere_data[ 'caption' ] );    // 'caption' entlang des Doppelpunktes trennen
            $a2   = explode( ',', $a1[1] );                       // nur rechte Seite nehmen und auftrennen
            $tags = array();

            foreach( $a2 as $tag ) :

                $tags[] .= strtolower( trim( $tag ) );

            endforeach;

            $this->set_image_tags( implode( ',', $tags ) );


            /** Todo License **/
            // Link zur Lizenz steckt in  $pxhere_data[ 'license' ]

        endif;
    }
}
