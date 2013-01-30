<?php

if ( ! isset($_GET['secret'])
     || $_GET['secret'] !== "sesame") {
    exit;
}

// require() whatever you need here

echo "(setq php-remote-functions '(";

$funcs = get_defined_functions();

foreach ( array_merge($funcs['internal'], $funcs['user']) as $func ) {
    if ( preg_match('/[^A-Za-z0-9_]/', $func) > 0 ) {
        continue;
    }
    $f = new ReflectionFunction($func);
    $line = '("' . $func . '" ' ;

    $params = '';
    foreach ($f->getParameters() as $param) {
        $param_text = '"';
        if ($param->isOptional()) {
            $param_text .= '[';
        }
        $param_text .= ($param->isPassedByReference() ? '&' : '')
            . '$' . $param->getName();
        if ($param->isOptional()) {
            $param_text .= ']';
        }
        $param_text .= '" ';
        $line .= $param_text;
    }
    $line .= ")\n";
    echo $line;
}
echo "))";