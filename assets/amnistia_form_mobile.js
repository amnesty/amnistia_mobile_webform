(function ($) {
  Drupal.behaviors.myajax = {
    attach: function(context,settings){

      $('[id*="edit-submitted"]', context).once('myajax').focusout(function(event) {

        if(sessionStorage.getItem('amnistiaform_mobile') === null) {
          sessionStorage.setItem('amnistiaform_mobile', $('.amnistia_form_mobile').serialize());
        }

        if(sessionStorage.getItem('amnistiaform_mobile') !== $('.amnistia_form_mobile').serialize()) {

          sessionStorage.setItem('amnistiaform_mobile', $('.amnistia_form_mobile').serialize());
          $.ajax({
            type: "POST",
            dataType : "html",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            url: Drupal.settings.basePath + 'custom/ajaxwork',
            data: $('.amnistia_form_mobile').serialize(), // you can also pass block name and act more dynamicly
            success: function (data){
              Drupal.attachBehaviors(document);
            },
            error: function(data){
              // console.log(data);
            }
          });
        }
      });
    }
  };


  jQuery(document).ready(function () {

    jQuery('.payamount-container').each(function () {
      sync_payamount_and_select(jQuery(this).attr('id'));
    });

    jQuery('.payamount-input').on('click', function () {

      //$('#payamount-selected').val(this.id).trigger('change');

      $('#otherAmount').val('').removeClass('populated');
      $('.payamount-input').each(function () {
        $(this).removeClass('value-selected');
      });
      $(this).addClass('value-selected');

      sync_payamount_and_select(jQuery(this).parents('.payamount-container').attr('id'));
    });

    jQuery('.payamount-otherAmount').on('click', function(){
      $('.payamount-input').each(function () {
        $(this).removeClass('value-selected');
      });
      $(this).addClass('populated');

    });
 /*   jQuery('#otherAmount').on('change', function () {
      $('.payamount-input').each(function () {
        $(this).removeClass('value-selected');
      });
      //$('#payamount-selected').val(this.value).trigger('change');
      var input = $(this);
      if (input.val().length) {
        input.addClass('populated');
      }
      else {
        input.removeClass('populated');
      }
      sync_payamount_and_select(jQuery('#payamount-selected').parents('.payamount-container').attr('id'));
    });

    jQuery('#payamount-selected').on('change', function () {
      sync_payamount_and_select(jQuery('.value-selected').parents('.payamount-container').attr('id'));
    });
*/

    $('.provincia option[value=""]').text("-Provincia-");

    function sync_payamount_and_select(payamount_id) {
      var payamount_value_selected = jQuery('#'+payamount_id+' .payamount-wrapper .payamount-slide .value-selected').attr('id');
      var select_id = payamount_id.replace('payamount-', '');
      var $select = jQuery('#'+select_id);
      $select.val(payamount_value_selected).change();
    }

  });
})(jQuery)
