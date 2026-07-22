<?php

require "../bootstrap/app.php";

$request = new NovaCore\Http\Request();

echo $request->method();

echo "<br>";

echo $request->uri();