<?
/**
 * @package 
 * by nodws.com follow me @nodws
 */ 

$o_k = "wpst_";
$title = "Site Options";
$options =  [
        'Option 1'=>'text',
        'Option 2'=>'text',
        'Option 3'=>'text',
        'Color 1'=>'color',
        'Color 2'=>'color',
        'Block 1'=>'textarea',
        'Block 2'=>'textarea',
        'Option 4'=>'text',
      ];


function custom_admin_branding_login() {

$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
$logo = $image[0] ? $image[0] : td.'logo.png';
?>
  <style>
  .login h1, #wp-admin-bar-wp-logo, #wp-admin-bar-comments, .menu-icon-comments, #contextual-help-link-wrap, #tipo-add-toggle, #wpcf-marketing, #wpcf-group-postmeta-fields-can-unfiltered-html, .notice.elementor-message, .updated.error.otgs-is-dismissible { 
  display:none
  }
  #adminmenu { transform: translateZ(0); }
  #login form  { width:400px;
    background: url(<?=$logo?>) center 20px no-repeat;padding-top:240px;margin-left:-50px;
    background-size:80%;}
    #opciones label{
       user-select: none;
    }
    #opciones .hide{
      position: absolute; width: 5px; padding: 0px; border:0px; opacity:0
    }
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
   $("#opciones label").on("click",function(e){
     e.preventDefault();
     e.stopPropagation();
    let txt = $(this).attr('title'),
      el = $(this).next('input');
      el.val(txt);
      el.select(); 
    console.log(txt);
    document.execCommand('copy');
    el.blur();
   });
  });  
  </script>
  <?
  
}

add_action('login_head', 'custom_admin_branding_login');
add_action('admin_head', 'custom_admin_branding_login', 11);


  function wpst_widgets() {
    global $options;
 
    if(!is_array($options)):
      $options =  [
        'Option 1'=>'text',
        'Option 2'=>'text',
        'Option 3'=>'text',
        'Block 2'=>'textarea',
      ];
   
    endif;
      return $options;
  }
  function wpst_admin_menu() {
  // soft redirect if user not admin
    /*  if ( !current_user_can('edit_users') )
     {
      echo"<script>top.location='../'</script>";
      }  */
     add_dashboard_page('Options', 'Opciones', 'edit_users', 'options', 'wpst_admin_page');
  }

function wpst_admin_page() {
  global $o_k, $title;
?>
  <div class="wrap">  
 
  <h1><i class="wp-menu-image dashicons-before dashicons-admin-settings" style="color:#333"></i><?=$title?></h1>

  <form method="post" action="">
    <?php settings_fields('wpst_options'); 
  if($_POST)
  echo '<div class="updated"><p>Actualizado con exito <i></i></p></div>';
?>  
    <table class="form-table">
      <tbody>
    <?php  
    $n = [];
    foreach(wpst_widgets() as $k => $wd):          
         $n[$wd] =  isset($n[$wd]) ? $n[$wd] + 1 : 1 ;
         $i = $n[$wd];
         $v_k = $wd.$i;
         $var=$o_k.$v_k;
    ?>
    <tr><th><label for="<?=$var ?>" title="<?=$v_k ?>"><?=$k?></label></th><td>
 <? 
  //if widget textarea
 if($wd=='textarea'):           
  if($_POST)
    update_option($var, base64_encode($_POST[$var]));  
    ?>
      <textarea  cols=60 rows=5 name="<?=$var?>"><?=get_var($v_k)?></textarea>
    <? //else single line 
    else:   
  if($_POST)
    update_option($var, base64_encode($_POST[$var]));
       ?>
      <input type="<?=$wd?>" name="<?=$var ?>" value="<?=get_var($v_k)?>" size=55>
    <? 
      endif; //end if widget 
    ?></td>        </tr>

    <?php endforeach; 
      ?> 
      </tbody>
    </table>  
    <p class="submit">
      <input type="submit" class="button-primary" value="Update" />
    </p>
  <blockquote style="font-size:12px;background:  #fff;padding: 20px;">
    Call with <b>&lt;?=get_var('text1')?></b> or <b>[get_var id='text1']</b>
  </blockquote>

  </div>
<?php
}

add_action('admin_menu', 'wpst_admin_menu');


function getoption($atts){
		$a = shortcode_atts( array('id' => '' ), $atts );
		return get_var($a[id]);
	}
add_shortcode('get_var','getoption');
//get with the times Automattic
add_filter('widget_text','do_shortcode');

function get_var($var,$fun=false){
  global $o_k;
  $r = noslash(base64_decode(get_option($o_k.$var)));
  if(!$fun)
    return $r;
  elseif($fun===true)
    echo $r;
  else
    return $fun($r);

}

function noslash($txt){
  return str_replace('\\','',trim($txt));
}

