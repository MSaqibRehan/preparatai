<?php require_once "header.php"; ?>




    <!-- Blog -->
    <section class="blog-section py-lg" id="blog">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10">
                    <article class="blog-article s2-bg-light" style="    border: 1px solid #e1e1e1;
    padding: 30px;">
                        <div class="article-inner">
                            <div class="article-details">



    <h1 class="card-subtitle" style="font-size:32px;"><i class="las la-arrow-circle-left" style="color:#0d6bff;"></i> <?= $p_name['vardas']; ?> <?= $p_name['pak_aprasymas']; ?> <?= $p_name['farmacine_forma']; ?></h1>
<br />
<div class="row">
<div class="col-md-4">
    <img src="https://archive.org/download/no-photo-available/no-photo-available.png" class="img-fluid">
</div>
<div class="col-md-8">


    <table class="table table-bordered">
  <tbody>
    <tr>
      <th scope="row">Gamintojas</th>
      <td><?= $p_name['registruotojas']; ?></td>
    </tr>
    <tr>
      <th scope="row">Recepto poreikis</th>
      <td><?php if($p_name['recepto_poreikis'] == "Receptinis") { ?><a href="#" class="recipe">Receptinis preparatas</a><?php } else { ?><a href="#" class="recipe" style="color: #167f00;
    background: #e5ffd9;"><?= $p_name['recepto_poreikis']; ?></span><?php } ?></td>
    </tr>
    <tr>
      <th scope="row">Veiklioji medžiaga</th>
      <td><?= $p_name['veiklioji']; ?> (<?= $p_name['en_title']; ?>)</td>
    </tr>
    <tr>
      <th scope="row">Stiprumas</th>
      <td><?= $p_name['stiprumas']; ?></td>
    </tr>
    <tr>
      <th scope="row">Pakuotė</th>
      <td><?= $p_name['pak_tipas']; ?></td>
    </tr>
    <tr>
      <th scope="row">Vartojimas</th>
      <td><?= $p_name['vartojimo_budas']; ?></td>
    </tr>
  </tbody>
</table>

   
</div>
</div>
<i class="float-right">Šaltinis: VVKT (https://www.vvkt.lt/)</i>

</div>
</div>
</article>
</div>
</div>
</div>
</section>
<?php
$alt = mysqli_num_rows(mysqli_query($connection, "SELECT DISTINCT vardas, rewrite, veiklioji, farmacine_forma, stiprumas FROM vardai WHERE veiklioji = '".mysqli_real_escape_string($connection, $p_name['veiklioji'])."'"));
?>

<section class="faq-section s-bg-light" id="faq" style="margin-top: -80px;padding:22px; border-radius:6px;">
        <div class="container">
            <div class="row mb-5x">
                <div class="col-lg-8 mx-auto">
                    <div class="section-header text-center"><br />
                        <p class="subheading" style="display:none;">Prieš vartojimą būtina pasitarti su gydytoju arba vaistininku. Tinklapyje pateikti atsiliepimai yra subjektyvi lankytojų nuomonė.</p>
                        <h4 class="heading"><?= $p_name['vardas']; ?> (<?= $p_name['en_title']; ?>) <?= $p_name['farmacine_forma']; ?></h4><br />
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-row flex-md-column nav-pills faq-tab" id="faq-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="covid-19-tab" data-toggle="pill" href="#covid-19-tab-pane" role="tab">Informacinis lapelis</a>
                        <a class="nav-link active" id="prevention-tab" data-toggle="pill" href="#prevention-tab-pane" role="tab">Alternatyvos (<?= $alt; ?>)</a>
                        <a class="nav-link" id="medical-tab" data-toggle="pill" href="#medical-tab-pane" role="tab">Comments (<span id="totalcommentscount"></span>)</a>
                        <a class="nav-link" id="symptoms-tab" data-toggle="pill" href="#leave-comment-tab-pane" role="tab">Write a comment</a>
                    </div>
                </div>
                <div class="col-md-9 col-xl-9 ml-auto">
                    <div class="tab-content faq-tab-content" id="faq-tab-content">

                        <!-- General tab content-->
                        <div class="tab-pane fade" id="covid-19-tab-pane" role="tabpanel">
                            <div class="accordion faq-accordion" id="general-accordion">
                                <div class="accordion-card">
                                    <div class="card-header">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#g-collapseOne" aria-expanded="true">
                                            <span>1. What is Coronavirus (COVID -19) ?</span>
                                            <span class="icon"></span>
                                        </button>
                                    </div>

                                    <div id="g-collapseOne" class="collapse show" data-parent="#general-accordion">
                                        <div class="card-body">
                                            Coronaviruses are a large family of viruses which may cause illness in
                                            animals or humans. In humans, several coronaviruses are known to cause
                                            respiratory infections ranging from the common cold to more severe diseases
                                            such as Middle East Respiratory Syndrome (MERS) and Severe Acute Respiratory
                                            Syndrome (SARS). The most recently discovered coronavirus causes coronavirus
                                            disease COVID-19.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-card">
                                    <div class="card-header">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#g-collapseTwo" aria-expanded="false">
                                            <span>2. What are the Symptoms of COVID-19?</span>
                                            <span class="icon"></span>
                                        </button>
                                    </div>
                                    <div id="g-collapseTwo" class="collapse" data-parent="#general-accordion">
                                        <div class="card-body">
                                            Coronaviruses are a large family of viruses which may cause illness in
                                            animals or humans. In humans, several coronaviruses are known to cause
                                            respiratory infections ranging from the common cold to more severe diseases
                                            such as Middle East Respiratory Syndrome (MERS) and Severe Acute Respiratory
                                            Syndrome (SARS). The most recently discovered coronavirus causes coronavirus
                                            disease COVID-19.
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <!-- COVID-19 tab content-->
                        <div class="tab-pane fade  show active" id="prevention-tab-pane" role="tabpanel">
                            

 <div class="row">


      <?php
  $uzk = mysqli_query($connection, "SELECT DISTINCT vardas, rewrite, veiklioji, farmacine_forma, stiprumas FROM vardai WHERE veiklioji = '".mysqli_real_escape_string($connection, $p_name['veiklioji'])."' LIMIT 12");


  ?>
     <?php while($data = mysqli_fetch_assoc($uzk)) { ?>

<div class="col-lg-6 col-md-6 col-sm-6">
                <div class="category mb-30">
                    <div class="job">
                        <span class="colors1 mb-4"><?= $data['veiklioji']; ?></span>
                        <h5><a href="/<?= $data['rewrite']; ?>/"><?= $data['vardas']; ?> <?= $data['farmacine_forma']; ?></a></h5>
                        <ul class="place">
                            <li style="list-style:none;">
                                <p><i class="fas fa-map-marker-alt pe-2"></i> <?= $data['stiprumas']; ?></p>
                            </li>
                        </ul>
                       
                    </div>
                </div>
            </div>

    <?php } ?>

        </div>
    


                        </div>

                        <!-- Prevention tab content -->
                        <div class="tab-pane fade" id="medical-tab-pane" role="tabpanel">


                      

    <div class="article-comments">
                        <h4 class="mb-4 font-weight-bold" ></h4>
                        
                       
                       

                        

                         
                    </div>
                    <br />
                    <div class="col-12 d-flex align-items-center justify-content-center"><div style="clear: both;"></div><br />
                    
                    <button class="btn btn-primary mb-30" id="loadMore" style="display:none;">
                    <span>Load More</span>
                    <span class="fas fa-arrow-right"></span>
                </button>
            </div>

                </div>

                     <div class="tab-pane fade" id="leave-comment-tab-pane" role="tabpanel">

                    <div class="post-comment">
                        <h4 class="mb-5 font-weight-bold">Leave a Comment</h4>
                        <form action="" class="post-comment-form">
                            <input type="hidden" name="vardai_id" id="vardai_id" value="<?= $p_name['id']; ?>">
                            <div class="row mb-0 mb-md-4">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name*" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email*" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="comment-message" placeholder="Write a comment" rows="5"></textarea>
                            </div>
                            <div class="btn-group">
                                <label class="btn-c positive" data-toggle="tooltip" data-placement="top" title="Pozityvus">
                                    <input type="radio" name="rating" value="positive"> Positive</label>
                                    <label class="btn-c danger" data-toggle="tooltip" data-placement="top" title="Neigiamas">
                                    <input type="radio" name="rating" value="negative"> Negative</label>

                                <label class="btn-c neutral" title="Neutral">
                                    <input type="radio" name="rating" value="neutral"> Neutral
                                </label>

                                <label class="btn-c iritation" data-toggle="tooltip" data-placement="top" title="Įkyrus">
                                    <input type="radio" name="rating" value="question"> Question</label>
                                
                            </div>
<div style="clear: both;"></div><br />
<div class="g-recaptcha" data-sitekey="6LfFiEUlAAAAALeMtiGYpBhS5pSlAQ7nk9sSdCtY"></div>
<br>
                            <button class="btn btn-primary" id="submit-comment" type="button">
                                <i class="las la-comment"></i>
                                <span>Post Comment</span>
                            </button>
                        </form>
                    </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


  <?php require_once "footer.php"; ?>
