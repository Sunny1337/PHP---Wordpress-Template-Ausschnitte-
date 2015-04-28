	<?php get_header(); ?>
    
        <div id="single-main" class="main">
       
          <div id="titelbild" style="background-image:url(
          
		
<?php
		$category = get_the_category();		
		$category_name = $category[0] -> cat_name;
		$category_ID = get_cat_ID( $category_name );		
		$category_name_lc = strtolower($category_name);
		
		$Id = get_the_ID();
		$titel = get_the_title();
		$dir = "http://pstud8.mt.haw-hamburg.de/var/www/wp-content/gallery/titelbilder/";
		$dirHandle =opendir($dir); 
		$var1 = 0;
		$bild1 = 'http://pstud8.mt.haw-hamburg.de/wp-content/gallery/titelbilder/'.$category_name_lc.'.jpg';
		$bild = fopen($bild1,'r');
		
		 
			
            switch ($category_name_lc) {
			case "allgemein":
				$farbe="#999";
				break;
			case "produktion":
				$farbe="#009FE3";
				break;
			case "propaganda":
				$farbe="#43E344";
				break;
			case "verfolgung":
				$farbe="#F4EE4C";
				break;
			case "widerstand":
				$farbe="#FF4B56";
				break;
			}
				
            
			/*while ($file = readdir($dirHandle)) { 
				if($file != 'thumbs' && $file != '..'){
				$dateiinfo = pathinfo($dir.$file);
				$dateiname = $dateiinfo["filename"];
				$dateinameklein = strtolower($dateiname);
				$titelklein = strtolower($titel);
				
				if(stripos($dateiname,$category_name_lc) !== false){*/
					if($bild === false){
						
						echo"http://pstud8.mt.haw-hamburg.de/wp-content/gallery/titelbilder/custom_titelbild.jpg";
						$var1 = 1;
					}else{
						echo $bild1;
					}
					
							
				//}
				//}
			//}	
		
		/*if($var1 == 0){	
			
			echo"http://pstud8.mt.haw-hamburg.de/var/www/wp-content/gallery/titelbilder/custom_titelbild.jpg";
            
		}*/
		
		//closedir($dirHandle); 	
?>
		); width:100%;  height:250px;">		
		<?php 
		
		//the_category();	 
		?>        
       	</div><!-- Titelbild -->
      	
       
       	<div id="Posts">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1 style="background-color:<?php echo $farbe;?>">
			<?php 
			$aktueller_Post_Title = get_the_title(); 
			the_title(); ?></h1>
            <div class="entry">
        <?php the_content(); 
		
		
	
		
		?>

       
        <?php endwhile; endif; ?> 
        
        
        
        
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();    

 $args = array(
   'post_type' => 'attachment',
   'numberposts' => -1,
   'post_status' => null,
   'post_parent' => $post->ID
  );

  $attachments = get_posts( $args );
     if ( $attachments ) {
        foreach ( $attachments as $attachment ) {
          
           //echo wp_get_attachment_image( $attachment->ID, array(32,32) );
		   $image_attributes = wp_get_attachment_image_src( $attachment->ID);
		   
		  	
			
			?> 
			<a href="<?php echo wp_get_attachment_url($attachment->ID); ?>"data-lightbox="image-1"><img src="<?php echo $image_attributes[0]; ?>" width="<?php echo $image_attributes[1]; ?>" height="<?php echo $image_attributes[2]; ?>"></a>
            <?php
          
           //echo apply_filters( 'the_title', $attachment->post_title );
          
          }
     }

 endwhile; endif; ?>

        
    </div><!--Entry -->     
        
        
        
        
        
        
        
        
        
        <hr />
        <script type="text/javascript">
			if(screen.width >= 1024 ){
				var t = 1;
				document.write('<table border="0" id="artikel-tabelle"><tr><td>');
				
				
			}
			else{
				t = 0;
			}
			
			</script>
        
        
        
      

        
 
        
        <h2> Weitere Artikel aus der Kategorie <?php echo $category_name; ?> </h2>
       <?php


		$args = array('posts_per_page' => 3,'orderby' => 'rand','category' => $category_ID);
		
		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
				
				<div id="artikel" style="border-left:solid 5px <?php echo $farbe; ?>; border-right:solid 5px <?php echo $farbe; ?>" ><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			
		<?php endforeach; 
		wp_reset_postdata();?>
       
       <?php
	   $andereKategorien = array();
		$category_ids = get_all_category_ids();
		foreach($category_ids as $cat_id) {
			if($cat_id != $category_ID){
			array_push($andereKategorien, $cat_id);
			}
			}
		  /*$cat_name = get_cat_name($cat_id);
		  echo '<br>'.$cat_id . ' : ' . $cat_name;
		
		print_r($andereKategorien);
		*/
		$comma_separated = implode(",", $andereKategorien);
		/*echo  $comma_separated;*/
		
		?>
        <script type="text/javascript">
		 if(t == 1){
			 
			 document.write("</td><td>");
		 };
		</script>
       
        
        
         
         
         <h2> Weitere Artikel aus anderen Kategorien</h2>
          <?php
            $args = array('posts_per_page' => 4,'orderby' => 'rand','category'=> $comma_separated );
            $myposts = get_posts( $args );
			
					
			
            foreach ( $myposts as $post ) : setup_postdata( $post );
			$category2 = get_the_category($post);		
			$category_name2 = $category2[0] -> cat_name;  
            $category_name_lc2 = strtolower($category_name2);
			
			
			 switch ($category_name_lc2) {
			case "allgemein":
				$farbe2="#999";
				break;
			case "produktion":
				$farbe2="#009FE3";
				break;
			case "propaganda":
				$farbe2="#43E344";
				break;
			case "verfolgung":
				$farbe2="#F4EE4C";
				break;
			case "widerstand":
				$farbe2="#FF4B56";
				break;
}?>
                    <div id="artikel" style="border-left:solid 5px <?php echo $farbe2; ?>; border-right:solid 5px <?php echo $farbe2; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                
            <?php endforeach; 
		wp_reset_postdata();?>
        <script type="text/javascript">
		 if(t == 1){
			 
			 document.write("</td></tr></table>");
			 
		 };
		</script>
         
        </div><!-- Posts -->
        
       
        
        </div><!-- main -->
    
       
      <?php get_footer(); ?>
	  
      
     