<?php
$errors = array(); // Initialize $errors as an empty array

if (count($errors) > 0) :
?>
<div class="error" style="color:rgb(255, 153, 153);text-align: center;">
    <?php foreach ($errors as $error) : ?>
    <p><?php echo $error ?></p>
    <?php endforeach ?>
</div>
<?php endif ?>
