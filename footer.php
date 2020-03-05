        </div>
        <footer class="footer-site">

            <?php get_sidebar('footer'); ?>

            <div class="liner text-center">
                <nav id="footer-nav" role="navigation">
                    <h2 class="assistive-text">Footer links</h2>
                    <?php
                        $menu_args = array(
                            'theme_location' => 'footer',
                            'container' => false,
                            'menu_class' => 'menu-inline',
                        );
                    ?>
                    <?php wp_nav_menu($menu_args); ?>
                </nav>

                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> All rights reserved.</p>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>