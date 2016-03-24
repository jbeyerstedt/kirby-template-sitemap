<?php if(!defined('KIRBY')) exit ?>

# sitemap blueprint

title: x- only for html-sitemap
pages: false
files: false
options:
  preview: true
  status: false
  template: false
  url: false
  delete: false

fields:
  title:
    label:
      en:  Title
      de:  Titel/ Überschrift
    type:  text

  info:
    label: NOTICE
    type:  info
    text:  >
      This site generates a html-base sitemap (a human readable one)
      <br>
      You should probably set some of the following options in the config.php
      <br>
      <pre>c::set('smap_ignoreSite', array(...));</pre>
      <pre>c::set('smap_ignoreTemplate', array(...));</pre>
      <pre>c::set('smap_heading_visible', '...');</pre>
      <pre>c::set('smap_heading_invisible', '...');</pre>
      <pre>c::set('smap_column_class_id', 'class="..." id="..."');</pre>

      For more information see the readme.
