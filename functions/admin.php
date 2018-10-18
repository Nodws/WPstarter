<?php
 /**
  * @package 
  * by nodws.com follow me @nodws
  */ 
  $load = $_GET['l'];

  switch($load):
    case 'css': header("Content-type: text/css"); ?> //<style> {}
   #wp-admin-bar-comments, .menu-icon-comments, #contextual-help-link-wrap, #tipo-add-toggle, #wpcf-marketing, #wpcf-group-postmeta-fields-can-unfiltered-html, .notice.elementor-message, .updated.error.otgs-is-dismissible { display:none }
   #opciones label{ user-select: none; } 
   #opciones .hide{ position: absolute; width: 5px; padding: 0px; border:0px; opacity:0 }

      <? // </style>
      break;
    case 'js':   header("Content-type: text/javascript");  ?> //<script>
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
    
    // </script>
    <? 
      break;
    default:

  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
  $logo = $image[0] ? $image[0] : td.'logo.png';
  ?>
  <style>
  .login h1, #wp-admin-bar-wp-logo { display:none }
  #adminmenu { transform: translateZ(0); }
  #login form  { width:400px; background: #ddd url(<?=$logo?>) center 20px no-repeat;padding-top:240px;margin-left:-50px; background-size:80%;}
  </style>
 
    <script>
    var $ = jQuery;
    $(document).ready(function(){
      
    });  
    </script>
  <?  
     break;
  endswitch;
