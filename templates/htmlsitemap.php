<?php 
// -------------------------------------------
// kirby template FOR all
// Title:  sitemap
// deltas: none - base template

// based on my extended xml sitemap

// better sitemap for sites containing onepagers:
// exclude pages from sitemap by intended Template (content file name)
// so You can exclude the templates, that are only for blueprints or for selecting snippets.
 
// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// see the readme.md contained in the repository

// version: 1.1.0 (14.03.2015)
// changelog: 
// v1.1.0: more beautiful html markup && set ignore arrays in config
// -------------------------------------------

function pageExcluded($p) {
  $ignore         = c::get('smap_ignoreSite');
  $ignoreTemplate = c::get('smap_ignoreTemplate');
  
  if(in_array($p->uri(), $ignore)) {
    return true;
  }else if(in_array($p->intendedTemplate(), $ignoreTemplate) ) {
    return true;
  }else {
    return false;
  }
}

snippet('base/html-head');
snippet('base/cont-header');
snippet('plg/plg-navbar');
?>

<main class="main" role="main"><div class="container">
  <div class="row">
    <div class="section col-sm-9" id="content">
      <div class="sheet">
    <h2><?php echo $page->title() ?></h2>
    
    <div class="row">
    <div class="col-sm-6">
    <h4><?php echo c::get('smap_heading_visible')?></h4>
    <ul>
<?php
foreach($pages->visible() as $p) {
  if(pageExcluded($p)) continue;
  
  if($p->hasChildren()) {
    echo '<li><h5>'.html($p->title()).'</h5></li>';
    echo '<ul>';
    foreach($p->children()->visible() as $p) {
      if(pageExcluded($p)) continue;
      echo '<li><a href="'.html($p->url()).'">'.html($p->title()).'</a></li>';
    }
    echo '</ul>';
  }else {
    echo '<li><a href="'.html($p->url()).'">'.html($p->title()).'</a></li>';
  }
}
?>
    </ul>
    </div>
    
    <div class="col-sm-6">
    <h4><?php echo c::get('smap_heading_invisible')?></h4>
    <ul>
<?php
foreach($pages->invisible() as $p) {
  if(pageExcluded($p)) continue;
  echo '<li><a href="'.html($p->url()).'">'.html($p->title()).'</a></li>';
}
?>
    </ul>
    </div>
    </div>

      </div>
    </div><!--end col content-->
  </div><!--end row-->
</div></main>

<?php snippet('base/cont-footer') ?>
<?php snippet('base/html-end') ?>