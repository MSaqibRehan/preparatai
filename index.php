<?php
ob_start();

include "db.php";


$perpage = 48;
if($_GET['sort']) $cat = "WHERE vardas LIKE '".mysqli_real_escape_string($connection, $_GET['sort'])."%'";
if($_GET['cat']) $cat2 = "AND kategorija LIKE '".mysqli_real_escape_string($connection, $_GET['cat'])."%'";

if(isset($_GET['page']) & !empty($_GET['page'])){
  $curpage = $_GET['page'];
}else{
  $curpage = 1;
}
$start = ($curpage * $perpage) - $perpage;
$PageSql = "SELECT * FROM `vardai` ".$cat."".$cat2."";
$pageres = mysqli_query($connection, $PageSql);
$totalres = mysqli_num_rows($pageres);

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;

$ReadSql = "SELECT * FROM `vardai` ".$cat."".$cat2." LIMIT $start, $perpage";
$res = mysqli_query($connection, $ReadSql);

$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


if (!empty($_GET['sort']) && !$_GET['cat'] && strlen($_GET['sort']) == 1) {
  $h1 = "Vaistai iš ".$_GET['sort']." raidės";
  $meta_title = "Vardai iš ".$_GET['sort']." raidės";
  $meta_desc = "Visi vaistai kurių pavadinimas prasideda iš ".$_GET['sort']." raidės.";
} elseif (!empty($_GET['sort']) && !$_GET['cat'] && strlen($_GET['sort']) > 3) {
  $h1 = "Paieška: ".$_GET['sort']."";
  $meta_title = "Vardai atitinkantys ".$_GET['sort']."";

} elseif (!empty($_GET['sort']) && $_GET['cat'] == "moteru-vardai") {
  $h1 = "Mergaičių vardai iš ".$_GET['sort']." raidės";
  $meta_title = "Mergaičių vardai iš ".$_GET['sort']." raidės";
  $meta_desc = "Gražiausi vardai mergaitėms. Visi mergaičių vardai iš ".$_GET['sort']." raidės. Išrinkite savo naujagimiui vardą bei peržiūrėkite vardų sąrašą.";
  $page_link = "/mergaiciu-vardai";
} elseif (!empty($_GET['sort']) && $_GET['cat'] == "vyru-vardai") {
  $h1 = "Berniukų vardai iš ".$_GET['sort']." raidės";
  $meta_title = "Berniukų vardai iš ".$_GET['sort']." raidės";
  $meta_desc = "Populiariausi vardai berniukams. Berniukų vardų reikšmės. Berniukų vardai iš ".$_GET['sort']." raidės. Peržiūrėkite vardo reikšmę ir sužinokite savo vardo kilmę.";
  $page_link = "/berniuku-vardai";
} elseif (strpos($url,'page') !== false) {
  $h1 = $_GET['page']." Puslapis";
  $meta_title = $_GET['page']." Puslapis";
  $meta_desc = "";
} elseif (strpos($url,'berniuku-vardai') !== false) {
  $h1 = "Berniukų vardai";
  $meta_title = "Berniukų vardai - Vyrų vardai";
  $meta_desc = "Gražiausi berniukų vardai čia. Ar renkate vardą berniukui? Tuomet čia rasite daugiau kaip 3,000 įvairiausių vardų.";
  $page_link = "/berniuku-vardai";
} elseif (strpos($url,'mergaiciu-vardai') !== false) {
  $h1 = "Mergaičių vardai";
  $meta_title = "Mergaičių vardai - Moterų vardai";
  $page_link = "/mergaiciu-vardai";
} elseif (strpos($url,'sunu-vardai') !== false) {
  $h1 = "Šunų vardai";
  $meta_title = "Šunų vardai - Patinui ir patelei";
  $meta_desc = "Jei įsigijote augintinį ir norite jam išrinkti vardą, šunų vardai tam tikrai padės. Išsirinkite vieną iš tūkstančių šunų vardų sąraše.";
  $page_link = "/sunu-vardai";
} elseif ($_GET['p_name']) {
  $h1 = "Preparatai.lt";
  $p_name = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM vardai WHERE rewrite = '".mysqli_real_escape_string($connection, $_GET['p_name'])."' LIMIT 1"));
  $meta_title = $p_name['vardas'] . " ". $p_name['pak_aprasymas'] . " " . str_replace(' (tirpalas)', '', $p_name['farmacine_forma'])." vaistas";
  $meta_desc = $p_name['vardas']." ".$p_name['pak_aprasymas']." (".$p_name['en_title'].") ".str_replace(' (tirpalas)', '', $p_name['farmacine_forma'])." vaistai, vartojimas, kaina, informacinis lapelis. ✅";
  //$meta_desc = "Sužinokite kokia ".$l->getName($_GET['p_name'], 'kil')." vardo reikšmė jau dabar. Kokią paslaptį slepia ".$l->getName($_GET['p_name'], 'kil')." vardas?";
  $page_link = "/vaistai/";
} else {
  $h1 = "Preparatai.lt";
  $meta_title = "Visa informacija apie vaistus";
  $meta_desc = "Domina informacija apie vaistus? Ieškote vartojimo informacijos, o gal analogų. Spustelkite čia!";
}


 if(!$_GET['p_name'] && !$_GET['page_p']) { 


  require_once "views/list.php"; ?>



<?php } ?>

