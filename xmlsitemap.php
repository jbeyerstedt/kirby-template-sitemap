<?php 
// -------------------------------------------
// kirby template FOR all
// Title:  xmlsitemap
// deltas: none - base template

// better sitemap for sites containing onepagers:
// exclude pages from sitemap by intended Template (content file name)
// so You can exclude the templates, that are only for blueprints or for selecting snippets.
 
// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// version: 1.0 (14.02.2015)
// changelog: 
// -------------------------------------------

$ignore = array('sitemap', 'error');
$ignoreTemplate = array('carousel');

// send the right header
header('Content-type: text/xml; charset="utf-8"');

// echo the doctype
echo '<?xml version="1.0" encoding="utf-8"?>';

?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($pages->index() as $p):
  if(in_array($p->uri(), $ignore)) continue;
  if(in_array($p->intendedTemplate(), $ignoreTemplate) ) continue;
?>
  <url>
    <loc><?php echo html($p->url()) ?></loc>
    <lastmod><?php echo $p->modified('c') ?></lastmod>
    <priority><?php echo ($p->isHomePage()) ? 1 : number_format(0.5/$p->depth(), 1) ?></priority>
  </url>
<?php endforeach ?>  
</urlset>