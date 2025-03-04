(function ($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
	 *
	 * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
	 *
	 * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */
    $(window).on('load', function (e) {
        $('.wp-ajax-subscribe-button').on('click', function (e) {
            e.preventDefault();
            var current = $(this);
            $(current).parentsUntil('.newsletter').find('.wp-ajax-msg-success,.wp-ajax-msg-error,.wp-ajax-msg-empty').css('display', 'none');
            var email = $(current).parentsUntil('.newsletter').find('.wp-subscribe-email').attr('value')
            if(!email) {
                $(current).parentsUntil('.newsletter').find('.wp-ajax-msg-empty').css('display', 'block');
            }
            else {
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: wp_ajax_subscribe.ajaxurl,
                    data: {
                        action: 'mailchimp_subscribe',
                        email: email,
                    },
                    success: function (data) {
                        if (data.success) {
                            $(current).parentsUntil('.newsletter').find('.wp-ajax-msg-success').css('display', 'block');
                        }
                        else {
                            $(current).parentsUntil('.newsletter').find('.wp-ajax-msg-error').css('display', 'block');
                        }
                    },
                });
            }
        });
    });

})(jQuery);
