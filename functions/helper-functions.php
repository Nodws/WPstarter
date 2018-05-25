<?php

//Redirect on login
if( !current_user_can('editor') && !current_user_can('administrator') ):
	add_action('wp_logout','auto_redirect_after_logout');
	function auto_redirect_after_logout(){
	  wp_redirect( home_url().'/?welcome' );
	  exit();
	}
endif;

/* States Dropdown */
    function estados($s=''){
       ?>
 
 <select id="estado" multiple='true' class="chosen-select" data-placeholder="Selecciona...">
  <?
  $sel  = $s ? explode(',',$s) : '';
  $e = explode(",","Aguascalientes,Baja California,Baja California Sur,Campeche,Chiapas,Chihuahua,Coahuila,Colima,CDMX,Durango,Estado de México,Guanajuato,Guerrero,Hidalgo,Jalisco,Michoacán,Morelos,Nayarit,Nuevo León,Oaxaca,Puebla,Querétaro,Quintana Roo,San Luis Potosí,Sinaloa,Sonora,Tabasco,Tamaulipas,Tlaxcala,Veracruz,Yucatán,Zacatecas");
      
      foreach ($e as $v) {
            setlocale(LC_CTYPE, 'cs_CZ');
        $val = str_replace(" ","-",strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $v)));
         $sl = in_array($val, $sel) ? 'selected' : '' ;
        echo "<option value='$val' $sl>$v";
      }
   
    ?>
    </select>
	<input id="csv" name="estados">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.5/chosen.jquery.min.js"></script>
   <script>
   var $ = jQuery;
   $(".chosen-select").chosen({max_selected_options: 5});
     var selMulti = $.map($("#estado option:selected"), function (el, i) {
         return $(el).text();
     });
$("#estado").on("change",function(e){
   var selMulti = []; 
   $("#estado option:selected").each(function(){
        selMulti.push( $(this).val());
     });
     $("#csv").val(selMulti.join(","));
  // e.preventDefault();
  // return false;
});
</script>
<link rel="stylesheet" href="https://harvesthq.github.io/chosen/chosen.css">
<?php
    }
