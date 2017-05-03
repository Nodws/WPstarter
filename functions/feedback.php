<?

function custom_admin_branding_login() {
global td;

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$logo = $image[0] ? $image[0] : td.'logo.png';
?>
  <style>
  .login h1, #wp-admin-bar-wp-logo, #wp-admin-bar-comments, .menu-icon-comments, #contextual-help-link-wrap, #tipo-add-toggle, #wpcf-marketing, #wpcf-group-postmeta-fields-can-unfiltered-html { 
  display:none
  }
  #adminmenu { transform: translateZ(0); }
  #login form  { width:400px;
    background: url(<?=$logo?>) center 10px no-repeat;padding-top:140px;margin-left:-50px;
    background-size:contain;}
    
  </style>
 
    <script>
  var $ = jQuery;
  $(document).ready(function(){

  $('#postexcerpt p').hide();
  
  var timer = setInterval(count,1000);
  var secs=0, mins=0;
  setTimeout(function(){
    $('.updated.notice.notice-success p a').before('(<i>0.0</i> minutes ago) ');
  },300);
  function count() {  secs++; if (secs==60){secs = 0; mins++; }
    $('.updated.notice.notice-success p i').text(mins+'.'+Math.floor(secs/60*100)); 
   //you can add hours if infinite minutes bother you
  }
   
  });  
  </script>
  <?
  
}

add_action('login_head', 'custom_admin_branding_login');
add_action('admin_head', 'custom_admin_branding_login', 11);
/**
 *  Add options page to admin menu
 *  @args   none
 *  @return void
 */
function wpst_admin_init() {
  $widgets =  wpst_widgets();
  if($widgets){
    foreach($widgets as $widget) {
      register_setting('wpst_options', 'wpst_'.$widget['id']);
    }
  }
}

// Custom options, Label, name, optional if textarea
  function wpst_widgets() {
    global $textos;
    /*
    $textos = Array(
        Array("Text","txt1"), //Single line text
        Array("Text2","txb1", 1), //Textarea
      );
    */
    if(is_array($textos)):
      $ws=$textos;
      else:
      $ws=Array(
        Array("Text 1","txt1"),
        Array("Text 2","txt2"),
        Array("text 3","txt3"),
        Array("text 4","txt4"),
        Array("text 5","txt5"),
        Array("Text block","txb1", 1),
      );
    endif;
      return $ws;


  }
  function wpst_admin_menu() {

  // redirect if user not admin
    /*  if ( !current_user_can('edit_users') )
     {
      echo"<script>top.location='../'</script>";
      }
       */

  if (function_exists('add_dashboard_page')) {
     add_dashboard_page('Options', 'Opciones', 'edit_users', __FILE__, 'wpst_admin_page');
  }
 }

/**
 *  Generate options page content
 *  @args   none
 *  @return string
 */
function wpst_admin_page() {

  if (empty($title)) $title = __('Options');
  $ws = wpst_widgets(); 

?>
  <div class="wrap">
  <?php screen_icon(); ?>
  <h2><?php echo esc_html($title); ?></h2>

  <form method="post" action="">
    <?php settings_fields('wpst_options'); 
  if($_POST)
  echo '<div class="updated"><p>Actualizado con exito <i></i></p></div>';
?>
  
    <table class="form-table">
      <tbody>
    <?php foreach($ws as $widget): ?>
        <tr valign="top">
          <th scope="row">
            <label for="<?='wpst_'.$widget[1] ?>" title="<?='wpst_'.$widget[1] ?>"><?php echo $widget[0] ?></label>
          </th>
          <td>
          <? if(isset($widget[2])) { ?>
          
          <textarea  cols=60 rows=5 name="<?php echo 'wpst_'.$widget[1];
$val='wpst_'.$widget[1];
if($_POST){

  update_option($val, "$_POST[$val]");
}
$val = stripslashes(get_option($val));  ?>"><?=$val?></textarea>

<? } else { ?>
          <input class="at-text" name="<?php echo 'wpst_'.$widget[1];
$val='wpst_'.$widget[1];
if($_POST){

  update_option($val, "$_POST[$val]");
}
$val = stripslashes(get_option($val));  ?>" value="<?=$val?>" size=55>
<?  } ?></td>
        </tr>


    <?php endforeach; ?> 
      </tbody>
    </table>  
    <p class="submit">
      <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
  

  </div>
<?php
}
add_action('admin_menu', 'wpst_admin_menu');