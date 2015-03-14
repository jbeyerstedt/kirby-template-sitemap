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

#### how to use
store the files of the templates folder in
	
	site/templates/

store the files of the blueprints folder in
	
	site/blueprints/

set some constants in your config.php

    c::set('smap_ignoreSite',     array('sitemap', 'htmlsitemap'));
    c::set('smap_ignoreTemplate', array('foo'));
    
smap_ignoreSite contains all sites you want to be excluded from the sitemap.  
smap_ignoreTemplate contains all templates you want to be ecxluded from the sitemap.  

But there also some other values to set:
    
    c::set('smap_heading_visible', 'visible pages (e.g. menu)');
	c::set('smap_heading_invisible', 'invisible pages (e.g. others)');

smap_heading_visible set a heading for all visible pages. These are often the pages included in the main menu, so it would be nice to title them as main menu.  
smap_heading_invisible set a heading for all invisible pages.  


## contribution
Feel free to fork this repository an make it better.