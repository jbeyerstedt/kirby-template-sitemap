<?php if(!defined('KIRBY')) exit ?>

# sitemap blueprint

title: do not touch - for sitemap only
pages: false
files: false

fields:
  title:
    label: Title
      de:  Titel/ Überschrift
    type:  text
  meta_robots:
    label: meta-robots
    type:  text
    default: noindex, nofollow