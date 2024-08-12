<?php
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ($comment_count === 1) {
                printf(
                    esc_html__('One comment on &ldquo;%s&rdquo;', 'your-theme'),
                    get_the_title()
                );
            } else {
                printf(
                    esc_html(_n('%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $comment_count, 'your-theme')),
                    number_format_i18n($comment_count),
                    get_the_title()
                );
            }
            ?>
        </h2>

        <ul class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ul',
                'short_ping' => true,
            ));
            ?>
        </ul><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'your-theme'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</div><!-- #comments -->
