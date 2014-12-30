(function ($) {
  Drupal.behaviors.charts_jqplot = {
    attach: function (context, settings) {

      var series = Drupal.settings.series;
      var data = new Array();
      for (var i = 0; i < series.data.length; i++) {
        data[i] = new Array();
        data[i][0] = series.labels[i];
        data[i][1] = series.data[i];
      }

      $('.charts-jqplot').once('charts-jqplot',function(){
        var config = $.parseJSON($(this).attr('data-chart'));
        //console.log(config,'config');
        var div = $(this).attr('id');
        $.jqplot(div, [data], config);
      });
    }
  }
})(jQuery);

