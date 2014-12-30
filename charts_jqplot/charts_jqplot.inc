<?php
/**
 * @file
 * Callbacks and utility functions for rendering a jqplot chart.
 */

/**
 * Chart render callback; Convert all chart-level data.
 *
 * This essentially is an additional #pre_render callback. It operates in the
 * same way and is simply called as part of the normal #pre_render process.
 *
 * @param array $chart
 *   The chart renderable.
 *
 * @return
 *   The modified chart renderable, with necessary #attached, #theme, and
 *   similar properties prepared for rendering.
 */
function _charts_jqplot_render($chart) {

  $chart_type = $chart['#chart_type'];
  $plugin = _charts_jqplot_type($chart_type);

  $chart['#attached']['library'][] = array(
    'jqplot',
    $plugin['plugin'],
  );

  $chart['#attributes']['class'][] = 'charts-jqplot';
  $chart_definition = array();
  $chart_definition = _charts_jqplot_populate_chart_options($chart, $chart_definition);

  $series = array(
    'data' => $chart[$chart_type . '_data']['#data'],
    'labels' => $chart[$chart_type . '_data']['#labels'],
    'title' => $chart[$chart_type . '_data']['#title'],
  );

  $chart['#attached']['js'][] = array(
    'data' => array('series' => $series),
    'type' => 'setting',
  );
  $chart['#attached']['js'][] = drupal_get_path('module', 'charts_jqplot') . '/js/charts_jqplot.js';

  if (!isset($chart['#id'])) {
    $chart['#id'] = drupal_html_id('jqplot-render');
  }

  $chart['#chart_definition'] = $chart_definition;
  return $chart;
}

/**
 * Utility to convert a Drupal renderable type to a Google visualization type.
 */
function _charts_jqplot_type($renderable_type) {
  $types = array(
    'area_chart' => 'AreaChart',
    'bar_chart' => 'BarChart',
    'column_chart' => 'ColumnChart',
    'line_chart' => 'LineChart',
    'pie' => array(
      'renderer' => '$.jqplot.PieRenderer',
      'plugin' => 'jqplot.pieRenderer'
    ),
    'scatter_chart' => 'ScatterChart',
  );
  drupal_alter('charts_jqplot_types', $types);
  return isset($types[$renderable_type]) ? $types[$renderable_type] : FALSE;
}


function _charts_jqplot_populate_chart_options($chart, $chart_definition) {
  $chart_type = $chart['#chart_type'];
  $plugin = _charts_jqplot_type($chart_type);

  $chart_definition['seriesDefaults'] = array(
    'rendererOptions' => array(
      'showDataLabels' => $chart['#data_labels'],
    ),
    'showMarker'=> TRUE,
    'title'=> $chart['#title'],
    'renderer'=>$plugin['renderer'],
  );

  return $chart_definition;
}