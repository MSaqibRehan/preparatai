<?php require_once "header.php"; ?>
<?php 
require_once "functions.php"; 


// $connection->set_charset("utf8");
?>
<br /><br /><br /><br /><br /><br />
<style>

    /* Candidate List */
.candidate-list {
  background: #ffffff;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  border-bottom: 1px solid #eeeeee;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  padding: 20px;
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out; }
  .candidate-list:hover {
    -webkit-box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
            box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
    position: relative;
    z-index: 99; }
    .candidate-list:hover a.candidate-list-favourite {
      color: #e74c3c;
      -webkit-box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
              box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1); }

.candidate-list .candidate-list-image {
  margin-right: 25px;
  -webkit-box-flex: 0;
      -ms-flex: 0 0 80px;
          flex: 0 0 80px;
  border: none; }
  .candidate-list .candidate-list-image img {
    width: 80px;
    height: 80px;
    -o-object-fit: cover;
       object-fit: cover; }

.candidate-list-title {
  margin-bottom: 5px; }

.candidate-list-details ul {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  margin-bottom: 0px; }
  .candidate-list-details ul li {
    margin: 5px 10px 5px 0px;
    font-size: 13px; }

.candidate-list .candidate-list-favourite-time {
  margin-left: auto;
  text-align: center;
  font-size: 13px;
  -webkit-box-flex: 0;
      -ms-flex: 0 0 90px;
          flex: 0 0 90px; }
  .candidate-list .candidate-list-favourite-time span {
    display: block;
    margin: 0 auto; }
  .candidate-list .candidate-list-favourite-time .candidate-list-favourite {
    display: inline-block;
    position: relative;
    height: 40px;
    width: 40px;
    line-height: 40px;
    border: 1px solid #eeeeee;
    border-radius: 100%;
    text-align: center;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    margin-bottom: 20px;
    font-size: 16px;
    color: #646f79;
    }
    .candidate-list .candidate-list-favourite-time .candidate-list-favourite:hover {
      background: #ffffff;
      color: #e74c3c; }

.candidate-banner .candidate-list:hover {
  position: inherit;
  -webkit-box-shadow: inherit;
          box-shadow: inherit;
  z-index: inherit; }


/* Candidate Grid */
.candidate-list.candidate-grid {
    padding: 0px;
    display: block;
    border-bottom: none;
}

.candidate-grid .candidate-list-image {
    text-align: center;
    margin-right: 0px;
}
.candidate-grid .candidate-list-image img {
    height: 320px;
    width: 100%;
}

.candidate-grid .candidate-list-details {
    text-align: center;
    padding: 20px 20px 0px 20px;
    border: 1px solid #eeeeee;
    border-top: none;
}
.candidate-grid .candidate-list-details ul {
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
}
.candidate-grid .candidate-list-details ul li {
    margin: 2px 5px;
}

.candidate-grid .candidate-list-favourite-time {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    border-top: 1px solid #eeeeee;
    margin-top: 10px;
    padding: 10px 0;
}
.candidate-grid .candidate-list-favourite-time a {
    margin-bottom: 0;
    margin-left: auto;
}
.candidate-grid .candidate-list-favourite-time span {
    display: inline-block;
    margin: 0;
    -ms-flex-item-align: center;
    align-self: center;
}

.candidate-list.candidate-grid .candidate-list-favourite-time .candidate-list-favourite {
    margin-bottom: 0px;
}

.owl-carousel .candidate-list.candidate-grid {
    margin-bottom: 20px;
}


/* Widget */
.widget .widget-title {
    margin-bottom: 20px;
}
.widget .widget-title h6 {
    margin-bottom: 0;
}
.widget .widget-title a {
    color: #212529;
}

.widget .widget-collapse {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 0;
}

/* similar-jobs-item */
.similar-jobs-item .job-list {
    border-bottom: 0;
    padding: 0;
    margin-bottom: 15px;
}
.similar-jobs-item .job-list:last-child {
    margin-bottom: 0;
}
.similar-jobs-item .job-list:hover {
    -webkit-box-shadow: none;
    box-shadow: none;
}

/* checkbox */
.widget .widget-content {
    margin-top: 10px;
}
.widget .widget-content .custom-checkbox {
    margin-bottom: 8px;
}
.widget .widget-content .custom-checkbox:last-child {
    margin-bottom: 0px;
}

.widget .custom-checkbox.fulltime-job .custom-control-label:before {
    background-color: #186fc9;
    border: 2px solid #186fc9;
}

.widget .custom-checkbox.fulltime-job .custom-control-input:checked ~ .custom-control-label:before {
    background: #186fc9;
    border-color: #186fc9;
}

.widget .custom-checkbox.parttime-job .custom-control-label:before {
    background-color: #ffc107;
    border: 2px solid #ffc107;
}

.widget .custom-checkbox.parttime-job .custom-control-input:checked ~ .custom-control-label:before {
    background: #ffc107;
    border-color: #ffc107;
}

.widget .custom-checkbox.freelance-job .custom-control-label:before {
    background-color: #53b427;
    border: 2px solid #53b427;
}

.widget .custom-checkbox.freelance-job .custom-control-input:checked ~ .custom-control-label:before {
    background: #53b427;
    border-color: #53b427;
}

.widget .custom-checkbox.temporary-job .custom-control-label:before {
    background-color: #e74c3c;
    border: 2px solid #e74c3c;
}

.widget .custom-checkbox.temporary-job .custom-control-input:checked ~ .custom-control-label:before {
    background: #e74c3c;
    border-color: #e74c3c;
}

.widget ul {
    margin: 0;
}
.widget ul li a:hover {
    color: #21c87a;
}

.widget .company-detail-meta ul {
    display: block;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
}
.widget .company-detail-meta ul li {
    margin-right: 15px;
    display: inline-block;
}
.widget .company-detail-meta ul li a {
    color: #646f79;
    font-weight: 600;
    font-size: 12px;
}

.widget .company-detail-meta .share-box li {
    margin-right: 0;
    display: inline-block;
    float: left;
}

.widget .company-detail-meta ul li.linkedin a {
    padding: 15px 20px;
    border: 2px solid #eeeeee;
    display: inline-block;
}
.widget .company-detail-meta ul li.linkedin a i {
    color: #06cdff;
}

.widget .company-address ul li {
    margin-bottom: 10px;
}
.widget .company-address ul li:last-child {
    margin-bottom: 0;
}
.widget .company-address ul li a {
    color: #646f79;
}

.widget .widget-box {
    padding: 20px 15px;
}

.widget .similar-jobs-item .job-list.jobster-list {
    padding: 15px 10px;
    border: 0;
    margin-bottom: 10px;
}

.widget .similar-jobs-item .job-list {
    padding-bottom: 15px;
}

.widget .similar-jobs-item .job-list-logo {
    margin-left: auto;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 60px;
    flex: 0 0 60px;
    height: 60px;
    width: 60px;
}

.widget .similar-jobs-item .job-list-details {
    margin-right: 15px;
    -ms-flex-item-align: center;
    align-self: center;
}
.widget .similar-jobs-item .job-list-details .job-list-title h6 {
    margin-bottom: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.widget .similar-jobs-item .job-list.jobster-list .job-list-company-name {
    color: #21c87a;
}

.widget .docs-content {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    background: #eeeeee;
    padding: 30px;
    border-radius: 3px;
}
.widget .docs-content .docs-text {
    -ms-flex-item-align: center;
    align-self: center;
    color: #646f79;
}
.widget .docs-content span {
    font-weight: 600;
}
.widget .docs-content .docs-icon {
    margin-left: auto;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 38px;
    flex: 0 0 38px;
}

/* Job Detail */
.widget .jobster-company-view ul li {
    border: 1px solid #eeeeee;
    margin-bottom: 20px;
}
.widget .jobster-company-view ul li:last-child {
    margin-bottom: 0;
}
.widget .jobster-company-view ul li span {
    color: #212529;
    -ms-flex-item-align: center;
    align-self: center;
    font-weight: 600;
}

.sidebar .widget {
    border: 1px solid #eeeeee;
    margin-bottom: 30px;
}
.sidebar .widget .widget-title {
    border-bottom: 1px solid #eeeeee;
    padding: 14px 20px;
}

.sidebar .widget .widget-content {
    padding: 14px 20px;
}
.widget .widget-content {
    margin-top: 10px;
}

.widget-content {
    /* margin: 50px 0 8px 0; */
    word-break: break-word;
    overflow-y: auto;
    height: 205px;
}

.widget-content::-webkit-scrollbar {
    width: 10px;
    background-color: #F8F8FA;
    border-radius: 19px;
}

.widget-content::-webkit-scrollbar-thumb {
    background: #BFBFCE;
    border-radius: 19px;
  }
  .loader {
  display: none;
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #3498db;
  width: 40px;
  height: 40px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.pagination a {
    border-radius: 0 !important;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="sidebar">
              
            <div id="filters">
                    <!-- Filter options will be loaded here -->
                </div>
                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Sritis</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="dateposted">

                    <div class="search" style="padding-top:12px; padding-left:12px; padding-right:12px;">
                        <input class="form-control" id="search-input" type="text" placeholder="Ieškoti srities...">
                    </div>
                        <div class="widget-content">

                            <?php $query = mysqli_query($connection, "SELECT distinct(profession_1) as profession FROM doctors"); ?>
                <?php while($data = mysqli_fetch_array($query)) { ?>
                            <div class="custom-control custom-checkbox" id="candidate_filters">
                                <input type="checkbox" class="custom-control-input profession-filter" id="profession-<?= $data['profession']; ?>" value="<?= $data['profession']; ?>">
                                <label class="custom-control-label professions" for="profession-<?= $data['profession']; ?>"><?= $data['profession']; ?></label>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="widget">
                    <div class="widget-title widget-collapse">
                        <h6>Gydymo įstaiga</h6>
                        <a class="ml-auto" data-toggle="collapse" href="#dateposted" role="button" aria-expanded="false" aria-controls="dateposted"> <i class="fas fa-chevron-down"></i> </a>
                    </div>
                    <div class="collapse show" id="dateposted">
                    <div class="search" style="padding-top:12px; padding-left:12px; padding-right:12px;">
                        <input class="form-control" id="search-input2" type="text" placeholder="Ieškoti įstaigos...">
                    </div>

                        <div class="widget-content">

                            <?php $query = mysqli_query($connection, "SELECT distinct(hospital_1) as hospital FROM doctors WHERE hospital_1 NOT REGEXP 'kab.' AND hospital_1 != ' '"); ?>
                <?php while($data = mysqli_fetch_array($query)) { ?>
                            <div class="custom-control custom-checkbox" id="institute_filters">
                                <input type="checkbox" class="custom-control-input institute-filter" id="hospital-<?= $data['hospital']; ?>" value="<?= $data['hospital']; ?>">
                                <label class="custom-control-label institutions" for="hospital-<?= $data['hospital']; ?>"><?= $data['hospital']; ?></label>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>

                
                <div class="widget border-0">
                    <div class="widget-add">
                        <img class="img-fluid" src="images/add-banner.png" alt=""></div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row mb-4">
                <div class="col-12">
                    <!-- <h6 class="mb-0 restults">Showing 1-10 of <span class="text-primary">28 Candidates</span></h6> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                <div id="loader" class="loader"></div>

                </div>
            </div>
         
            <div class="row" id="doctors-grid">

            
                <?php $query = mysqli_query($connection, "SELECT * FROM doctors LIMIT 21"); ?>
                <?php while($data = mysqli_fetch_array($query)) { 
                    
                    $d_id=$data['id'];
    $avg_ratings=getAverageRatings($d_id);
    $total_ratings=gettotalratings($d_id);
    $total_avg=($avg_ratings['question1']+$avg_ratings['question2']+$avg_ratings['question3']+$avg_ratings['question4']+$avg_ratings['question5'])/5;

                    ?>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <a href="doctor.php?id=<?=$data['id'] ?>">
                    <div class="candidate-list candidate-grid">
                        <div class="candidate-list-image">
                            <img class="img-fluid" src="<?php if($data['gender'] == 'female') { ?>/assets/images/female-doctor.jpg<?php } else { ?>/assets/images/male-doctor.jpg<?php } ?>" alt="">
                        </div>
                        <div class="candidate-list-details">
                            <div class="candidate-list-info">
                                <div class="candidate-list-title">
                                    <h5><a href="doctor.php?id=<?=$data['id'] ?>"><?= $data['name']; ?></a></h5>
                                </div>
                                <div class="candidate-list-option">
                                    <span class="fa fa-star star-active mx-1" style="color:gold;"></span> <?= $total_avg ?> (<?= $total_ratings['total'] ?> votes)<br />
                                    <div style="padding-top:10px;"></div>
                                        <span class="text-muted font-weight-normal badge badge-secondary" style="background: #eeeeee;
    padding: 6px; font-size:15px;"><?= $data['profession_1']; ?></span>

     <span class="text-muted font-weight-normal badge badge-secondary" style="background: #eeeeee;
    padding: 6px; font-size:15px;"><?= $data['hospital_1']; ?></span>
                                   
                                </div>
                            </div><br />
                        </div>
                    </div>
                </a>
                </div>
            <?php } ?>
            
          
        </div>
        <div class="row">
                <div class="col-12 text-center mt-4 mt-sm-5">
                <nav id="pagination" aria-label="Page navigation">
                    <!-- Pagination will be loaded here -->
                </nav>
                </div>
            </div><br /><br />
    </div>
</div>
</div>

  <?php require_once "footer.php"; ?>
  <script>
$('#search-input').on('input', function() {
  var query = $(this).val();
  filterLabels(query, 'professions');
});

$('#search-input2').on('input', function() {
  var query = $(this).val();
  filterLabels(query, 'institutions');
});

    function filterLabels(query, type) {
  $('.'+type).each(function() {
    var label = $(this).text();
    if (label.toLowerCase().indexOf(query.toLowerCase()) === -1) {
      $(this).parent().hide();
    } else {
      $(this).parent().show();
    }
  });
}


</script>
  <script src="doctors_script.js"></script>