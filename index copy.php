<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<?php
include("include/dbconnect.php");
$con = mysql_query("select * from problemas");
$markas = "";
while($row=mysql_fetch_array($con))
{
if ($row['categoria']=="salud")
  {
    $eti = "H";
    $color = red;
  }

if ($row['categoria']=="educacion")
  {
    $eti = "E";
    $color = blue;
  
  
  }
  
if ($row['categoria']=="desarrollo")
  {
    $eti = "D";
    $color = yellow;
  }
if ($row['categoria']=="medioambiente")
  {
    $eti = "M";
    $color = green;
  }
if ($row['categoria']=="animales")
  {
    $eti = "A";
    $color = orange;
  }
if ($row['categoria']=="social")
  {
    $eti = "S";
    $color = magenta;
   
  }
 $markas = $markas . "&amp;markers=color:" . $color . "%7Ccolor:" . $color . "%7Clabel:" . $eti . "%7C" . $row['localizacion'];

}
?>
	<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Y a ti, ¿qué te importa?</title>

  <link rel="stylesheet" href="css/normalize.css" />
  
  <link rel="stylesheet" href="css/foundation.css" />
  

  <script src="js/vendor/custom.modernizr.js"></script>
  <script>
  function localiza(){
           if (navigator.geolocation) 
              navigator.geolocation.getCurrentPosition(muestra)   ;       
           
           }
           function muestra(objeto)
           {
            
            document.getElementById("mapa").innerHTML = "<img src='https://maps.googleapis.com/maps/api/staticmap?center=" + objeto.coords.latitude + "," + objeto.coords.longitude + "&amp;zoom=3&amp;size=600x480<?php echo $markas ?>&amp;sensor=false&amp;key=<?php echo $googlemapsapikey; ?>' width='600' height='480'  />";
           }
           function categoria(sCat)
           {
          
             document.getElementById("categorias").innerHTML="<div class='row'><div class='large-4 columns'><img src='img/animales.png' width='40px' /></div><div class='large-4 columns'>Animales</div><div class='large-4 columns'><a href='' onClick='return categorias();'><img src='img/flipover.png' width='40px' /></a></div></div>";
             return false;
           }
           
           </script>
</head>
<body onload="return localiza();">

	<div class="row">
		<div class="large-2 columns">
			<img src="https://www.flipover.org/assets/flipover_logo_header.png" />
			
		</div>
		<div class="large-2"></div>
		<div class="large-10 large-centered columns">
		<h3>Y a ti, ¿qué te importa?</h3>
		</div>
		
	</div>
	<div class="row">
		<div class="large-12 columns">
			<hr />
			
		</div>
		
	</div>





	<div class="row">
		<div class="large-8 columns">
			<h3>Mapa de retos sociales</h3>
            <div class="row">
		     <table width="100%">
		     <thead>
		     <tr>
		     	<th>Retos Cerca</th>
		     	<th>Total Retos</th>
		     	<th>Apoyos</th>
		     	</tr>
		     </thead>
		    <tr>
		    	<td>23</td>
		    	<td>29</td>
		    	<td>1024</td>
		    </tr>
		     </table>
		       </div>
			<!-- Grid Example -->
		    <div id="mapa"><center><img src="https://maps.googleapis.com/maps/api/staticmap?center=Bilbao, Spain&amp;zoom=3&amp;size=600x480<?php echo $markas ?>&amp;sensor=false&amp;key=<?php echo $googlemapsapikey; ?>" width="600" height="480" /></center></div>
		    
		</div>
		
		<div class="large-4 columns">
		   
		   <fieldset>
    <legend>Introduce tu reto social:</legend>
   
   <div class="row">
    <p>Elige categoría</p>
    
    <div id="categorias"><a href="" onclick="return categoria('Animales');"><img src='img/animales.png' width='40px' title="Animales" alt="Animales" /></a><img src='img/desarrollo.png' width='40px' /><img src='img/educacion.png' width='40px' /><img src='img/medioambiente.png' width='40px' /><img src='img/salud.png' width='40px' /><img src='img/social.png' width='40px' />
   </div>
   </div>
   
   
   
   
   
   
    <div class="row">
      <div class="large-12 columns">
        <label>Título del problema</label>
        <input type="text" placeholder="Título breve e impactante">
      </div>
    </div>

    

    <div class="row">
      <div class="large-12 columns">
        <label>Descripción del problema</label>
        <textarea placeholder="Describe más en detalle el problema" rows="4"></textarea>
      </div>
    </div>
   
   <div class="row">
      <div class="large-12 columns">
        <label>Localización</label>
        <input type="text" placeholder="Ciudad, País">
      </div>
    </div>
   
    <div class="row">
      <div class="large-12 columns">
        <label>Foto o vídeo</label>
        <input type="file" accept="image/*;capture=camera" value="Foto o vídeo del problema" data-role="button">
      </div>
    </div>
   <br />
   
   
    <div class="row">
      <div class="large-12 columns">
        <label>Propuesta de solución</label>
        <textarea placeholder="Describe la que pudiera ser una solución en caso de conocerla" rows="4"></textarea>
      </div>
    </div>
   
   <div class="row">
      <div class="large-12 columns">
        <label>Etiquetas</label>
        <input type="text" placeholder="Palabras clave separadas por comas">
      </div>
    </div>
   
   <div class="row">
   
   <div class="large-8 columns">
       Quiero mantenerme informado<br />
   </div>
   <div class="large-4 columns">
   
   <div class="switch">
  <input id="x" name="switch-x" type="radio" >
  <label for="x" onclick="">No</label>

  <input id="x1" name="switch-x" type="radio" checked>
  <label for="x1" onclick="">Si</label>

  <span></span>
</div>
</div>

   <div class="row">
   <div class="large-12 columns"><center><a href="" class="button">Alta de reto</a></center></div>   </div>




   </div>
   </div>
   
   
     </fieldset>

		</div>
		
	</div>
	
	<div class="row">
	
	<div class="large-2 columns"
	</div>
	
	
	
	
	
	

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  <!--
  
  <script src="js/foundation/foundation.js"></script>
  
  <script src="js/foundation/foundation.dropdown.js"></script>
  
  <script src="js/foundation/foundation.placeholder.js"></script>
  
  <script src="js/foundation/foundation.forms.js"></script>
  
  <script src="js/foundation/foundation.alerts.js"></script>
  
  <script src="js/foundation/foundation.magellan.js"></script>
  
  <script src="js/foundation/foundation.reveal.js"></script>
  
  <script src="js/foundation/foundation.tooltips.js"></script>
  
  <script src="js/foundation/foundation.clearing.js"></script>
  
  <script src="js/foundation/foundation.cookie.js"></script>
  
  <script src="js/foundation/foundation.joyride.js"></script>
  
  <script src="js/foundation/foundation.orbit.js"></script>
  
  <script src="js/foundation/foundation.section.js"></script>
  
  <script src="js/foundation/foundation.topbar.js"></script>
  
  -->
  
  <script>
    $(document).foundation();
  </script>
</body>
</html>
