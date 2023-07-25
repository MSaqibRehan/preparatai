<?php require_once "header.php";
require_once "functions.php"; 


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .ui-w-100 {
        width: 100px !important;
        height: 90px;
    }

    .card {
        background-clip: padding-box;
        box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
    }

    .user-view-table td:first-child {
        width: 9rem;
    }

    .user-view-table td {
        padding-right: 0;
        padding-left: 0;
        border: 0;
    }

    .text-light {
        color: #babbbc !important;
    }

    .card .row-bordered>[class*=" col-"]::after {
        border-color: rgba(24, 28, 33, 0.075);
    }

    .text-xlarge {
        font-size: 170% !important;
    }

    @media (max-width: 768px) {

        .rating-label,
        .rating-bar {
            display: block;
            width: 100% !important;
        }
    }

    /* CSS for mobile devices */
    @media screen and (max-width: 768px) {
        #myChart {
            width: 400px !important;
            height: 400px !important;
        }
    }


    .card {
        border-radius: 5px;
        background-color: #fff;
        padding-left: 60px;
        padding-right: 60px;
        margin-top: 30px;
        padding-top: 30px;
        padding-bottom: 30px
    }

    .rating-box {
        width: 130px;
        height: 130px;
        margin-right: auto;
        margin-left: auto;
        background-color: #FBC02D;
        color: #fff
    }

    .rating-label {
        font-weight: bold
    }

    .rating-bar {
        width: 300px;
        padding: 8px;
        border-radius: 5px
    }

    .bar-container {
        width: 100%;
        background-color: #f1f1f1;
        text-align: center;
        color: white;
        border-radius: 20px;
        cursor: pointer;
        margin-bottom: 5px
    }

    .bar-5 {
        width: 70%;
        height: 13px;
        background-color: #FBC02D;
        border-radius: 20px
    }

    .bar-4 {
        width: 30%;
        height: 13px;
        background-color: #FBC02D;
        border-radius: 20px
    }

    .bar-3 {
        width: 20%;
        height: 13px;
        background-color: #FBC02D;
        border-radius: 20px
    }

    .bar-2 {
        width: 10%;
        height: 13px;
        background-color: #FBC02D;
        border-radius: 20px
    }
    .bar {
        
        height: 13px;
        background-color: #FBC02D;
        border-radius: 20px
    }

    .bar-1 {
        width: 0%;
        height: 13px;
        background-color: #FBC02D;
        border-radius: 20px
    }

    .fas.fa-star,.fas.fa-star-half-alt {
        color: #FBC02D;
    }


    .star-active {
        color: #FBC02D;
        margin-top: 10px;
        margin-bottom: 10px
    }

    .star-active:hover {
        color: #F9A825;
        cursor: pointer
    }

    .star-inactive {
        color: #CFD8DC;
        margin-top: 10px;
        margin-bottom: 10px
    }

    .blue-text {
        color: #0091EA
    }

    .content {
        font-size: 18px
    }

    .profile-pic {
        width: 90px;
        height: 90px;
        border-radius: 100%;
        margin-right: 30px
    }

    .pic {
        width: 80px;
        height: 80px;
        margin-right: 10px
    }

    .vote { 
        cursor: pointer
    }
    .img_container{
        position: relative;

    }
    .img_container i{
        position: absolute;
        bottom: 0px;
        right: 5px;
        background-color: #CFD8DC;
        padding: 5px;
        border-radius: 5px;
        cursor: pointer;
    }
    .bootstrap-tagsinput .tag {
    
    margin: 2px !important;
    color: white !important;
    background-color: #0275d8 !important;
    padding: 0px 5px !important;
    border-radius: 3px !important;
    border: 1px solid #01649e !important;
}.bootstrap-tagsinput{
    width: 100% !important;
}
.tt-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
}

.tt-suggestion {
    position: relative;
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.5;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    cursor: pointer;
}

.tt-suggestion:hover,
.tt-suggestion:focus {
    color: #fff;
    text-decoration: none;
    background-color: #007bff;
    outline: 0;
}

</style>
<!-- <link href="tagsinput.css" rel="stylesheet" type="text/css"> -->
<!-- Bootstrap Tagsinput CSS -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


<br /><br />

