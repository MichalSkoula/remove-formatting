<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use Michalskoula\RemoveFormatting\Remover;
use Michalskoula\RemoveFormatting\RemoverOptions;
use Tracy\Debugger;

Debugger::enable();

// create options object (optional)
$options = new RemoverOptions();

// add <u> to the default list of allowed elements
$options->addAllowedElement('u');

// add class to the default list of allowed attributes
$options->addAllowedAttribute('class');

// create Remover object
$remover = new Remover($options);

$dirtyHtml = '<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:&quot;Calibri&quot;,sans-serif">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
Phasellus rhoncus. Quisque porta. Maecenas libero. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. <u>Integer tempor</u>. Fusce wisi. </span></span></span></p>
<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:&quot;Calibri&quot;,sans-serif">
<img height="1280" src="https://www.exitshop.test/files/2/media/files/image-20230715234133-1.jpeg" width="1277" /></span></span></span></p>
<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:&quot;Calibri&quot;,sans-serif">Nullam at arcu a <b>est sollicitudin euismod</b>. 
Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. </span></span></span></p>
<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:&quot;Calibri&quot;,sans-serif">Sed ac dolor sit 
<a href="https://skoula.cz/nazdar" style="color:#0563c1; text-decoration:underline">amet purus malesuada</a> congue. Etiam dictum tincidunt diam. Aenean vel massa quis mauris vehicula lacinia.</span></span></span></p>';

echo '<h1>Dirty</h1>';
dump($dirtyHtml);

// run it and get clean html with only allowed elements and attributes
$cleanHtml = $remover->remove($dirtyHtml);

echo '<h1>Clean</h1>';
dump($cleanHtml);
