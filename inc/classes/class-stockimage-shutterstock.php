<?php
/**
 * @author      Marco Di Bella <mdb@marcodibella.de>
 * @package     mdb-lv
 */



/**
 *  StockImage_Shutterstock
 *
 * @since   0.0.2
 **/

class StockImage_Shutterstock extends StockImage {

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

            preg_match( '/(?:.*)-(\d{1,}?)$/', parse_url( $url, PHP_URL_PATH ), $match );
            $this->set_image_id( $match[1] );


            /** Image-Author-Name, Image-Author-Link **/

            preg_match( '/<p class="oc_A_g b_q_e"><span>(?:.*?)<a(?:.*?)href="(.*?)"(?:.*?)>(.*?)<\/a>/i', $content, $match );
            $this->set_image_author( $match[2], $match[1] );


            /** Image-Description **/

            preg_match( '/<h1 class="m_b_b font-headline-base" data-automation="ImageDetailsPage_Details">(.*?)<\/h1>/i', $content, $match );
            $this->set_image_description( $match[1] );


            /** Image-Tags **/

            preg_match_all( '/<div class="oc_x_o C_b_a"><a[^>]+><span[^>]+><\/span>(.*?)<\/a><\/div>/i', $content, $matches );
            $this->set_image_tags( implode( ',', $matches[1] ) );

        endif;
    }
}
