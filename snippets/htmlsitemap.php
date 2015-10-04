<?php
// -------------------------------------------
// kirby snippet GENERAL
// Title:  htmlsitemap
// funct:  twitter bootstap carousel for photos in carousel subpage (folder)

// copyright: Jannik Beyerstedt | http://jannikbeyerstedt.de | code@jannikbeyerstedt.de
// license: http://www.gnu.org/licenses/gpl-3.0.txt GPLv3 License

// usage:
// snippet('htmlsitemap');
// see the readme.md contained in the repository

// version: 1.2.1 (05.09.2015)
// changelog:
// v1.1.0: more beautiful html markup && set ignore arrays in config
// v1.1.1: move content column class to config.php
// v1.2.0: move htmlsitemap to a snippet
// v1.2.1: add third recursion level for pages
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

?>

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

      if($p->hasChildren()) {
        echo '<li><a href="'.html($p->url()).'">'.html($p->title()).'</a></li>';
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
