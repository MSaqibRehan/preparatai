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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript" src="/src/typeahead.js"></script>
    <style>
    .typeahead { border-radius: 4px;padding: 8px 12px;margin-top:10px !important; width:100%; position: absolute; background: #fff; font-weight:bold;}
    .tt-menu { width:300px; }
    ul.typeahead{margin:0px;padding:20px 0px;}
    ul.typeahead.dropdown-menu li a {padding: 10px !important;  border-bottom:#CCC 1px solid; }
    ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
    .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
        text-decoration: none;
        background-color: #d9e8ff;
        outline: 0;
    }
    </style>    
<script>
    $(document).ready(function () {
        $('#searchSort').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/search.php",
                    data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                        result($.map(data, function (item) {
                            return item;
                        }));
                    }
                });
            }
        });
    });
</script>

    <style>
      .navbar {
        padding: 1rem 0;
        transition: all 0.2s ease-in-out;
    }

    .navbar .navbar-brand img {
    max-width: 160px;
}

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

.pagination a {

border-radius: 0px !important;
background: white;

}
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href>
                <img src="/assets/images/new-logo/Transparent Lowercase.png" alt="Image not found">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="las la-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-scroll>Pradžia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/#sarasas" data-scroll>Vaistų sąrašas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-scroll>Atsiliepimai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/" data-scroll>Kontaktai</a>
                    </li>
                </ul>
                <div class="navbar-cta d-none d-lg-block ml-2">
                    <a href="#contact" class="btn btn-primary" style="padding: 0.6rem 1.2rem;" data-scroll>
                        <i class="las la-search"></i> <span>Ieškoti vaistų</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>