<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/wp-blog-header.php"); 
$id = $_POST["id"]; 


$news = new WP_Query(array('post_type' => "any", 'post_status' => array('publish'), 'p' => $id));


?>

<?php 
    $i=0;
    while ($news->have_posts()) :
      $news->the_post();

    $id = get_the_ID();

?>

    <?php 
        $content = get_field("description");
        echo $content;
        echo ('<a class="readless" href="'. get_permalink() .'" data-id="'.$id.'"> Réduire...</a>' );

    ?>

<?php     
    $i++;
    endwhile; 
?>
