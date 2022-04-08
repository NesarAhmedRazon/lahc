<html>

<head>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri(); ?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon/safari-pinned-tab.svg"
        color="#ffd05b">
    <meta name="msapplication-TileColor" content="#ffd05b">
    <meta name="theme-color" content="#ffffff">

    <!--Style-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel='stylesheet'
        href="<?php echo get_template_directory_uri(); ?>/css/simplepicker.css?v=<?php echo time();?>"
        type='text/css' />
    <link rel='stylesheet' href="<?php echo get_template_directory_uri(); ?>/style_v2.css?v=<?php echo time();?>"
        type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/popup.css' type='text/css'
        media='all' />
    <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/css/slider.css' type='text/css'
        media='all' />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        integrity="sha512-3JRrEUwaCkFUBLK1N8HehwQgu8e23jTH4np5NHOmQOobuC4ROQxFwFgBLTnhcnQRMs84muMh0PnnwXlPq5MGjg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type='text/javascript'>
    $j = jQuery.noConflict();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.2.0/jquery.fitvids.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type='application/ld+json'>
    {
        "@context": "http://www.schema.org",
        "@type": "WebSite",
        "name": "Los Angeles Hookah Catering",
        "alternateName": "LAHC",
        "url": "https://losangeleshookahcatering.com/",
        "maintainer": {
            "@type": "Person",
            "name": "Nesar Ahmed",
            "alternateName": "Nesar",
            "url": "http://nesarahmed.itprix.com/",
            "image": "http://nesarahmed.itprix.com/assets/img/pic.jpg",
            "sameAs": [
                "https://www.fiverr.com/nesarahmed",
                "https://www.upwork.com/o/profiles/users/~0176ab7826c765d856/",
                "https://www.linkedin.com/in/nesarahmed/",
                "https://twitter.com/NesarAhmedRazon",
                "https://github.com/NesarAhmedRazon",
                "http://nesarahmed.itprix.com/"
            ],
            "jobTitle": "Frontend developer",
            "worksFor": {
                "@type": "Organization",
                "name": "ITPrix.com",
                "url": "http://itprix.com/"
            }
        }
    }
    </script>
    <?php wp_head(); ?>
    <!-- MC Codes-->

</head>

<body <?php if(!is_super_admin()){/*echo 'style="width:800px";';*/} ?>>
    <div class="container-fluid main">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-sm-12 col-lg-9 col-xl-7">
                <?php get_template_part( 'templates/header');?>