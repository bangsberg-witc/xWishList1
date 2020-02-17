<?php include_once '../view/header.php'; ?>

<h1>Mariah ASG08 Photo's</h1>



<img src="<?php echo "images/$imageName"; ?>" alt="" height='auto' width='420'/>
<br>
<a href='photo_manager/?id=1'>Image1</a>
<a href='photo_manager/?id=2'>Image2</a>
<a href='photo_manager/?id=3'>Image3</a>
<a href='photo_manager/?id=4'>Image4</a>
<a href='photo_manager/?id=5'>Image5</a>

<?php include_once '../view/footer.php'; ?>
<?php include_once '../model/showGetPostVariables.php'; ?>
<?php funShowAllPOSTandGETvariables(); ?>
