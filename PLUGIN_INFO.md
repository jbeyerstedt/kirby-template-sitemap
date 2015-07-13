## this sitemap-template has some special features

- the settings are moved to the config.php
- you can ignore special sites by it´s uri
- and you can ignore sites by the template it uses !  
in detail it is the "intended template", aka filename of the content file!

I needed this variation of the classic xmlsitemap of Bastian Allgeier to exclude onepager sections and sites/folders only needed to structure content. Because the fact that these pages were in the sitemap, but not accessable confused Google and there were too many links to sections of my site in my Google search results.

Another variation is a html version of the sitemap to be displayed to the website visitor. It´s a simple hierarchical view.


#### installation
store the files of the templates folder in
	
	site/templates/

store the files of the blueprints folder in
	
	site/blueprints/

There are two files each! One is for the xml sitemap, one for an html sitemap, which is human readable.

#### html sitemap
Currently the html sitemap template uses some special snippets I use for my html header and footer. Because of that eveyone should modify this template for their own template structure.  
But this will be changed soon!!! See upcomign features or feel free to fork and submitt a pull-request!


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


## upcoming features
I want to replace my html sitemap template with a snippet, so that eveyone can have it´s own sitemap template with a uniform snippet generating the content.


## contribution
Feel free to fork this repository an make it better.