<?php
    $d_id=$_GET['id'];
    $current_doctor=getDoctor($d_id);
    $avg_ratings=getAverageRatings($d_id);
    $last_rating=getlastratings($d_id);
    $total_ratings=gettotalratings($d_id);
    $total_avg=($avg_ratings['question1']+$avg_ratings['question2']+$avg_ratings['question3']+$avg_ratings['question4']+$avg_ratings['question5'])/5;

    $rate_q1=round($avg_ratings['question1'],1);
    $rate_q2=round($avg_ratings['question2'],1);
    $rate_q3=round($avg_ratings['question3'],1);
    $rate_q4=round($avg_ratings['question4'],1);
    $rate_q5=round($avg_ratings['question5'],1);

    

    
?>
<div class="container mt-5 bootdey flex-grow-1 container-p-y">
<?php 

    // Fetch the 10 latest records from the ratings table
    $sql = "SELECT AVG((question1 + question2 + question3 + question4 + question5) / 5) as avg_rating, date_created FROM ratings WHERE  doctor_id = " . $d_id." GROUP BY date_created ORDER BY date_created DESC LIMIT 10";
    $result = mysqli_query($connection,$sql);
    
    $labels = [];
    $data = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Create a DateTime object with the datetime string
$datetime = new DateTime($row['date_created']);

// Format the DateTime object to display only the date
$date = $datetime->format('Y-m-d');

            $labels[] = $date;
            $data[] = round($row['avg_rating'], 1);
        }
    }
    
    $labels = array_reverse($labels);
    $data = array_reverse($data);
    $professions=$current_doctor[0]['profession_1'].",".$current_doctor[0]['profession_2'].",".$current_doctor[0]['profession_3'].",".$current_doctor[0]['profession_4'].",".$current_doctor[0]['profession_5'];
    $institutions=$current_doctor[0]['hospital_1'].",".$current_doctor[0]['hospital_2'].",".$current_doctor[0]['hospital_3'].",".$current_doctor[0]['hospital_4'].",".$current_doctor[0]['hospital_5'];
    
    $img="";
    if($current_doctor[0]['gender'] == 'female') { $img="/assets/images/doctorwomen.png"; } else { $img="/assets/images/doctormen.png";}
    if(!empty($current_doctor[0]['profile_img'])){
        $img="../images/".$current_doctor[0]['profile_img'];
    }
    ?>
    <div class="media align-items-center py-3 mb-3" style="border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;">
    
    
       
        <span class="img_container">
        <img class="d-block ui-w-100 rounded-circle" src="<?= $img ?>" alt="">
        <i class="fa fa-pencil update_profileimg"></i>
        </span>
     
        <div class="media-body ml-4">
            
            <h4 class="font-weight-bold mb-0"><?= $current_doctor[0]["name"] ?></h4>
            <div class="text-muted mb-2"><span class="text-muted font-weight-normal badge badge-secondary" style="background: #eeeeee;
    padding: 6px;
    margin-top: 5px;"><?= $current_doctor[0]["profession_1"] ?></span></div>
            <div style="padding-top:5px;"></div>
            <a type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success text-white btn-sm" style="padding: 0.4rem 1.2rem;">Įvertinti!</a>&nbsp;
            <a type="button" data-toggle="modal" data-target="#updatemodal" class="btn btn-warning text-white btn-sm" style="padding: 0.4rem 1.2rem;"><i class="fa fa-pencil"></i> Update</a>&nbsp;
            <a href="doctors.php" class="btn btn-default btn-sm" style="padding: 0.4rem 1.2rem;">← Visi gydytojai</a>
        </div>
    </div>

<!-- Update Profile Image Modal -->
<div class="modal fade" id="updateProfileImageModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileImageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateProfileImageModalLabel">Update Profile Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="image-form">
        <input type="hidden" name="doctor_id" value="<?= $d_id ?>">
          <div class="form-group">
            <input type="file" class="form-control-file" name="image" required>
          </div>
          <button type="submit" id="saveimgbtn" class="btn btn-primary">Upload Image</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Update Profile Modal -->
