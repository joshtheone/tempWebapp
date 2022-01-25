<?php 
view("layout/header.php");
$ar = $_SESSION['array'];
$c = count($ar);
$back = $ar[$c-2];
?>
<div class="row">
    <div class="col-12">
        <a href="<?php  echo $back ?>" class="btn"> <i class="fas fa-right-arrow"></i> back</a>
    </div>
    <div class="col-4 mx-auto mt-5 p-5">
        <h1>page expiled</h1>
    </div>
</div>
<?php
view("layout/footer.php");