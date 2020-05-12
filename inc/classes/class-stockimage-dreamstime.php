<?php
/**
 * @author      Marco Di Bella <mdb@marcodibella.de>
 * @package     mdb-lv
 */



/**
 *  StockImage_Dreamstime
 *
 * @since   0.0.2
 **/

class StockImage_Dreamstime extends StockImage {

    /**
     * Constructor dieser Klasse
     *
     * @since   0.0.2
     */

    public function __construct( $url ) {

        $content = $this->retrieve_content( $url );

        if( false !== $content) :

            /** Image-URL **/

            $this->set_image_url( $url );


            /** Image-ID **/

            preg_match( '/<div\s*?class=\"item-author-copy\">\s*?<input\s*type=\"hidden\"\s*?value=\"(.*?)\">/i', $content, $match );
            $s = $match[1];
            preg_match( '/^\w*\s+([0-9]+)\s+/i', $s, $match );
            $this->set_image_id( $match[1] );


            /** Image-Author-Name, Image-Author-Link **/

            preg_match( '/©\s+(.*?)\s+/i', $s, $match );
            $this->set_image_author(
                $match[1],
                strtolower( sprintf( '%1$s://%2$s/%3$s_info',
                    parse_url( $url, PHP_URL_SCHEME),
                    parse_url( $url, PHP_URL_HOST ),
                    $match[1] )
                )
            );


            /** Image-Description **/

            preg_match( '/<div\s*?class=\"item-description\">\s*?<h2>\s*?(.*?)\s*?<\/h2>/i', $content, $match );
            $this->set_image_description( wp_strip_all_tags( $match[1] ) );


            /** Image-Tags **/

            preg_match( '/<ul\s*?class="item-keywords-container">(.*?)<\/ul>/i', $content, $match );
            preg_match_all( '/<li><a[^>]+>(.*?)<\/a>,*<\/li>/i', $match[1], $matches );
            $this->set_image_tags( implode( ',', $matches[1] ) );


            /** Todo License **/
            // Load Page in English, search for <div class="stamp" style="left: 199.75px;">Royalty-Free </div>

        endif;
    }
}
