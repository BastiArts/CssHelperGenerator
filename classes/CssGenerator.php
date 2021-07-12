<?php

class CssGenerator
{
    private int $font_size_default = 16;
    private Calculator $calculator;

    /**
     * CssGenerator constructor.
     * @param $size - custom default font size
     */
    public function __construct($size)
    {

        $this->calculator = new Calculator();
        $this->font_size_default = (int)filter_var($size, FILTER_SANITIZE_NUMBER_INT);
        $this->calculator->buildCss($this->font_size_default, CalculationUnit::REM);

    }
}
