<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The note snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets

Jon Line was:
      <?= $note->text()->toBlocks()->excerpt(400) ?>

*/
?>
<article class="note-excerpt">
  <a href="<?= $note->url() ?>">
    <header>

      <h2 class="note-excerpt-title"><?= $note->title() ?></h2>
      <time class="note-excerpt-date" datetime="<?= $note->published('c') ?>"><?= $note->published() ?></time>
    </header>
    <?php if (($excerpt ?? true) !== false): ?>
    <div class="note-excerpt-text">
      <?= $note->text()->toBlocks()->excerpt(240) ?>
    </div>
    <?php endif ?>
  </a>
</article>