<div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="updatemodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="updateForm" enctype="multipart/form-data">
        <input type="hidden" name="doctor_id" value="<?= $d_id ?>">
        <!-- Modal header with close button -->
        <div class="modal-header">
          <h5 class="modal-title" id="updatemodalLabel">Update Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- Modal body with inputs -->
        <div class="modal-body">
          <!-- Input for name -->
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" value="<?= $current_doctor[0]["name"] ?>" id="name" name="name">
          </div>

          <!-- Input for gender -->
          <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" class="form-control">
                <option value="male" <?php if($current_doctor[0]["gender"]=="male"){echo "selected";} ?>>Male</option>
                <option value="male" <?php if($current_doctor[0]["gender"]=="female"){echo "selected";} ?>>FeMale</option>
            </select>
            
          </div>

          <!-- Tags input for professions -->
          <div class="form-group">
            <label for="professions">Professions:</label>
            <!-- <input type="text" id="professionsinput" data-role="tagsinput"> -->
            <br>
            <input type="text" id="professions-input" name="professions" value="<?= $professions ?>" class="typeahead">
          </div>

          <!-- Tags input for institutions -->
          <div class="form-group">
            <label for="institutions">Institutions:</label>
            <input type="text" id="institutions" name="institutions" value="<?= $institutions ?>"  class="typeahead"  >
            
          </div>
<!-- Textarea for description -->
<div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
          </div>
          

          <!-- Checkbox for account deletion -->
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="deleteAccount" name="deleteAccount">
            <label class="form-check-label" for="deleteAccount">Please delete my account here</label>
          </div>
        </div>
         <!-- Modal footer with update button -->
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave a feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="ratingForm">
                    <div class="modal-body">

                    <input type="hidden" id="doctor_id" name="doctor_id" value="<?= $_GET['id'] ?>">
                        <div class="cireview-form">
                            <div class="form-horizontal">
                                <div class="row form-group required">
                                    <label class="control-label col-sm-3 xl-20 xs-100" for="input-ciname">Name:</label>
                                    <div class="col-sm-9 xl-80 xs-100">
                                        <input type="text" name="ciname" value="" id="input-ciname" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group required">
                                    <label class="control-label col-sm-3 xl-20 xs-100" for="input-ciemail">Email:</label>
                                    <div class="col-sm-9 xl-80 xs-100">
                                        <input type="text" name="ciemail" value="" id="input-ciemail" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <label class="control-label col-sm-3 xl-20 xs-100" for="input-cireview">Review:</label>
                                    <div class="col-sm-9 xl-80 xs-100">
                                        <textarea name="cireview" rows="5" id="input-cireview" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class=" ratings">
                                    <div class="form-group">
                                        <label for="question1">Ar jūsų sveikatos diagnozė buvo tiksli?:</label>
                                        <div class="question-rating" data-question="1">
                                            <i class="far fa-star" data-rating="1"></i>
                                            <i class="far fa-star" data-rating="2"></i>
                                            <i class="far fa-star" data-rating="3"></i>
                                            <i class="far fa-star" data-rating="4"></i>
                                            <i class="far fa-star" data-rating="5"></i>
                                            <input type="hidden" id="question1" name="question1" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="question2">Ar paskirtas gydymas buvo teisingas?:</label>
                                        <div class="question-rating" data-question="2">
                                            <i class="far fa-star" data-rating="1"></i>
                                            <i class="far fa-star" data-rating="2"></i>
                                            <i class="far fa-star" data-rating="3"></i>
                                            <i class="far fa-star" data-rating="4"></i>
                                            <i class="far fa-star" data-rating="5"></i>
                                            <input type="hidden" id="question2" name="question2" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="question3">Ar pakankamai skyrė laiko Jums?: </label>
                                        <div class="question-rating" data-question="3">
                                            <i class="far fa-star" data-rating="1"></i>
                                            <i class="far fa-star" data-rating="2"></i>
                                            <i class="far fa-star" data-rating="3"></i>
                                            <i class="far fa-star" data-rating="4"></i>
                                            <i class="far fa-star" data-rating="5"></i>
                                            <input type="hidden" id="question3" name="question3" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="question4">Kiek laiko užtruko, kol jus priėmė?:</label>
                                        <div class="question-rating" data-question="4">
                                            <i class="far fa-star" data-rating="1"></i>
                                            <i class="far fa-star" data-rating="2"></i>
                                            <i class="far fa-star" data-rating="3"></i>
                                            <i class="far fa-star" data-rating="4"></i>
                                            <i class="far fa-star" data-rating="5"></i>
                                            <input type="hidden" id="question4" name="question4" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="question5">Gydymo paslaugų kainos:</label>
                                        <div class="question-rating" data-question="5">
                                            <i class="far fa-star" data-rating="1"></i>
                                            <i class="far fa-star" data-rating="2"></i>
                                            <i class="far fa-star" data-rating="3"></i>
                                            <i class="far fa-star" data-rating="4"></i>
                                            <i class="far fa-star" data-rating="5"></i>
                                            <input type="hidden" id="question5" name="question5" required>
                                        </div>
                                    </div>

                                </div>



                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <div class="buttons text-left">
                            &nbsp;<input type="checkbox" id="reviewterm" name="reviewterm" value="1">&nbsp; I agree with <a href="#" class="agree"><b>Terms & services</b></a>
                        </div>
                        <button type="submit" class="btn btn-primary">Post review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card2">
        <div class="row no-gutters row-bordered">
            <div class="d-flex col-md align-items-center">
                <a href="javascript:void(0)" class="card-body d-block text-body" style="background:#f3fcff; border: 1px solid #ddd; border-radius:6px; margin:5px;">
                    <div class="text-muted line-height-1">Įvertino</div>
                    <div class="text-xlarge"><?= $total_ratings['total'] ?> pacientai (-ų)</div>
                </a>
            </div>
            <div class="d-flex col-md align-items-center">
                <a href="javascript:void(0)" class="card-body d-block text-body" style="background:#f3fcff; border: 1px solid #ddd; border-radius:6px; margin:5px;">
                    <div class="text-muted line-height-1">Bendras reitingas</div>
                    <div class="text-xlarge"><span class="fa fa-star star-active mx-1"></span> <?= $total_avg ?></div>
                </a>
            </div>
            <div class="d-flex col-md align-items-center">
                <a href="javascript:void(0)" class="card-body d-block text-body" style="background:#f3fcff; border: 1px solid #ddd; border-radius:6px; margin:5px;">
                    <div class="text-muted line-height-1">Paskutinis įvertinimas</div>
                    <div class="text-xlarge"><?php if(empty($last_rating['date_created'])){echo "Nėra įvertinimų";}else{echo $last_rating['date_created'];} ?></div>
                </a>
            </div>
        </div>


    </div>

    <div class="card mb-4">
        <div class="row justify-content-left d-flex">
            <div class="col-md-4 d-flex flex-column">
                <div class="rating-box bg-success" style="text-align:center; border-radius:6px;">
                    <h1 class="pt-4"><?= $total_avg ?></h1>
                    <p class=""><?= $total_ratings['total'] ?> įvertinimai</p>
                </div>
                <div style="text-align:center; margin:0 auto !important;">
                
                <?php
                // Calculate the number of full and empty stars
