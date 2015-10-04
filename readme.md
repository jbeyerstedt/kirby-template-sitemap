# kirby2 sitemap templates
by Jannik Beyerstedt from Hamburg, Germany
[jannikbeyerstedt.de](http://jannikbeyerstedt.de) | [Github](https://github.com/jbeyerstedt)


## this sitemap-template has some special features

- the settings are moved to the config.php
- you can ignore special sites by it´s uri
- and you can ignore sites by the template it uses !
in detail it is the "intended template", aka filename of the content file!

I needed this variation of the classic xmlsitemap of Bastian Allgeier to exclude onepager sections and sites/folders only needed to structure content. Because the fact that these pages were in the sitemap, but not accessable confused Google and there were too many links to sections of my site in my Google search results.

Another variation is a html version of the sitemap to be displayed to the website visitor. It´s a simple hierarchical view.


#### note:
This is only tested with kirby 2!

#### installation
store the files of the templates folder in

  site/templates/

store the files of the snippets folder in

  site/snippets/

store the files of the blueprints folder in

  site/blueprints/

There are two files each! One is for the xml sitemap, one for an html sitemap, which is human readable.

#### html sitemap
The html sitemap can be embedded in your content section by the handy snippet. E.g. create a template named `htmlsitemap` with your normal site structure and replace your normal (text) content with the snippet. The snippet creates two columns with the twitter bootstrap markup, so you have to have bootstrap or you have to write a litte css to put the columns in the right place.
There is a corresponding blueprint for a htmlsitemap template, which displays some information in the panel.


#### usage/ preparation
set some constants in your config.php

    c::set('smap_ignoreSite',     array('sitemap', 'htmlsitemap'));
    c::set('smap_ignoreTemplate', array('foo'));

`smap_ignoreSite` contains all sites you want to be excluded from the sitemap.
`smap_ignoreTemplate` contains all templates you want to be ecxluded from the sitemap.

For the html sitemap, you should set some other values:

    c::set('smap_heading_visible', 'visible pages (e.g. menu)');
  c::set('smap_heading_invisible', 'invisible pages (e.g. others)');

`smap_heading_visible` sets a heading for all visible pages. These are often the pages included in the main menu, so it would be nice to title them as main menu.
`smap_heading_invisible` set a heading for all invisible pages.

#### usage/ including the template
As for every other kirby template, generate a page (folder) for your uri and let the the content file have the same name as the template.

#### usage/ the snippet
The snippet is very easy to use:
```php
snippet('htmlsitemap');
```



## contribution
Feel free to fork this repository an make it better.
