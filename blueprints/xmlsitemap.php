<?php if(!defined('KIRBY')) exit ?>

# sitemap blueprint

title: x- only for xmlsitemap
pages: false
files: false

fields:
  info:
    label: 
      de:  HINWEIS
    type:  info
    text:  >
      This site generates a html-base sitemap (a human readable one). It is recommended, that this site is available under the URL /sitemap!
      <br>
      You should probably set some of the following options in the config.php
      <br>
      <pre>c::set('smap_ignoreSite', array(...));</pre> 
      <pre>c::set('smap_ignoreTemplate', array(...));</pre>
      
      For more information see the readme.

  title:
    label: Title (has no fuction)
      de:  Seitenüberschrift (hat keine Funktion)
    type:  text