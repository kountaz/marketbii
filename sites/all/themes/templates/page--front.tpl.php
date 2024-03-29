<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>
<?php unset($page['content']['system_main']['default_message']);
print render($page['content']); ?>
<div id="toplinks">
    <div class="center">
        <div class="left">
            <a href="http://www.probonolab.org/">Pro Bono Lab</a> &nbsp;|&nbsp;
            <a href="http://www.marathonprobono.fr">Marathons</a> &nbsp;|&nbsp;
            <a href="http://www.pro-bono.fr/">Blog</a> &nbsp;|&nbsp;
            <a href="http://www.civisphere.org">Civisphere</a>

        </div>

        <div class="right-home">
            <!-- Like facebook -->

            <script>(function(d, s, id) {

                var js, fjs = d.getElementsByTagName(s)[0];

                if (d.getElementById(id)) return;

                js = d.createElement(s); js.id = id;

                js.src = "//connect.facebook.net/fr_FR/all.js#xfbml=1";

                fjs.parentNode.insertBefore(js, fjs);

            }(document, 'script', 'facebook-jssdk'));</script>

            <div class="fb-like" data-href="http://www.facebook.com/ProBonoLab" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>


            <!--LOGIN-->
            <div id="login">
            <div id="topnav" class="topnav">
                <?php if ($logged_in && $secondary_menu): ?>
                <div class="logged">
                    <?php foreach($secondary_menu as $menu) { ?>
                    <a href="<?php print $front_page.$menu['href']; ?>" class="<?php print $menu['title']; ?>"><span><?php print $menu['title']; ?></span></a> <?php print $ou = empty($ou) ?  '<em>ou</em>' : ''; ?>
                    <?php } ?>
                </div>
		        </div>
		        <?php else: ?>
                <?php
                !empty($page['header']) ? print render($page['header']) : print '<div class="logged"></div></div>'; ?>
                <?php endif; ?>
            </div>

            <!--END LOGIN-->
        </div>
    </div>
</div>
<!--CORPS-->
<div id="corps">
    <!--HEADER-->
    <div id="header">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo" class="logo">LOGO</a>

        <img src="../img/Tagline01.png" alt="" >

        <?php if ($page['navigation'] || $main_menu): ?>
        <div id="bloc-menu-principal">
            <ul id="menu-principal" class="menu-prinicipal">
                <?php foreach($main_menu as $menu) { ?>
                <li><a href="<?php $menu['href'] == '<front>' ? print $front_page : print drupal_get_path_alias($menu['href']); ?>" class="<?php print strtolower($menu['title']); ?>"><?php print $menu['title']; ?></a></li>
                <?php } ?>
            </ul>
        </div><!-- /#navigation menu -->
        <?php endif; ?>

    </div>
    <!--END HEADER-->

    <!--CONTENT-->
    <div id="content">
        <div id="highlighted">
            <?php print render($page['highlighted']); ?>
        </div>
        <div id="bottom">
            <?php print render($page['bottom']); ?>
            <div class="clear"></div>
        </div>
        <div>
            <div id="sidebar-first" class="float-left">
                <?php print render($page['sidebar_first']); ?>
            </div>
            <div id="sidebar-second" class="float-right">
                <?php print render($page['sidebar_second']); ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!--END CONTENT-->
    <?php if ($page['footer_top']): ?>
    <div id="footer_top">
        <?php print render($page['footer_top']); ?>
        <div id="lien_partenaire">
            <a href="/a-propos-du-lab"> Voir tous les partenaires </a>
        </div>
    </div>
    <?php endif; ?>
    <?php print render($page['footer']); ?>

</div><!--END CORPS-->


