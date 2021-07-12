<?php


class Calculator
{
    private string $cssString = "/* CSS Generator V1.0 by Sebastian Schiefermayr */ ";
    private static int $MAX_VALUES = 200;
    private array $cssNodes = ["margin", "padding"];
    private array $cssOrientation = ["top", "right", "bottom", "left"];

    private function getCalculationByType($value, int $baseSize, string $calculateTo)
    {
        switch ($calculateTo) {
            case CalculationUnit::EM:
            case CalculationUnit::REM:
                return $value / $baseSize;
            case CalculationUnit::PERCENT:
                return ($value / $baseSize) * 100;
            case CalculationUnit::PIXEL:
                return $value;
            default:
                return 0;
        }
    }

    public function buildCss(int $baseSize, string $calculateTo)
    {
        $start = microtime(true);
        for ($i = 0; $i <= self::$MAX_VALUES; $i++) {
            for ($nodes = 0; $nodes < count($this->cssNodes); $nodes++) {
                $this->cssString .= $this->buildCssClass(
                    $this->cssNodes[$nodes],
                    '',
                    $i,
                    round($this->getCalculationByType($i, $baseSize, $calculateTo) ,4) . $calculateTo);
                for ($orientation = 0; $orientation < count($this->cssOrientation); $orientation++) {
                    $this->cssString .= $this->buildCssClass(
                        $this->cssNodes[$nodes],
                        $this->cssOrientation[$orientation],
                        $i,
                        round($this->getCalculationByType($i, $baseSize, $calculateTo) ,4) . $calculateTo);
                }
            }

        }
        $end = microtime(true);
        header('Content-type: text/css');
        echo $this->cssString;
    }

    private function buildCssClass($node, $orientation, $valuePX, $valueCalc)
    {
        $ori = !empty($orientation) ? '-' . $orientation : "  ";
        return '.' . $node[0] . trim($ori[1]) . '-' . $valuePX . '{' . $node . trim($ori) . ': ' . $valueCalc . ';}';
    }
}