$fullStars = floor($total_avg);
$halfStar = ($total_avg - $fullStars) >= 0.5 ? 1 : 0;
$emptyStars = 5 - $fullStars - $halfStar;

// Output the stars
for ($i = 0; $i < $fullStars; $i++) {
    echo '<i class="fas fa-star"></i>';
}

if ($halfStar) {
    echo '<i class="fas fa-star-half-alt"></i>';
}

for ($i = 0; $i < $emptyStars; $i++) {
    echo '<i class="far fa-star"></i>';
}
                ?></div>
            </div>
            <div class="col-md-8">
                <div class="rating-bar0 justify-content-center">
                    <table class="text-left mx-auto">
                        <tr>
                            <td class="rating-label">Ar jūsų sveikatos diagnozė buvo tiksli?</td>
                            <td class="rating-bar">
                                <div class="bar-container">
                                    <div class="bar bg-success" style="width:<?= $avg_ratings['question1']*20 ?>%;"></div>
                                </div>
                            </td>
                            <td class="text-right"><?= $rate_q1 ?></td>
                        </tr>
                        <tr>
                            <td class="rating-label">Kiek laiko užtruko, kol jus priėmė?</td>
                            <td class="rating-bar">
                                <div class="bar-container">
                                    <div class="bar bg-success" style="width:<?= $avg_ratings['question2']*20 ?>%;"></div>
                                </div>
                            </td>
                            <td class="text-right"><?= $rate_q2 ?></td>
                        </tr>
                        <tr>
                            <td class="rating-label">Ar paskirtas gydymas buvo teisingas?</td>
                            <td class="rating-bar">
                                <div class="bar-container">
                                    <div class="bar bg-success" style="width:<?= $avg_ratings['question3']*20 ?>%;"></div>
                                </div>
                            </td>
                            <td class="text-right"><?= $rate_q3 ?></td>
                        </tr>
                        <tr>
                            <td class="rating-label">Ar pakankamai skyrė laiko Jums?</td>
                            <td class="rating-bar">
                                <div class="bar-container">
                                    <div class="bar bg-success" style="width:<?= $avg_ratings['question4']*20 ?>%;"></div>
                                </div>
                            </td>
                            <td class="text-right"><?= $rate_q4 ?></td>
                        </tr>
                        <tr>
                            <td class="rating-label">Gydymo paslaugų kainos</td>
                            <td class="rating-bar">
                                <div class="bar-container">
                                    <div class="bar bg-success" style="width:<?= $avg_ratings['question5']*20 ?>%;"></div>
                                </div>
                            </td>
                            <td class="text-right"><?= $rate_q5 ?></td>
                        </tr>
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card mb-4 p-0">
        <div class="card-body px-0">

            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
            <div class="p-2 overflow-scroll" style="overflow: scroll;">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
    


            <script>
           


                var ctx = document.getElementById("myChart");
                ctx.height = 150;
                var labels = <?php echo json_encode($labels); ?>;
    var data = <?php echo json_encode($data); ?>;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        responsive: true,
                        labels: labels,
                        datasets: [{
                            label: 'Paskutiniai įvertinimai',

                            data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>

        </div>

    </div>

</div>

</div>
<br />

<?php require_once "footer.php"; ?>

            <script src="update_doctor.js"></script>

<script src="rating.js"></script>

<!-- <script src="tagsinput.js"></script> -->
<!-- Script section -->
<?php $sql = "SELECT DISTINCT profession_1 FROM doctors";
$result = mysqli_query($connection, $sql);

$professionslbl = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $professionslbl[] = $row["profession_1"];
    }
}

