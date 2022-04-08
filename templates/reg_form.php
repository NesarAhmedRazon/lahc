<form id="reqForm" class="ms-form reqBooking" method="post">
    <div class="form-group">
        <input type="text" class="form-control" id="cName" placeholder="Name">
    </div>
    <div class="form-group">
        <input type="email" class="form-control" id="cEmail" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="cPhone" placeholder="Phone Number">
    </div>
    <div class="form-group">
        <input type="text" class="form-control" id="cAddress" placeholder="Event Address">
    </div>
    <div class="form-group">
        <div class="form-control inp" id="ms_dPicker" type="text" placeholder="Event Date & Time">Event Date & Time</div>
    </div>
    <div class="form-group custom-select">
        <select id="inputState" class="form-control">
            <option selected disabled>Choose a Package</option>
            <?php
            $the_query = new WP_Query(
                array(
                    'post_type' => 'product',
                    'meta_key' => 'sequence',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
                )
            );
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();

                    $ids = get_the_ID();
                    setlocale(LC_MONETARY, 'en_US.UTF-8');
                    $price = money_format('%.2n', get_post_meta($ids, 'product_price', true));
                    echo "<option value=" . $ids . ">" . get_the_title($ids) . " - " . $price . "</option>";
                endwhile;
            endif;
            wp_reset_query();
            echo "<option value='cus'>CUSTOM</option>";
            ?>
        </select>
    </div>

    <button <?php if (is_super_admin()) {
                echo 'id="addToCart"';
            } ?> class="ms-btn w-100 addToCart" <?php //if(!is_super_admin()){ echo "disabled";}
                                        ?>>REQUEST BOOKING</button>
</form>
<div id="dPick"></div>