<article class="post-card post-card--<?= get_the_ID() ?>">
    <div class="post-card__date">
        <p>
            <time datetime="<?= date_i18n('d F Y', strtotime(get_the_date())) ?> ">
                <?= date_i18n('d F Y', strtotime(get_the_date())) ?>
            </time>
        </p>
    </div>
    <div class="post-card__title">
        <h3>
            <a href="<?php the_permalink() ?>">
                <?php the_title(); ?>
            </a>
        </h3>
    </div>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="post-card__thumbnail aspect-ratio">
            <?= the_post_thumbnail(); ?>
        </a>
    <?php endif; ?>
    <div class="post-card__category">
        <?php the_category(', '); ?>
    </div>
</article>