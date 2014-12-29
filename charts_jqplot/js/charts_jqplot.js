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
      $.jqplot('jqplot-render', [data], {
          seriesDefaults: {
            renderer: $.jqplot.PieRenderer,
            rendererOptions: {
              // Put data labels on the pie slices.
              // By default, labels show the percentage of the slice.
              showDataLabels: true
            },
            showMarker: true,
            pointLabels: {
              show: true
            }
          },
          title: series.title
          //legend: { show:true, location: 'e' }
        }
      );

    }
  }
})(jQuery);

