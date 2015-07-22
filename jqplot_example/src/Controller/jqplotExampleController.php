<?php

/**
 * @file
 * Contains \Drupal\jqplot_example\Controller\jqplotExampleController.
 */

namespace Drupal\jqplot_example\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for jqPlot Example pages.
 *
 * @ingroup jqPlot
 */
class jqplotExampleController extends ControllerBase {

  /**
   * jqPlot Example info page.
   *
   * @return array
   *   A renderable array.
   */
  public function info() {
    global $base_path;
    $output = "";

    // Start building the content.
    $build = array();
    $output .= '<p><b>jqPlot is a plotting and charting plugin</b>.If Chart get display then libraries get install correctly or You will need to download jquery.jqplot from https://bitbucket.org/cleonello/jqplot/downloads/ and extract the jquery.jqplot files to the "[root]/libraries/" directory and rename to jquery.jqplot(e.g:[root]/libraries/jquery.jqplot/)</p>';
    $output .= "<ol>";
    $output .= "<li>".$this->t('<a href="!lineChart">Line Chart</a>', array('!lineChart' => $base_path . 'jqplot_example/line_charts'))."</li>";
    $output .= "<li>".$this->t('<a href="!lineChart">Bar Chart</a>', array('!lineChart' => $base_path . 'jqplot_example/bar_charts'))."</li>";
    $output .= "<li>".$this->t('<a href="!lineChart">Pie Chart</a>', array('!lineChart' => $base_path . 'jqplot_example/pie_charts'))."</li>";
    $output .= "</ol>";

    $build['content'] = array(
      '#markup' =>  $output,
      );

    return $build;
  }

  /**
   * line Chart Example page.
   *
   * @return array
   *   A renderable array of line chart and info about libraries files.
   */
  public function lineCharts() {

    // Start building the content.
    $build = array();

    $build['top_content'] = array(
      '#markup' => <<<INFOMARKUP
<ol>
<li>The following plot uses a number of options to set the title, add axis labels, and shows how to use the canvasAxisLabelRenderer plugin to provide rotated axis labels.</li>
<li>Charts on this page may depend on the following plugins:<br>
  <p>['#attached']['library'][] = 'jqplot/jqplot.canvasAxisLabelRenderer'</p>
  <p>['#attached']['library'][] = 'jqplot/jqplot.canvasTextRenderer'</p>
</li>
</ol></br>
INFOMARKUP
    );

    // Main container DIV. We give it a unique ID so that the JavaScript can
    // find it using jQuery.
    $build['content'] = array(
      '#markup' => '<div id="chart-line" class="jqplot-target"></div></pre>',
    );

    // Attach library containing css and js files.
    $build['#attached']['library'][] = 'jqplot/jqplot.canvasAxisLabelRenderer';
    $build['#attached']['library'][] = 'jqplot/jqplot.canvasTextRenderer';
    $build['#attached']['library'][] = 'jqplot_example/jqplot.example';

    return $build;
  }

  /**
   * BarCharts Example page.
   *
   * @return array
   *   A renderable array of Bar chart and info about libraries files.
   */
  public function BarCharts() {

    // Start building the content.
    $build = array();
    $build['top_content'] = array(
      '#markup' => <<<INFOMARKUP
        <ol>
        <li>Below is a default bar plot. Bars will highlight on mouseover. Events are triggered when you mouseover a bar and also when you click on a bar. Here We capture the 'jqplotDataClick' event and display the clicked series index, point index and data values. When series data is assigned as a 1-dimensional array as in this example, jqPlot automatically converts it into a 2-dimensional array for plotting. So a series defined as [2, 6, 7, 10] will become [[1,2], [2,6], [3,7], [4,10]].</li>
        <li>Charts on this page may depend on the following plugins:<br>
          <p>['#attached']['library'][] = 'jqplot/jqplot.barRenderer'</p>
          <p>['#attached']['library'][] = 'jqplot/jqplot.pieRenderer'</p>
          <p>['#attached']['library'][] = 'jqplot/jqplot.categoryAxisRenderer'</p>
          <p>['#attached']['library'][] = 'jqplot/jqplot.pointLabels'</p>
        </li>
        </ol></br>
INFOMARKUP
    );

    // Main container DIV. We give it a unique ID so that the JavaScript can
    // find it using jQuery.
    $build['content'] = array(
      '#markup' => '<div><span>You Clicked: </span><span id="info-bar">Nothing yet</span></div><div id="chart-bar" class="jqplot-target"></div></pre>',
    );

    // Attach library containing css and js files.
    $build['#attached']['library'][] = 'jqplot/jqplot.barRenderer';
    $build['#attached']['library'][] = 'jqplot/jqplot.pieRenderer';
    $build['#attached']['library'][] = 'jqplot/jqplot.categoryAxisRenderer';
    $build['#attached']['library'][] = 'jqplot/jqplot.pointLabels';
    $build['#attached']['library'][] = 'jqplot_example/jqplot.example';
    return $build;
  }

  /**
   * Pie Chart Example Page.
   *
   * @return array
   *   A renderable array of Pie chart and info about libraries files.
   */
  public function PieCharts() {

    // Start building the content.
    $build = array();

    $build['top_content'] = array(
      '#markup' => <<<INFOMARKUP
        <ol>
        <li>Below is a default bar plot. Bars will highlight on mouseover. Events are triggered when you mouseover a bar and also when you click on a bar. Here We capture the 'jqplotDataClick' event and display the clicked series index, point index and data values. When series data is assigned as a 1-dimensional array as in this example, jqPlot automatically converts it into a 2-dimensional array for plotting. So a series defined as [2, 6, 7, 10] will become [[1,2], [2,6], [3,7], [4,10]].</li>
        <li>Charts on this page may depend on the following plugins:<br>
        <p>['#attached']['library'][] = 'jqplot/jqplot.pieRenderer'</p>
        </li>
        </ol></br>
INFOMARKUP
    );

    // Main container DIV. We give it a unique ID so that the JavaScript can
    // find it using jQuery.
    $build['content'] = array(
      '#markup' => '<div id="chart-pie" class="jqplot-target"></div>',
    );

    // Attach library containing css and js files.
    $build['#attached']['library'][] = 'jqplot/jqplot.pieRenderer';
    $build['#attached']['library'][] = 'jqplot_example/jqplot.example';

    return $build;
  }

}
