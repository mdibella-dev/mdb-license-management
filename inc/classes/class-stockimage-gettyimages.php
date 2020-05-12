<?php
/**
 * @author      Marco Di Bella <mdb@marcodibella.de>
 * @package     mdb-lv
 */



/**
 *  StockImage_GettyImages
 *
 * @since   0.0.2
 **/

class StockImage_GettyImages extends StockImage {

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

            preg_match( '/<span\s*?class="asset-detail__asset-id">(.*?)<\/span>/i', $content, $match );
            $this->set_image_id( $match[1] );


            /** Image-Author-Name, Image-Author-Link **/

            preg_match( '/<div\s*?class="asset-detail__value asset-detail__cell"><a.*?href="(.*?)".*?>(.*?)<\/a>/i', $content, $match );
            $this->set_image_author( $match[2], 'https://www.gettyimages.de/' . $match[1] );


            /** Image-Description **/

            preg_match( '/<div\s*?class="asset-description__caption">(.*?)<\/div>/i', $content, $match );
            $this->set_image_description( $match[1] );


            /** Image-Tags **/

            preg_match_all( '/<li\s*?class="asset-keywords-list__item keyword"><a[^>]+>(.*?)<\/a>,*<\/li>/i', $content, $matches );

            $a1 = explode( ' ', $matches[1][0] );
            $a2 = explode( ' ', $matches[1][1] );
            $a3 = explode( ' ', $matches[1][2] );
            $a4 = explode( ' ', $matches[1][3] );
            $a5 = explode( ' ', $matches[1][4] );

            $result = implode( '', array_intersect( $a1, $a2, $a3, $a4, $a5 ) );
            $tags   = array();

            foreach( $matches[1] as $material ) :

                $tags[] .= strtolower( trim( str_replace( $result, '', $material ) ) );

            endforeach;

            $this->set_image_tags( implode( ',', $tags ) );

        endif;
    }
}
