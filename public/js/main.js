$(document).ready(function () {
  $('#card_number').keyup(function () {
    var card_type = $("#card_type").val();
    var cur_val = $(this).val();
    if(card_type == "American Express"){
      if(($(this).val().length) == 6){
        $('#card_number').val(cur_val+'*****');
      }
    }else{
      if(($(this).val().length) == 6) {
        $('#card_number').val(cur_val + '******');
      }
    }
  })
  $("#card_type").change(function () {
    $('#card_number').val("");
    if($(this).val() !== ""){
      $('#card_number').prop("disabled", false)
    }else{
      $('#card_number').prop("disabled", true)
    }
  })


  window._token = $('meta[name="csrf-token"]').attr('content')

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
        allEditors[i],
        {
            removePlugins: ['ImageUpload']
        }
    );
  }

  moment.updateLocale('en', {
    week: {dow: 1} // Monday is the first day of the week
  })

  $('.date').datetimepicker({
    format: 'YYYY-MM-DD',
    locale: 'en'
  })

  $('.datetime').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss',
    locale: 'en',
    sideBySide: true
  })

  $('.timepicker').datetimepicker({
    format: 'HH:mm:ss'
  })

  $('.select-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', 'selected')
    $select2.trigger('change')
  })
  $('.deselect-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', '')
    $select2.trigger('change')
  })

  $('.select2').select2()

  $('.treeview').each(function () {
    var shouldExpand = false
    $(this).find('li').each(function () {
      if ($(this).hasClass('active')) {
        shouldExpand = true
      }
    })
    if (shouldExpand) {
      $(this).addClass('active')
    }
  })
})
