<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Travel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
</head>
<body <?php body_class(); ?>>
    <div class="container">
    <?php if (have_posts()): ?>
        <?php while(have_posts()): ?>
            <?php the_post(); ?>

            <article <?php post_class(); ?>>
                <?php if (is_single()): ?>
                <h1>
                    <?php the_title(); ?>
                </h1>
                <?php else: ?>
                    <h1>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>
                <?php endif; ?>
                <div class="postinfo">
                    <time datetime="<?= get_the_date('Y-m-d'); ?>"><i class="fa fa-clock-o"></i> <?= get_the_date('Y年m月d日'); ?></time>
                    <span class="postcate">
                        <i class="fa fa-folder-open"></i> <?php the_category(','); ?>
                    </span>
                </div>

                <?php wp_trim_words( the_content(), 80 ); ?>

                <?php if (is_single()): ?>
                <div class="pagenav">
                    <span class="old">
                        <?php previous_post_link('%link','<i class="fa fa-chevron-circle-left"></i> %title'); ?>
                    </span>

                    <span class="new">
                        <?php next_post_link('%link', '%title <i class="fa fa-chevron-circle-right"></i>'); ?>
                    </span>
                </div>
                <?php endif; ?>

                <?php if ($wp_query->max_num_pages > 1): ?>
                    <div class="pagenav">
                    <span class="old">
                        <?php next_post_link('%link', '<i class="fa fa-chevron-circle-right"></i> 前ページへ'); ?>
                    </span>

                    <span class="new">
                        <?php previous_post_link('%link','次ページへ <i class="fa fa-chevron-circle-left"></i>'); ?>
                    </span>
                    </div>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
    </div> <!-- container -->
</body>
</html>