$(function() {
  'use strict';

  if($('#league_start_date').length) {
    $('#league_start_date').datepicker({
      format: "dd.mm.yyyy",
      todayHighlight: true,
      autoclose: true
    });
  }

  if($('#league_end_date').length) {
    $('#league_end_date').datepicker({
      format: "dd.mm.yyyy",
      todayHighlight: true,
      autoclose: true
    });
  }

  if($('#race_date').length) {
    $('#race_date').datepicker({
      format: "dd.mm.yyyy",
      todayHighlight: true,
      autoclose: true
    });
  }


});