?> 
<!-- jQuery, Popper.js and Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>
 
<script>
    function initBloodhound(data) {
  return new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: data
  });
}

function initTypeahead(engine) {
  $('#professionsinput').typeahead(
    {
      hint: true,
      highlight: true,
      minLength: 1
    },
    {
      name: 'professions',
      source: engine.ttAdapter()
    }
  );
}

$.ajax({
  url: 'fetch_sugestions.php',
  method: 'GET',
  dataType: 'json',
  success: function (data) {
        console.log('Raw data:', data);

        var professionsBloodhound = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.whitespace,
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: data
        });
        professionsBloodhound.initialize();

        $('#professions-input').tagsinput({
          typeaheadjs: {
            name: 'professions',
            source: professionsBloodhound.ttAdapter(),
            displayKey: 'name',
            limit: 10,
            templates: {
              suggestion: function(data) {
                return '<div>' + data + '</div>';
              }
            }
          },
          freeInput: true,
          maxTags: 5
        });

      },
  error: function (jqXHR, textStatus, errorThrown) {
    console.log('Error:', textStatus, errorThrown);
  }
});

$.ajax({
  url: 'fetch_hospitals.php',
  method: 'GET',
  dataType: 'json',
  success: function (data) {
        

        var professionsBloodhound = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.whitespace,
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          local: data
        });
        professionsBloodhound.initialize();

        $('#institutions').tagsinput({
          typeaheadjs: {
            name: 'professions',
            source: professionsBloodhound.ttAdapter(),
            displayKey: 'name',
            limit: 10,
            templates: {
              suggestion: function(data) {
                return '<div>' + data + '</div>';
              }
            }
          },
          freeInput: true,
          maxTags: 5
        });

      },
  error: function (jqXHR, textStatus, errorThrown) {
    console.log('Error:', textStatus, errorThrown);
  }
});

</script>