<?php   if($_GET['page_p'] == "articles" && $_GET['slug']) { ?>

<?php

$uzk = mysqli_query($connection, "SELECT * FROM straipsniai WHERE slug = '".mysqli_real_escape_string($connection, $_GET['slug'])."'"); 

while($data = mysqli_fetch_assoc($uzk)) {
?>
<div class="card">

    <h4 class="card-header text-white card-primary no-margin" style="background: #fff; color:blue !important;"><?= $data['pavadinimas']; ?></h4>
    <div style="padding:8px;">
<?= nl2br($data['straipsnis']); ?>
</div>
</div><br />
<?php } ?>
<?php } ?>

<?php   if($_GET['page_p'] == "articles" && !$_GET['slug']) { ?>

<?php

$uzk = mysqli_query($connection, "SELECT * FROM straipsniai ORDER BY id DESC"); 

while($data = mysqli_fetch_assoc($uzk)) {
?>
<div class="card">

    <h4 class="card-header text-white card-primary no-margin" style="background: #fff; color:blue !important;"><?= $data['pavadinimas']; ?></h4>
    <div style="padding:8px;">
<?= nl2br($data['istrauka']); ?><hr>
<a href="/straipsniai/<?= $data['slug']; ?>/">Skaityti daugiau...</a>
</div>
</div><br />
<?php } ?>
<?php } ?>

<?php
  if($_GET['p_name']) { 
    $p_name = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM vardai WHERE rewrite = '".mysqli_real_escape_string($connection, $_GET['p_name'])."' LIMIT 1"));

    mysqli_query($connection, "UPDATE vardai SET perziuros = perziuros + 1 WHERE rewrite = '".mysqli_real_escape_string($connection, $_GET['p_name'])."'");
    if(empty($p_name['vardas'])) header("Location: /");

    require_once "views/article.php";

  }

    ?>

  <?php 
  if($_GET['p_name2']) { 
    $p_name = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM vardai WHERE rewrite = '".mysqli_real_escape_string($connection, $_GET['p_name'])."' LIMIT 1"));

    mysqli_query($connection, "UPDATE vardai SET perziuros = perziuros + 1 WHERE rewrite = '".mysqli_real_escape_string($connection, $_GET['p_name'])."'");
    if(empty($p_name['vardas'])) header("Location: /");

  ?>

<div class="card">

    <h3 class="card-header text-white card-primary no-margin" style="background: #76b852;"><span class="fa fa-map pull-right"></span> <?= $p_name['vardas']; ?>
    <?php if(!empty($_COOKIE['admin_login']) && $_COOKIE['admin_login'] == "XuiNDOWxWxSWxxWUNDLsUi") { ?>
        <a href="/admin/index.php?edit=<?php echo $p_name['id']; ?>" style="float:right; color:#fff;"><i class="fas fa-edit"></i></a> 
        <?php } ?></h3>
  <div class="card-body"><br />
    <h6 class="card-subtitle mb-2 text-muted"><?= $p_name['vardas']; ?> (<?= $p_name['en_title']; ?>) <?= $p_name['farmacine_forma']; ?></h6>

    <table class="table table-bordered">
  <tbody>
    <tr>
      <th scope="row">Recepto poreikis</th>
      <td><?php if($p_name['recepto_poreikis'] == "Receptinis") { ?><span style="color: red;">Receptinis</span><?php } else { ?><span style="color: green;"><?= $p_name['recepto_poreikis']; ?></span><?php } ?></td>
    </tr>
    <tr>
      <th scope="row">Veiklioji medžiaga</th>
      <td><?= $p_name['veiklioji']; ?></td>
    </tr>
    <tr>
      <th scope="row">Stiprumas</th>
      <td><?= $p_name['stiprumas']; ?></td>
    </tr>
    <tr>
      <th scope="row">Vartojimas</th>
      <td><?= $p_name['vartojimo_budas']; ?></td>
    </tr>
  </tbody>
</table>
Šaltinis: VVKT (https://www.vvkt.lt/)
  </div>
</div>
<br />
<div class="card">

  <?php
  $uzk = mysqli_query($connection, "SELECT DISTINCT vardas, rewrite FROM vardai WHERE veiklioji LIKE '%".mysqli_real_escape_string($connection, $p_name['veiklioji'])."%' LIMIT 10");


  ?>

    <h5 class="card-header text-white card-primary no-margin" style="background: #ddd; color:#555 !important;">Vaistai su ta pačia veikliąja medžiaga</h5>
  <div class="card-body">
    <p class="card-text" style="padding:12px;">
    <?php while($data = mysqli_fetch_assoc($uzk)) { ?>
      <a href="/vaistai/<?= $data['rewrite']; ?>/" class="label label-default" style="background:#ddd; color:#555 !important; padding:8px;"><?= $data['vardas']; ?></a>
    <?php } ?>
    </p>
  </div>
</div>
<br /><br />
<div style="padding-top:100px;"></div>

  <?php } ?>

