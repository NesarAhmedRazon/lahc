<?php 
/* header Part Design here*/

?>

<div class="row mt-4">
    <div class="col"></div>
    <div class="col-lg-4">
        <a
            href="<?php echo get_home_url(); ?>"
            class="d-block text-sm-center w-100 header_logo text-center "
            alt="LOS ANGELES HOOKAH CATERING's Logo"
        >
            <img
                class="w-75"
                id="hLogo"
                src="<?php echo get_template_directory_uri(); ?>/images/logo.svg"
            >
        </a>
    </div>
    <div class="col"></div>
</div>
<div class="row">
    <div class="col"></div>
    <div class="col-lg-5 info_box">
        <div class="pb-md-1 row">
            <div class="col-6 col-6 text-end title"><span class="txt">TELEPHONE:</span></div>
            <div class="col-6 data p-0 text-start"><a
                    class="phone"
                    href="tel:3108968435"
                >3108968435</a></div>
        </div>
        <div class="pb-md-1 row">
            <div class="col-md-6 col-6 text-end title"><span class="txt">INSTAGRAM:</span></div>
            <div class="col-md-6 col-6 data p-0 text-start"><a
                    target="_blank"
                    href="https://www.instagram.com/la.hookah/"
                >@LA.HOOKAH</a></div>
        </div>
        <script>
        $j(".phone").text(function(i, text) {
            text = text.replace(/(\d{3})(\d{3})(\d{4})/, "$1 . $2 . $3");
            return text;
        });
        </script>
    </div>
    <div class="col"></div>
</div>
<?php if(is_super_admin()){?>
<div class="row">
    <div class="col-12">
        <div
            data-bs-toggle="modal"
            data-bs-target="#mcModal"
            class="px-3 maillisting d-block py-2 position-relative w-100 text-center"
        >JOIN OUR MAILING LIST TO ACCESS SECRET POP-UP HOOKAH EVENTS IN PREMIER LA LOCATIONS</div>
    </div>
    <?php get_template_part( 'templates/mc_form');  ?>
</div><?php } ?>