<?php
// clase para mostrar noticias
class Noticias
{

	function palabras($selecc){
		$frase = " ";
		$noticias = 3;
		$fuente = [];
		$descripcion_fuente = "";
		
		 switch($selecc){
		 
				case "g": 
					$fuente[] = "https://www.telam.com.ar/rss2/ultimasnoticias.xml";
					$fuente[] = "https://www.telam.com.ar/rss2/politica.xml";
					$fuente[] = "https://www.diariouno.com.ar/rss/politica.xml";
					$fuente[] = "https://www.diariouno.com.ar/rss/economia.xml";
                    $descripcion_fuente = 'Generales';
					break;
				
				case "p":
											
					$fuente[] = "https://www.telam.com.ar/rss2/politica.xml";
					$fuente[] = "https://www.diariouno.com.ar/rss/politica.xml";
                    $descripcion_fuente = 'Política';
					
				break;
					
				case "l":
					$fuente[] = "https://paralelo32.com.ar/feed/";
                    $descripcion_fuente = 'Locales';
				break;
				
				case "n":
					$fuente[] = "https://www.telam.com.ar/rss2/politica.xml";
					$fuente[] = "https://www.telam.com.ar/rss2/economia.xml";
					$fuente[] = "https://www.telam.com.ar/rss2/sociedad.xml";
                    $descripcion_fuente = 'Nacionales';
				break;
				
				case "i":
				$fuente[] = "https://www.telam.com.ar/rss2/internacional.xml";
				$fuente[] = "https://www.telam.com.ar/rss2/latinoamerica.xml";
				$fuente[] = "https://www.telam.com.ar/rss2/conosur.xml";
                $descripcion_fuente = 'Internacionales';		
				break;
				
				case "d":
				$fuente[] = "https://www.diariouno.com.ar/rss/ovacion.xml";
                $descripcion_fuente = 'Deportes';
				break;
				
				case "e";
                    $fuente[] = "https://www.diariouno.com.ar/rss/espectaculos.xml";
                     $descripcion_fuente = 'Espectáculo';
                    
				break;
				
	}
	?>	
    <div class="container">
    <div class="mbr-section-head">
        <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
            <strong>Noticias - <?php echo $descripcion_fuente;?></strong><strong><br></strong></h4>
        <div class="row mt-4">

     <?php

		// recorremos el XML con el foreach
		$nn = 0;
     
        foreach ($fuente as $archivo)
        {

            $xml = simplexml_load_file($archivo);
            $encabezado = $xml->channel->title;


            foreach ($xml->channel->item as $item)
            {
               // var_dump($item);

                if ($nn == $noticias) break 2; //limite de noticias a mostrar
                
                        $titulo = $item->title;
                        $descripcion = $item->description;
                        $publicado = $item->description;
                        $imagen = $item->enclosure['url'];
                       // var_dump($imagen);
                        $enlace = $item->link;
                            if (strpos($descripcion, $frase)){
                                ?>
                                <div class="item features-image сol-12 col-md-6 col-lg-4">
                                    <div class="item-wrapper">
                                        <div class="item-img">
                                            <?php
                                            if($imagen != NULL){
                                                echo '<img src="'.$imagen.'" alt="" title="">';
                                            }else{
                                                echo '<img src="assets/images/fm-sensacion-logo-121x92.png" style="padding: 60px;" alt="Radio Sensación 90.5 - Oro verde" title="Radio Sensación 90.5 - Oro verde">';
                                            }
                                            
                                            ?>
                                        </div>
                                        <div class="item-content">
                                            <h5 class="item-title mbr-fonts-style display-6 text-center">
                                                <strong><?php echo $titulo;?></strong>
                                            </h5>
                                            <h6 class="item-subtitle mbr-fonts-style mt-1 display-7 text-center">
                                               <?php echo $encabezado;?>
                                            </h6>
                                            <p class="mbr-text mbr-fonts-style mt-3 display-7"><?php echo $descripcion;?></p>
                                        </div>
                                        <div class="mbr-section-btn item-footer mt-2">
                                            <a href="<?php echo $enlace;?>" class="btn item-btn btn-primary display-7" target="_blank">Leer más
                                                &gt;</a>
                                        </div>
                                    </div>
                                </div>
                                <?php    
                            }
                $nn = $nn+1;            
            
            }   
            
        }
	?>
    </div>    
   </div> 
  </div>
 </div>
<?php	
	}

}





?>