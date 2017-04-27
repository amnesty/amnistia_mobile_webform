(function ($) {

    Drupal.behaviors.amnistia_form_mobile = {

    attach: function (context, settings) {

        // Fully declare element_settings, as Drupal's ajax.js seems not to merge defaults correctly.
        var ajax_element_settings_defaults = {
        url: '/',
        event: 'focusout',
        prevent: 'click',
        keypress: false,
        selector: '#',
        effect: 'none',
        speed: 'none',
        method: 'replaceWith',
        wrapper: '',
        progress: {
            type: 'throbber',
            message: ''
        },
        submit: {
            'js': true
        }
        };
    }
}
});