<?php get_header(); ?>
	
    <div  class="main" id="main_category">

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
       	</div><!--Titelbild -->
        
        
        <h1 style="background-color:
            <?php  
			
            switch ($category_name_lc) {
			case "allgemein":
				echo "#999";
				break;
			case "produktion":
				echo "#009FE3";
				break;
			case "propaganda":
				echo "#43E344";
				break;
			case "verfolgung":
				echo "#F4EE4C";
				break;
			case "widerstand":
				echo "#FF4B56";
				break;
}
             ?>"><?php single_cat_title(); ?></h1>
          <?php 
		    $zähler = 1;
		    $current_category = single_cat_title("", false);
			$current_categoryID = get_cat_ID($current_category); 
			$args = array ( 'category' =>  $current_categoryID, );
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post);
			
			 ?>
             
            <div id="beiträge<?php if($zähler%2 == 0){echo 2;} ?>">
            
           
            
			<center><a href="<?php the_permalink(); ?>"><h3><?php the_title();
			if(has_post_thumbnail($page->ID)){
					
					
			$zähler++;
			 ?></h3></a></center>
             
             <table border="0" >
            	<tr>
                	<td>	<?php  
			 	
			 	echo get_the_post_thumbnail($page->ID,'thumbnail');
				}else{
					echo get_the_post_thumbnail(45,'thumbnail');
				} 
				?>
				</td>
                <td style="padding-left:20px;">
				<?php
				$my_excerpt = get_the_excerpt();
					if ( $my_excerpt != '' ) {
						// Some string manipulation performed
					}
					echo $my_excerpt; // Outputs the processed value to the page
									?>
             </td></tr></table>
            </div>
           
			<?php endforeach; ?>
     
      
        
        
        </div><!-- main -->
    
       
<?php get_footer(); ?>