<?php
/**
 * @author      Marco Di Bella <mdb@marcodibella.de>
 * @package     mdb-lv
 */



/**
 *  StockImage
 *
 * @since   0.0.2
 **/

class StockImage {
    public $image_url = '';
    public $image_id = '';
    public $image_description = '';
    public $image_tags = '';
    public $image_author_url = '';
    public $image_author_name = '';


    /**
     * Setzt den Pfad des Stockbildes zu/in der Stockbildsammlung
     *
     * @param   string   $url
     * @since   0.0.2
     **/

    public function set_image_url( $url ) {
        $this->image_url = $url;
    }


    /**
     * Setzt das innerhalb der Stockbildsammlung genutzte Merkmal zur Identifikation des Stockbildes
     *
     * @param   string   $id
     * @since   0.0.2
     **/

    public function set_image_id( $id ) {
        $this->image_id = $id;
    }


    /**
     * Setzt den Urheber des Stockbildes
     *
     * @param   string   $name
     * @param   string   $url (optional)
     * @since   0.0.2
     **/

    public function set_image_author( $name, $url = '' ) {
        $this->image_author_name = $name;
        $this->image_author_url  = $url;
    }


    /**
     * Setzt die Beschreibung des Stockbildes
     *
     * @param   string   $description
     * @since   0.0.2
     */

    public function set_image_description( $description ) {
        $this->image_description = $description;
    }


    /**
     * Setzt die Schlagwörter des Stockbildes
     *
     * @param   string   $tags
     * @since   0.0.2
     */

    public function set_image_tags( $tags ) {
        $this->image_tags = $tags;
    }


    /**
     * Ruft die in der Stockbildsammlung hinterlegte Medienseite des Stockbildes ab
     *
     * @param   string   $url
     * @return  string
     * @since   0.0.2
     */

    public function retrieve_content( $url ) {

        $options = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: de\r\n" .
                            "Cookie: foo=bar\r\n" .
                            "User-Agent: Mozilla/5.0 (iPad; U; CPU OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.10 (KHTML, like Gecko) Version/4.0.4 Mobile/7B334b Safari/531.21.102011-10-16 20:23:10\r\n"
            )
        );

        $context = stream_context_create( $options );

        return file_get_contents( $url, false, $context );
    }
}
