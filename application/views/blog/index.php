<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?=$title; ?>
      <hr/>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p class="text-right">Nombre d'articles : <?= $this->articles->num_items; ?></p>
    </div>
  </div>
  <div class="row">
    <?php if ($this->articles->has_items) : ?>
      <?php
      foreach($this->articles->items as $article) {
        $this->load->view('blog/article_resume', $article);
      }
      ?>
    <?php else: ?>
      <div class="col-md-12">
        <p class="alert alert-warning" role="alert">
          Il n'y a encore aucun article.
        </p>
      </div>
    <?php endif; ?>
  </div>
</div>
