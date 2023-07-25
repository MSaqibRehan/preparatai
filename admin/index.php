<?php require_once "../db.php"; ?>
<html>
<meta charset="utf-8">
<title>Administravimas</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
<br />
<?php

setcookie("admin_login", "XuiNDOWxWxSWxxWUNDLsUi", time()+60*60*24, '/', 'vardininkas.lt', false);

if(empty($_GET['edit'])) {

if($_POST['post-name']) {

	if(!empty($_POST['vardas']) && !empty($_POST['paaiskinimas']) && !empty($_POST['kategorija'])) {

		mysqli_query($connection, "INSERT INTO vardai (vardas, paaiskinimas, kategorija) VALUES('".mysqli_real_escape_string($connection, $_POST['vardas'])."', '".mysqli_real_escape_string($connection, $_POST['paaiskinimas'])."', '".mysqli_real_escape_string($connection, $_POST['kategorija'])."')");

		echo '<div class="alert alert-success">
		  <strong>Pavyko!</strong> Vardas sėkmingai pridėtas į duomenų bazę.
		</div>';

	} else {

		echo '<div class="alert alert-danger">
		  <strong>Klaida!</strong> Užpildyti ne visi laukeliai.
		</div>';
	}

}
?>
	<div class="card">
	  <div class="card-header">Pridėti naują vardą</div>
	  <div class="card-body">

	  	<form method="post">
	  		Vardas:<br />
	  		<input type="text" name="vardas" class="form-control">
	  		<br />
	  		Vardo reikšmė:<br />
	  		<textarea name="paaiskinimas" col="6" rows="6" class="form-control"></textarea><br />
	  		Vardo reikšmė:<br />
	  		<select name="kategorija" class="form-control">
	  			<option value="vyru-vardai">Berniukų vardai
	  				<option value="moteru-vardai">Mergaičių vardai
	  					<option value="sunu-patinu-vardai">Šunų vardai
	  		</select><br />
	  		<input type="submit" name="post-name" class="btn btn-success btn-md" value="Patalpinti vardą">
	  	</form>
	  </div> 
	</div>

</div>
<?php } else { 

	$ml = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM vardai WHERE id = '".mysqli_real_escape_string($connection, $_GET['edit'])."'"));

	if($_POST['post-name']) {

	if(!empty($_POST['vardas']) && !empty($_POST['paaiskinimas']) && !empty($_POST['kategorija'])) {

		mysqli_query($connection, "UPDATE vardai SET vardas = '".mysqli_real_escape_string($connection, $_POST['vardas'])."', paaiskinimas = '".mysqli_real_escape_string($connection, $_POST['paaiskinimas'])."', kategorija = '".mysqli_real_escape_string($connection, $_POST['kategorija'])."' WHERE id = '".mysqli_real_escape_string($connection, $_GET['edit'])."'");

		echo '<div class="alert alert-success">
		  <strong>Pavyko!</strong> Vardas sėkmingai atnaujintas.
		</div>';

	} else {

		echo '<div class="alert alert-danger">
		  <strong>Klaida!</strong> Užpildyti ne visi laukeliai.
		</div>';
	}

}
?>
	<div class="card">
	  <div class="card-header">Koreguoti vardą</div>
	  <div class="card-body">

	  	<form method="post">
	  		Vardas:<br />
	  		<input type="text" name="vardas" value="<?= $ml['vardas']; ?>" class="form-control">
	  		<br />
	  		Vardo reikšmė:<br />
	  		<textarea name="paaiskinimas" col="6" rows="6" class="form-control"><?= $ml['paaiskinimas']; ?></textarea><br />
	  		Vardo reikšmė:<br />
	  		<select name="kategorija" class="form-control">
	  			<option value="<?= $ml['kategorija']; ?>"><?= ucfirst(str_replace("-", " ", $ml['kategorija'])); ?>
	  			<option value="vyru-vardai">Berniukų vardai
	  				<option value="moteru-vardai">Mergaičių vardai
	  					<option value="sunu-patinu-vardai">Šunų vardai
	  		</select><br />
	  		<input type="submit" name="post-name" class="btn btn-warning btn-md" value="Išsaugoti pakeitimus">
	  	</form>
	  </div> 
	</div>

</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>