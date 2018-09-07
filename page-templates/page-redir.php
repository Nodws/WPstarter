<? 
/**
 * Template name: Redir
 *
 * @package WPstarter
 */
$pageChilds = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($pageChilds) {
$firstchild = $pageChilds[0];
wp_redirect(get_permalink($firstchild->ID));
}
exit;
