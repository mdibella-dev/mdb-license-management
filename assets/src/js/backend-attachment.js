jQuery( document ).ready( function( $ ) {

    function changeVisibility( media_state ) {
        $( '.compat-field-mdb-lv-by-link' ).hide();
        $( '.compat-field-mdb-lv-by-name' ).hide();
        $( '.compat-field-mdb-lv-license-guid' ).hide();
        $( '.compat-field-mdb-lv-media-link' ).hide();

        if( media_state > 0 ) {
            $( '.compat-field-mdb-lv-media-link' ).show();
        }

        if( media_state > 1 ) {
            $( '.compat-field-mdb-lv-by-link' ).show();
            $( '.compat-field-mdb-lv-by-name' ).show();
        }

        if( media_state > 2 ) {
            $( '.compat-field-mdb-lv-license-guid' ).show();
        }
    }


    $( '#mdb-lv-media-state' ).on( 'change', function() {
        changeVisibility( $( '#mdb-lv-media-state' ).val() );
    } );


    changeVisibility( $( '#mdb-lv-media-state' ).val() );

} );
