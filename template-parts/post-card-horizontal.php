<article class="post-card post-card--<?= get_the_ID() ?> post-card--horizontal">
    <div class="post-card__date">
        <p>
            <time datetime="<?= date_i18n('d F Y', strtotime(get_the_date())) ?> ">
                <?= date_i18n('d F Y', strtotime(get_the_date())) ?>
            </time>
        </p>
    </div>
    <div class="post-card__content">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="post-card__thumbnail">
                <?= the_post_thumbnail(); ?>
            </a>
        <?php endif; ?>
        <div class="post-card__title">
            <h3>
                <a href="<?php the_permalink() ?>">
                    <?php the_title(); ?>
                </a>
            </h3>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink() ?>"><?php pll_e('CONTINUE READING'); ?></a>
        </div>
    </div>
    <div class="post-card__category">
        <?php the_category(', '); ?>
    </div>
</article>