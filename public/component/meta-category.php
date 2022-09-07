<span class="c-meta__value">
  <?php //the_terms(get_the_ID(), 'category');
  ?>
  <?php stic_get_the_category(); ?>
  <?php if (has_category('pr')) : ?>
    <span class="c-label _sm_">PR</span>
  <?php endif; ?>
</span>