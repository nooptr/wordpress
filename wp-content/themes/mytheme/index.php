<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Travel</title>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
</head>
<body <?php body_class(); ?>>
<?php if (have_posts()): ?>
    <?php while(have_posts()): ?>
        <?php the_post(); ?>

        <article <?php post_class(); ?>>
            <?php the_title('<h1>', '</h1>'); ?>

            <div class="postinfo">
                <time datetime="<?= get_the_date('Y-m-d'); ?>"><?= get_the_date('Y年m月d日'); ?></time>
                <span class="postcate">
                    <?php the_category(','); ?>
                </span>
            </div>

            <?php the_content(); ?>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
</body>
</html>