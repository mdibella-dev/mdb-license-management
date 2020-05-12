<?php


function test( $object ) {
    echo 'id: ' . $object->image_id;
    echo '<br>';
    echo 'name: ' . $object->image_author_name;
    echo '<br>';
    echo 'link: ' . $object->image_author_url;
    echo '<br>';
    echo 'description: ' . $object->image_description;
    echo '<br>';
    echo 'tags: ' . $object->image_tags;
    echo '<br>';
}




function sandbox() {
/*
    $img = new StockImage_Dreamstime( 'https://de.dreamstime.com/pantanal-landschaft-gr%C3%BCne-seen-und-kleine-teiche-mit-b%C3%A4umen-vogelperspektive-auf-tropischem-wald-brasilien-natur-der-wild-image109259967' );
    test( $img );;

echo '<br><br>';

    $img = new StockImage_GettyImages( 'https://www.gettyimages.de/detail/foto/young-girl-using-tablet-in-homemade-fort-at-home-lizenzfreies-bild/1207515688' );
    test( $img );;

echo '<br><br>';

    $img = new StockImage_Shutterstock( 'https://www.shutterstock.com/de/image-photo/african-american-mother-baby-736482238' );
    test( $img ); */

echo '<br><br>';

    $img = new StockImage_FlickR( 'https://pixabay.com/photos/4942724' );
    test( $img );




}
