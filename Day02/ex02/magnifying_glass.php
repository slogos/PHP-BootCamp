#!/usr/bin/php
<?php

if (is_readable($argv[1]))
{
    $output = array();
    $text = file_get_contents($argv[1]);
    $len = strlen($text);
    $n = 0;
    
    function check_html()
    {
        global $len, $n;
        return ($n < $len);
    }
    function substract()
    {
        global $text, $n;
        return substr($text, $n, 1);
    }
    function check_n($compare_to)
    {
        global $n, $text, $len;
        $length = strlen($compare_to);
        if ($n + $length > $len)
            return false;
        return strcasecmp(substr($text, $n, $length), substr($compare_to, 0, $length)) == 0;
    }
    function increment($number = 1)
    {
        global $output, $n;
        while ($number != 0)
        {
            array_push($output, substract());
            $n += 1;
            $number -=1;
        }
    }
    function up_case()
    {
        global $output, $n;
        array_push($output, strtoupper(substract()));
        $n += 1;
    }
    function convert()
    {
        convert_in();
        while (check_n("</a>") == false && check_html())
        {
            if (check_n("<"))
                convert_in();
			else
				up_case();
        }
        increment(4);
    }
    function convert_in()
    {
        while (substract() !== ">" && check_html())
        {
            if (check_n("title=\"") == true)
            {
                increment(7);
                while (substract() !== "\"")
                    up_case();
            }
            increment();
        }
        increment();
    }
    while ($n < $len)
    {
        if (check_n("<a ") || check_n("<a>"))
        {
            increment(2);
            convert();
        }
        increment(1);
    }
    $output_text = implode("", $output);
    echo "$output_text";
}

?>