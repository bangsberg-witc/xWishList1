<?php include '../view/header.php'; ?>
    <h2 class="top">Error</h2>
    <p><?php echo $error; ?></p>
<?php include_once '../view/footer.php'; ?>
<?php include_once '../model/showGetPostVariables.php'; ?>
<?php funShowAllPOSTandGETvariables(); ?>