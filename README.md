# Remove Formatting

Simple tool to remove (some) HTML formatting, for example for text copied from Word or Google Docs.

Features:

- removes unwanted elements (default: keep ['a', 'img', 'p', 'strong'])
- removes unwanted attributes (default: keep ['href', 'src'])
- removes unwanted whitespaces (default: false)

## Installation

```bash
composer require michalskoula/remove-formatting
```

Requires PHP 7.4+

## Usage

```php
// create options object (optional)
$options = new RemoverOptions();

// add <u> to the default list of allowed elements
$options->addAllowedElement('u');

// add class to the default list of allowed attributes
$options->addAllowedAttribute('class');

// create Remover object
$remover = new Remover($options);

$dirtyHtml = 'some dirty <span>spans</span> ...';

// run it and get clean html with only allowed elements and attributes
$cleanHtml = $remover->remove($dirtyHtml);
```

See example.php

### HTML Before

```html
<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:&quot;Calibri&quot;,sans-serif">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. 
Phasellus rhoncus. Quisque porta. Maecenas libero. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. <u>Integer tempor</u>. Fusce wisi. </span></span></span></p>
<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:&quot;Calibri&quot;,sans-serif">
<img height="1280" src="https://www.exitshop.test/files/2/media/files/image-20230715234133-1.jpeg" width="1277" /></span></span></span></p>
<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:&quot;Calibri&quot;,sans-serif">Nullam at arcu a <b>est sollicitudin euismod</b>. 
Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. </span></span></span></p>
<p style="margin-bottom:11px"><span style="font-size:11pt"><span style="line-height:107%"><span style="font-family:&quot;Calibri&quot;,sans-serif">Sed ac dolor sit 
<a href="https://skoula.cz/nazdar" style="color:#0563c1; text-decoration:underline">amet purus malesuada</a> congue. Etiam dictum tincidunt diam. Aenean vel massa quis mauris vehicula lacinia.</span></span></span></p>
```

### HTML After

```html
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus rhoncus. Quisque porta. Maecenas libero. Sed vel lectus. Donec odio tempus molestie, porttitor ut, iaculis quis, sem. <u>Integer tempor</u>. Fusce wisi. </p>

<p><img src="https://www.exitshop.test/files/2/media/files/image-20230715234133-1.jpeg"></p>

<p>Nullam at arcu a est sollicitudin euismod.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos.</p>

<p>Sed ac dolor sit <a href="https://skoula.cz/nazdar">amet purus malesuada</a> congue. Etiam dictum tincidunt diam. Aenean vel massa quis mauris vehicula lacinia.</p>
```

## About
* MIT Licence
* https://skoula.cz


<a href="https://www.buymeacoffee.com/mskoula"><img src="https://www.buymeacoffee.com/assets/img/guidelines/download-assets-sm-1.svg" height="40"></a>
<a href="https://paypal.me/truehipstercz?country.x=CZ&locale.x=en_US"><img src="https://raw.githubusercontent.com/andreostrovsky/donate-with-paypal/master/blue.svg" height="40"></a>
