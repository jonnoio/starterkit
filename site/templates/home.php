<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This home template renders content from others pages, the children of
  the `pictures` page to display a nice gallery grid.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>
  <?php /* snippet('intro') */ ?>
  <?php
  /*
    We always use an if-statement to check if a page exists to
    prevent errors in case the page was deleted or renamed before
    we call a method like `children()` in this case
  */
  ?>

  <?php if ($notesPage = page('notes')): ?>
  <header class="h2">
  <h2><a href="
	<?= $notesPage->url() ?> ">
	<?= $notesPage->title()->html() ?> 
  </a></h2>

  </header>

<ul class="grid">
  <?php foreach ($notesPage->children()->sortBy('date', 'desc') as $note): ?>
  <? $notescnt++; if ($notescnt <= 3 ): ?>
  <li class="column" style="--columns: 4">
      <?php snippet('note', ['note' => $note]) ?>
  </li>
  <?php endif ?>

  <?php endforeach ?>
</ul>
  <?php endif ?>

<br>
<br>

  <?php if ($photographyPage = page('pictures')): ?>
  <header class="h2">
  <h2><a href="
	<?= $photographyPage->url() ?> ">
	<?= $photographyPage->title()->html() ?> 
  </a></h2>
  </header>

	
<ul class="grid" style="--gutter: 1.5rem">
  <?php foreach ($photographyPage->children()->listed() as $project): ?>
  <? $piccnt++; if ($piccnt <= 4 ): ?>
  <li class="column" style="--columns: 3">
    <a href="<?= $project->url() ?>">
      <figure>
        <span class="img" style="--w:4;--h:5">
          <?= ($cover = $project->cover()) ? $cover->crop(400, 500) : null ?>
        </span>
        <figcaption class="img-caption">
          <?= $project->title()->html() ?>
        </figcaption>
      </figure>
    </a>
  </li>
  <?php endif ?>
  <?php endforeach ?>
</ul>

  <?php endif ?>

<br>
<br>

  <?php if ($thoughtsPage = page('thoughts')): ?>
  <header class="h2">
  <h2><a href="
	<?= $thoughtsPage->url() ?> ">
	<?= $thoughtsPage->title()->html() ?> 
  </a></h2>
  </header>

<ul class="grid">
  <?php foreach ($thoughtsPage->children()->sortBy('date', 'desc') as $note): ?>
  <? $thoughtcnt++; if ($thoughtcnt <= 3 ): ?>
  <li class="column" style="--columns: 4">
      <?php snippet('thought', ['note' => $note]) ?>
  </li>
  <?php endif ?>

  <?php endforeach ?>
</ul>

  <?php endif ?>


<?php snippet('footer') ?>
