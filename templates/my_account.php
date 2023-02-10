<?php
$title = array("headerTitle" => "Telefoot");
include("header.php");

session_start();

// On teste déjà l'existence de la variable de session user puis on teste l'adresse ip de l'utilisateur pour vérifier qu'il n'y ai pas de tentative de session hijacking
if (!isset($_SESSION["user"])|| $_SESSION["user"]["ip"]!=$_SERVER["REMOTE_ADDR"]){
    // Potentiellement une ALERTE INTRUS ! --> rediriger vers la page de login
    header("Location: index.php?page=login");
}
?>
<main>
<div class="channels">
    <h4>Channels</h4>
    <?php
    foreach ($dataChannel as $channel)
    {
        ?>
        <img src="<?="../public/assets/img/channels/" . $channel["image"]?>" alt="">
        <?php
    }
    ?>
</div>   
<div class="replay">
    <h4>Replay</h4>
    <?php
    foreach ($dataReplay as $replay)
    {
        ?>
        <img src="<?="../public/assets/img/replay/" . $replay["image"]?>" alt="">
        <?php
    }
    ?>
</div>
<div class="ligue1">
    <h4>Ligue 1</h4>
    <?php
    foreach ($dataLigue1 as $ligue1)
    {
        ?>
        <img src="<?="../public/assets/img/clubs/" . $ligue1["image"]?>" alt="">
        <?php
    }
    ?>
</div>
<div class="ligue2">
    <h4>Ligue 2</h4>
    <?php
    foreach ($dataLigue2 as $ligue2)
    {
        ?>
        <img src="<?="../public/assets/img/clubs/" . $ligue2["image"]?>" alt="">
        <?php
    }
    ?>
</div>
</main>
<?php
include("footer.php");
?>