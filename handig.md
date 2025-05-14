TODO kijken of hij gevuld is
<div class="text-white">
    <?= 
var_dump($fields);
?>
</div>



$postLink= get_the_permalink();
<a href="https://www.facebook.com/sharer/sharer.php?u=<?= $postLink ?>" target="_blank">Share on Facebook</a>
<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= $postLink ?>" target="_blank">Share on LinkedIn</a>