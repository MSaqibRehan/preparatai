<?php 
include 'db.php';


$per_page = 50000;


if($_GET['page']==""){
$page="1";
}else{
$page=$_GET['page'];
}
$start    = ($page - 1) * $per_page;
$sql     = $sql." LIMIT $start,$per_page";
//$query2=mysql_query($sql);

$entries = mysqli_query($connection, "SELECT rewrite FROM vardai ORDER BY id DESC ".$sql."");
$count = mysqli_num_rows(mysqli_query($connection, "SELECT rewrite FROM vardai"));
$pages = ceil($count/$per_page);

//die($pages);

header("Content-type: text/xml");

echo '<?xml version="1.0" encoding="UTF-8" ?>';

?>

<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php /*if($_GET['page'] == "1") { ?>
    <url>
        <loc>https://<?= $_SERVER['SERVER_NAME']; ?>/</loc>
        <lastmod><?= date("Y-m-d"); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>
<?php } */ ?>
    <?php


    while($row = mysqli_fetch_assoc($entries)) {
    $url = $row['rewrite']."/";
    $date = date("Y-m-d");

   echo "

    <url>
        <loc>https://".$_SERVER['SERVER_NAME']."/".$url."</loc>
    </url>";
	
   /* echo "

    <url>
        <loc>https://".$_SERVER['SERVER_NAME']."/".$url."</loc>
        <lastmod>".$date."</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>";*/
	
	

 } ?>

</urlset>