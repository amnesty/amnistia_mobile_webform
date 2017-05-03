(function ($) {
  Drupal.behaviors.myajax = {
    attach: function(context,settings){
     // $('.webform-component--email', context).once().focusout(function(e){
      $('[class*=" webform-component-"]', context).once().focusout(function(e) {
        $(this).addClass('ajaxafy');
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: Drupal.settings.basePath + 'custom/ajax-work',
          data: $('.amnistia_form_mobile').serialize(), // you can also pass block name and act more dynamicly
          success: function (data){
            Drupal.attachBehaviors(document);
          },
          error: function(data){
            console.log(data);
          }
        });
      });
    }
  };
})(jQuery)