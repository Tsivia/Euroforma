<?php
/**
* classe pdo
*
* PHP Version 7
*
* @category  Stages
* @package   Euroforma
* @author   Beth Sefer, Seneor Tsivia

*/
?>
<div class="alert alert-danger" role="alert">
    <?php
    foreach ($_REQUEST['erreurs'] as $erreur) {
        echo '<p>' . htmlspecialchars($erreur) . '</p>';
    }
    ?>
</div>