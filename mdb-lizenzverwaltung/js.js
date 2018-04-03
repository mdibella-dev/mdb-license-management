jQuery(function($) {

    function mdb_lv_setFormFields() {
        val = $('#mdb-lv-media-state').val();

        $('.compat-field-mdb-lv-by-link').hide();
        $('.compat-field-mdb-lv-by-name').hide();
        $('.compat-field-mdb-lv-license-guid').hide();

        if( val > 0 ) {
            $('.compat-field-mdb-lv-media-link').show();
        }

        if( val > 1 ) {
            $('.compat-field-mdb-lv-by-link').show();
            $('.compat-field-mdb-lv-by-name').show();
        }

        if( val > 2 ) {
            $('.compat-field-mdb-lv-license-guid').show();
        }
    }

    $(document).ready( function() {

        $('#mdb-lv-media-state').click( function() {
            mdb_lv_setFormFields()
        });
    } );
} );
