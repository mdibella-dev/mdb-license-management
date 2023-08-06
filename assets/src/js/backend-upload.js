jQuery(function($) {

    var lv_AttachmentCompat = wp.media.view.AttachmentCompat;

    wp.media.view.AttachmentCompat = wp.media.view.AttachmentCompat.extend( {

        events: {
            'click select#mdb-lv-media-state': 'do_action',
            'change input':    'save',
            'change select':   'save',
            'change textarea': 'save'
        },

        render: function() {
            lv_AttachmentCompat.prototype.render.call( this );
            this.do_action();
        },

        do_action: function() {
            val = this.$( '#mdb-lv-media-state' ).val();

            this.$( '.compat-field-mdb-lv-by-link' ).hide();
            this.$( '.compat-field-mdb-lv-by-name' ).hide();
            this.$( '.compat-field-mdb-lv-license-guid' ).hide();
            this.$( '.compat-field-mdb-lv-media-link' ).hide();

            if( val > 0 ) {
                this.$( '.compat-field-mdb-lv-media-link' ).show();
            }

            if( val > 1 ) {
                this.$( '.compat-field-mdb-lv-by-link' ).show();
                this.$( '.compat-field-mdb-lv-by-name' ).show();
            }

            if( val > 2 ) {
                this.$( '.compat-field-mdb-lv-license-guid' ).show();
            }
        }
    } );

} );
