<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/wp-blog-header.php"); 

$id = $_POST["id"]; 


$news = new WP_Query(array('post_type' => "any", 'post_status' => array('publish'), 'p' => $id));
 
    $i=0;
    while ($news->have_posts()) :
      $news->the_post();

    $id = get_the_ID();


      $content = get_field("description");
      $trimmed_content = wp_trim_words( $content, 50, '<a class="readmore" href="'. get_permalink() .'" data-id="'.$id.'"> Lire plus...</a>' );
      echo $trimmed_content;
    
    $i++;
    endwhile; 
?>
