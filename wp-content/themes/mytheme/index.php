<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet' type='text/css'>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>
        <div class="siteinfo">
            <div class="container">
                <h1>
                    <a href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a>
                </h1>
                <p><?php bloginfo('description'); ?></p>
            </div>
        </div>
    </header>

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
                        <?php next_post_link('%link', '<i class="fa fa-chevron-circle-right"></i> 前ページへ'); ?>
                    </span>

                    <span class="new">
                        <?php previous_post_link('%link','次ページへ <i class="fa fa-chevron-circle-left"></i>'); ?>
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

    <footer>
        <div class="container">
            <small>Copyright &copy; <?php bloginfo('name'); ?></small>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html>