<?php /*
Template Name: Themen_Seiten
*/
?>

<?php get_header(); ?>

	<div class="main" id="main_themen_seiten">

    	<div id="titelbild" style="background-image:url(
        
<?php
		$Id = get_the_ID();
		$titel = get_the_title();
		$dir = "/users/flo25902/www/wp-content/gallery/titelbilder/";
		$dirHandle =opendir($dir); 
		$var1 = 0;
		
			while ($file = readdir($dirHandle)) { 
				if($file != 'thumbs' && $file != '..'){
				$dateiinfo = pathinfo($dir.$file);
				$dateiname = $dateiinfo["filename"];
				$dateinameklein = strtolower($dateiname);
				$titelklein = strtolower($titel);
				if(stripos($dateiname,(string)$Id)!== false){
						echo "http://flo25902.square7.ch/wp-content/gallery/titelbilder/" . $file;
						$var1 = 1;
							
				}
				}
			}	
		
		if($var1 == 0){	
			
			echo"http://flo25902.square7.ch/wp-content/gallery/titelbilder/custom_titelbild.jpg";
            
		}
		
		closedir($dirHandle); 	
?>
		); width:100%;  height:250px;">		
				        
       	</div><!--Titelbild -->
   
	
    <div id="text">
            
            <div id="content" class="widecolumn">
    <?php if (have_posts()) : while (have_posts()) : the_post();?>
    <div class="post">
        
        <div class="entrytext">
            <?php the_content('<p class="serif">Read the rest of this page »</p>'); ?>
        </div>
    </div>
    <?php endwhile; endif; ?>

	</div>
 </div><!--Text -->
 	<br />
    <br />
     <table border="1" width="100%">
    	<tr>
        <td width="50%" valign="top">  <h2> Weitere Artikel</h2>
  	<br />
   <?php


		$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );
	$y = 0;
	$anzahlArtikel = count($mypages);
	foreach( $mypages as $page ) {	
		$content = $page->post_content;
		
		$content = apply_filters( 'the_content', $content );
		$contentsub = substr($content,0,200);
		$anzahlArtikel --;	
		$x = rand ( 0 , 1 );
		
		if($anzahlArtikel == 3 && $y == 0){
			$x =1;
		}
		if($anzahlArtikel == 2 && $y == 1){
			$x=1;	
		}
		if($anzahlArtikel == 1 && $y == 2){
			$x=1;	
		}
			if($x == 1 && $y <=2){
				$y++;
			?>
			<div id="artikel">
				<table id="artikeltable" border="0">
                	<tr>
                    <td>
				<a href="<?php echo get_page_link( $page->ID );?>">
				<?php
				echo $page->post_title . '<br>';
				?>
                <div id="thumbnail">
                <?php
				if(has_post_thumbnail($page->ID)){
					
					echo get_the_post_thumbnail($page->ID, array(150,150)).' </div></td>';
				}else{
					echo get_the_post_thumbnail(45, array(150,150)).' </div></td>';
				}
					
				echo '<td valign="top"><br>'.$contentsub.'... </td>';
				?>
               
                </tr>
                </table>
                
                <?php
				?></div><br /><?php
				
			}
		
	}	
	
	 ?></td>
        <td width="50%" valign="top" > <h2> Weitere Artikel anderer Kategorien</h2>
  	<br />
   <?php


		$mypages = get_pages( array('sort_column' => 'post_date', 'sort_order' => 'asc' ) );
	$y = 0;
	$anzahlArtikel = count($mypages);
	foreach( $mypages as $page ) {	
		$content = $page->post_content;
		
		$content = apply_filters( 'the_content', $content );
		$contentsub = substr($content,0,200);
		$anzahlArtikel --;	
		$x = rand ( 0 , 1 );
		
		if($anzahlArtikel == 3 && $y == 0){
			$x =1;
		}
		if($anzahlArtikel == 2 && $y == 1){
			$x=1;	
		}
		if($anzahlArtikel == 1 && $y == 2){
			$x=1;	
		}
			if($x == 1 && $y <=2){
				$y++;
			?>
			<div id="artikel">
				<table id="artikeltable" border="0">
                	<tr>
                    <td>
				<a href="<?php echo get_page_link( $page->ID );?>">
				<?php
				echo $page->post_title . '<br>';
				?>
                <div id="thumbnail">
                <?php
				if(has_post_thumbnail($page->ID)){
					
					echo get_the_post_thumbnail($page->ID, array(150,150)).' </div></td>';
				}else{
					echo get_the_post_thumbnail(45, array(150,150)).' </div></td>';
				}
					
				echo '<td valign="top"><br>'.$contentsub.'... </td>';
				?>
               
                </tr>
                </table>
                
                <?php
				?></div><br /><?php
				
			}
		
	}	
	
	 ?></td>
       
        </tr>
        </table>
 
  	
 	 
  
   
   
     
   
</div><!--Main -->


 <?php get_footer(); ?>