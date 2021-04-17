<?php
/** @var $this \app\core\View */
/** @var $e \Exception */
$this->title = $e->getCode();
?>

<h1><?php echo $e->getCode() ?> - <?php echo $e->getMessage() ?></h1>