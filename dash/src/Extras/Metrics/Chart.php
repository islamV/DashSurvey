<?php
namespace Dash\Extras\Metrics;

use Dash\Extras\Metrics\Contracts\AbstractMetricsChart;
 //use Exception;


class Chart extends AbstractMetricsChart{

    public function render($v){
        return $this->chartJs($v);
    }


}
