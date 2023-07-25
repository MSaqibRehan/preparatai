<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Template meta tags -->
    <meta name="description" content="<?= $meta_desc; ?>">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">

    <!-- Title -->
    <title><?= $meta_title; ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Icon Font -->
    <link rel="stylesheet" href="/assets/css/line-awesome.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;0,700;1,400&amp;display=swap" rel="stylesheet">

    <!-- AOS -->
    <link rel="stylesheet" href="/assets/css/aos.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Custom CSS for end users -->
    <link rel="stylesheet" href="/assets/css/custom.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <style>

@media (min-width: 992px) {
.navbar-expand-lg .navbar-collapse {
    display: -ms-flexbox!important;
    display: flex!important;
    -ms-flex-preferred-size: auto;
    flex-basis: unset;
    float: right;
    justify-content: flex-end;
}
}

      .navbar {
        padding: 1rem 0;
        transition: all 0.2s ease-in-out;
    }

    .navbar .navbar-brand img {
    max-width: 160px;
}

.s-bg-light {
    /*background: #fff !important;
    border-bottom: 2px solid #f1f5f8;*/
}

.recipe {
    color: #b60000;
    background: #ffd9d9;
    border-radius: 0.2rem;
    font-size: 0.8rem;
    font-weight: 500;
    padding: 0.2rem 0.7rem;
    /* letter-spacing: 1px; */
    /* text-transform: uppercase; */
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.page-article .article-comments .media {
    padding: 1.2rem;
    margin-bottom: 5px;
    background: white;
}

.page-article .article-comments .media img {
    width: 42px;
    height: 42px;
}

.section-header .subheading {
    color: #be0000;
    background: #ffd9d9;
    font-size: 0.75rem;
    font-weight: 500;
    line-height: 1;
    letter-spacing: unset;
    padding: 0.9rem 2rem;
    margin-bottom: 1rem;
    display: inline-block;
    border-radius: 50rem;
    text-transform: unset;
}

.btn-c {
    font-size: 14px;
    font-weight: 600;
    border-radius: 4px !important;
    margin: 2px;
    padding: 15px 25px;
    letter-spacing: 1px;
    /* text-transform: uppercase; */
    border-radius: 0;
}

.positive {
    background: #78e08f;
    color: #fff;
}
.neutral {
  background: #747d8c;
  color:#fff;
}
.iritation {
    background: #f6b93b;
    color: #ffffff;
}
.danger {
    background: #e55039;
    color: #ffffff;
}


.category .job {
    min-height: 200px;
    border: 1px solid transparent;
    padding: 30px 19px 25px 19px;
    border-radius: 5px;
    box-shadow: rgb(0 0 0 / 15%) 0px 2px 7px;
    background: white;
}

.category .job:hover {
    border: 1px solid #0d6efd;
}

.category .job span {
    padding: 6px 20px;
    font-weight: 400;
    font-size: 13px;
    border-radius: 26px;
    display: inline-block;
}

.category .job .colors1 {
    font-weight: 800;
    color: #F27E42;
    background: #f27e4242;
}

.category .job .colors2 {
    font-weight: 800;
    color: #4294F2;
    background: rgba(66, 148, 255, 0.26);
}

.category .job .colors3 {
    font-weight: 800;
    color: #2EB98D;
    background: rgba(46, 185, 141, 0.03);
}

.category .job .colors4 {
    font-weight: 800;
    color: #6A42F2;
    background: rgba(106, 66, 242, 0.07);
}

.category .job .colors5 {
    font-weight: 800;
    color: #F162BC;
    background: rgba(241, 98, 188, 0.07);
}

.category .job .colors2 {
    font-weight: 800;
    color: #4294F2;
    background: rgba(66, 148, 255, 0.26);
}


.place {
    display: flex;
    align-items: center;
    font-size: 12px;
    padding-left: 0px;
    color: #76787A;
}

.left {
    font-weight: 800;
}

.category .job span.time {
    font-weight: 900;
}


.mb-30 {
    margin-bottom: 30px;
}


    </style>
</head>



<body class="page-article">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top s-bg-light" style="background: #fff !important;
    border-bottom: 2px solid #f1f5f8;">
        <div class="container">
            <a class="navbar-brand" href>
                <img src="/assets/images/new-logo/Transparent Lowercase.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="las la-bars"></i>
            </button>

           <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-scroll="">Pradžia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-scroll="">Vaistų sąrašas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-scroll="">Atsiliepimai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-scroll="">Kontaktai</a>
                    </li>
                </ul>
                <div class="navbar-cta d-none d-lg-block ml-2">
                    <a href="#contact" class="btn btn-primary" style="padding: 0.6rem 1.2rem;" data-scroll="">
                        <i class="las la-search"></i> <span>Ieškoti vaistų</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>