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

// usage:
// see the readme.md contained in the repository

// version: 1.2.1 (14.10.2016)
// changelog:
// v1.1.0: set ignore arrays in config
// v1.2.0: exclude invisible pages
// v1.2.1: new option to switch exclusion of invisible pages at root level
// -------------------------------------------

$ignore         = c::get('smap_ignoreSite');
$ignoreTemplate = c::get('smap_ignoreTemplate');
$ignoreShowInvisibleAtRoot = c::get('smap_showHiddenPagesAtRootLevel', false);

// send the right header
header('Content-type: text/xml; charset="utf-8"');

// echo the doctype
echo '<?xml version="1.0" encoding="utf-8"?>';

?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach($pages->index() as $p):
  if($ignore !== null && in_array($p->uri(), $ignore)) continue;
  if($ignoreTemplate !== null && in_array($p->intendedTemplate(), $ignoreTemplate) ) continue;
  if($ignoreShowInvisibleAtRoot) {
    // only ignore invisible pages, which are deeper than root level
    if($p->isUnlisted() && $p->depth() > 1) continue;
  } else {
    // ignore all invisible pages
    if($p->isUnlisted() && $p->isHomePage() === false) continue;
  }
?>
  <url>
    <loc><?php echo html($p->url()) ?></loc>
    <lastmod><?php echo $p->modified('c') ?></lastmod>
    <priority><?php echo ($p->isHomePage()) ? 1 : number_format(0.5/$p->depth(), 1) ?></priority>
  </url>
<?php endforeach ?>
</urlset>
