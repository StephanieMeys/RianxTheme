<?php 
/**
 * Header Navigation template.
 * 
 * @package rianxtheme
*/

$menu_class = \RIANX_THEME\Inc\Menus::get_instance();
$hearder_menu_id =$menu_class->get_menu_id( 'rianx-header-menu' );

$header_menus = wp_get_nav_menu_items( $hearder_menu_id );
?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <?php 
        if ( function_exists( 'the_custom_logo' ) ) { 
            the_custom_logo(); 
        } 
        ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <?php 
            if ( ! empty( $header_menus ) && is_array( $header_menus ) ) {
                ?>
                <ul class="navbar-nav mr-auto">
                    <?php 
                    foreach ( $header_menus as $menu_item ) {
                        if ( ! $menu_item->menu_item_parent) {

                            $child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID );
                            $has_children = ! empty( $child_menu_items ) && is_array( $child_menu_items );

                            if ( ! $has_children ) {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= esc_url( $menu_item->url ); ?>"><?= esc_html( $menu_item->title ); ?></a>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="<?= esc_url( $menu_item->url ); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= esc_html( $menu_item->title ); ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php 
                                        foreach ( $child_menu_items as $child_menu_item ) {
                                            ?>
                                            <li>
                                                <a class="dropdown-item" href="<?= esc_url( $child_menu_item->url ); ?>"><?= esc_html( $child_menu_item->title ); ?></a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        }
                    }
                    ?>
                </ul>
                <?php 
            }
            ?>
            
            <form class="form-inline my-2 my-md-0 ms-auto">
                <input class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </div>
</nav>