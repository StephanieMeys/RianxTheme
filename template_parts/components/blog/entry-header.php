<?php 
/**
 * Teplate for post entry header
 *
 * @package rianxtheme
*/

$the_post_id = get_the_ID();
$has_post_thumbnail = get_the_post_thumbnail( $the_post_id );
?>
<header class="entry-header">
    <?php
    // featured image
    if ( $has_post_thumbnail ) {
        ?>
        <div class="entry-image mb-3">
            <a href="<?= esc_url( get_permalink() ); ?>">
                <?php 
                the_post_custom_thumbnail(
                    $the_post_id,
                    'featured-thumbnail',
                    [
                        'sizes' => '(max-width: 350px) 350px, 233px',
                        'class' => 'attachment-featured-large size-featured-image'
                    ]
                )
                ?>
            </a>
        </div>
        <?php
    }
    ?>
</header>