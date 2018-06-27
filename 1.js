jQuery( document ).ready(function() {
    ( function( $ ) {
        var media = wp.media,
            l10n = media.view.l10n = typeof _wpMediaViewsL10n === 'undefined' ? {} : _wpMediaViewsL10n,
            attachments = media.model.Attachments.all,
            attachments_uploaded = [];

        if ( typeof wp.Uploaded === 'undefined') return;

        // Keep track of files uploaded.
        wp.Uploader.queue.on( 'add', function ( attachment ) {
            attachments_uploaded.push( attachment );
        });

        // The Uploader (in wp-includes/js/plupload/wp-plupload.js) resets the queue when all uploads are complete.
        wp.Uploader.queue.on( 'reset', function () {
            var idx, uploaded = attachments_uploaded.slice(0); // Clone
            attachments_uploaded = [];
            for ( idx = 0; idx < uploaded.length; idx++ ) {
                if ( uploaded[idx].get('name').match(/-[0-9]+$/) ) {
                    $.post( ajaxurl, {
                            action: 'wpse142997_is_dup',
                            dup_id: uploaded[idx].id,
                            nonce: wpse142997_params.is_dup_nonce
                        }, function( response ) {
                            var original, dup, dup_view, sidebar, selection;
                            if ( response && !response.error && response.original_id && response.dup_id ) {
                                original = attachments.get( response.original_id );
                                dup = attachments.get( response.dup_id );
                                if ( original && dup ) {
                                    dup.set( 'dup_original', original ); // May be ungood - mostly doing it so can use wp.templates.
                                    dup_view = media.view.Attachment.extend({
                                        tagName:   'div',
                                        className: 'attachment-dmc',
                                        template: media.template('attachment-dmc'),
                                        events: {
                                            'click button.dmc': 'removeDupSelectOriginal'
                                        },
                                        initialize: function() {
                                            this.focusManager = new media.view.FocusManager({
                                                el: this.el
                                            });
                                            media.view.Attachment.prototype.initialize.apply( this, arguments );
                                        },
                                        render: function() {
                                            if ( this.get_dup_original() ) {
                                                media.view.Attachment.prototype.render.apply( this, arguments );
                                                this.focusManager.focus();
                                            }
                                            return this;
                                        },
                                        removeDupSelectOriginal: function( event ) {
                                            var dup_original = this.get_dup_original();
                                            event.preventDefault();

                                            if ( dup_original && confirm( l10n.warnDelete ) ) {
                                                this.model.destroy();
                                                this.controller.state().get('selection').add( dup_original );
                                                this.remove();
                                            }
                                        },
                                        get_dup_original: function () {
                                            var dup_original = this.model.get('dup_original');
                                            return dup_original && attachments.get( dup_original.id ) ? dup_original : null;
                                        }
                                    });
                                    // A hacky way to get the sidebar.
                                    sidebar = media.frame.content.view.views.get('.media-frame-content')[0].sidebar;
                                    selection = sidebar.controller.state().get('selection');
                                    // The sidebar boxes get deleted and recreated on each select - hack into this to do the same.
                                    selection.on( 'selection:single', function ( event ) {
                                        if ( selection.single().get('dup_original') ) {
                                            sidebar.set( 'dmc', new dup_view({
                                                controller: sidebar.controller,
                                                model: selection.single(),
                                                priority: 100
                                            }) );
                                        }
                                    } );
                                    selection.on( 'selection:unsingle', function ( event ) {
                                        sidebar.unset('dmc');
                                    } );
                                    // Refire the select as we missed it (could/should just do the view create code here again).
                                    selection.trigger('selection:single');
                                }
                            }
                        }, 'json'
                    );
                }
            }
        });
    } )( jQuery );
});
