<?php  // Settings Page

//Add settings page Style sheet 'css/admin_style.css'
function lahc_settings_style()
{
    wp_enqueue_style('lahc_settings-styles', get_template_directory_uri() . '/assets/css/admin_style.css');
    wp_enqueue_style('lahc_material-styles', 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css');
    wp_enqueue_style('lahc_material-icon', 'https://fonts.googleapis.com/icon?family=Material+Icons');

    wp_enqueue_script('script', 'https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js', false, false, true);
}
add_action('admin_enqueue_scripts', 'lahc_settings_style');

//Add Settings 
add_action('admin_menu', 'lahc_settings_menu');

function lahc_settings_menu()
{

    //create new top-level menu
    add_menu_page('LAHC Settings', 'LAHC Settings', 'administrator', 'lahc_settings', 'lahc_settings_menu_page', 'dashicons-welcome-widgets-menus', 10);

    //call register settings function
    add_action('admin_init', 'register_lahc_settings_menu');
}

function register_lahc_settings_menu()
{
    //register our settings
    register_setting('lahc_settings-group', 'gglan');
}


function lahc_settings_menu_page()
{ ?>
<div class="wrap lahc_wrap">
    <h1>LAHC Settings</h1>
    <form method="post" action="options.php">
        <?php
            settings_fields('lahc_settings-group');
            do_settings_sections('lahc_settings-group');
            submit_button(__('Update Stuff'), "mdc-button"); ?>
        <div>
            <div>
                <label for="gglan" class="lahcLabels">Google Analytics</label>
                <textarea name="gglan" id="" class=" lahcTextarea regular-text code" cols="30"
                    rows="10"><?php echo esc_attr(get_option('gglan')); ?></textarea>
            </div>
        </div>
    </form>
</div>
<?php }


// Get Data at Front-End
function add_gglan()
{
    $option = get_option('gglan');
    if (is_super_admin()) {
        echo $option;
    }
}
add_action('wp_head', 'add_gglan', -1000);
