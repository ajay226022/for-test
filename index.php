<?php
/*
*Plugin Name: Wp-userinfo-table
*Version:      1.0
*Description: Test.
*Author:       Office Test
*/

// echo plugins_url();
// die;

add_action("admin_menu", "wp_userinfo_table");

function wp_userinfo_table()
{
    add_menu_page(
        'Wp userinf',
        'Wp userinf',
        'manage_options',
        'wp-userinfo-table',
        'add_new_fn',
        'dashicons-welcome-view-site',
        '2'
    );
    add_submenu_page(
        'wp-userinfo-table', //parent_slug
        'Add New', //page_title
        'Add New Student', //menu_title
        'manage_options', //capability
        'add-student', //menu_slug
        'add_new_fn2', //callback 

    );

    function add_assets_in_backend($hook)
    {
        wp_enqueue_style('boot-min', plugins_url() . '/wp-userinfo-table/assets/css/bootstrap.min.css');

        wp_enqueue_script('jquery-slim', plugins_url() . '/wp-userinfo-table/assets/js/jquery.slim.min.js');
        wp_enqueue_script('popper-min', plugins_url() . '/wp-userinfo-table/assets/js/popper.min.js');
        wp_enqueue_script('my-bootstrap-min', plugins_url() . '/wp-userinfo-table/assets/js/bootstrap.min.js');
        // wp_enqueue_script( 'script-js',plugin_dir_url(__FILE__).'/assets/js/script.js',array(),'1.0.0',false )
    }
    add_action('admin_enqueue_scripts', 'add_assets_in_backend');

    function add_new_fn()
    {
        ob_start();
        include plugin_dir_path(__FILE__) . 'views/userinfo.php';
        include plugin_dir_path(__FILE__) . 'views/custom.php';
        $templete = ob_get_contents();
        ob_end_clean();
        echo $templete;
    }
}
function add_student()
{

    if (isset($_POST['submit_user'])) {
        global $wpdb;
        $username = $_POST['username'];
        $email = $_POST['useremail'];
        $password = $_POST['pass'];
        $user_id = wp_create_user($email, $password, $email);
        update_user_meta($user_id, "username", $username);

        if ($user_id) {
            // echo "<script>alert('User created successfully.')</script>";
        }
    }
?>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Students</h4>
                        </div>
                        <div class="card-body">
                            <form class="insert-form" id="insert_form" method="POST">

                                <div class="form-group ">
                                    <!-- <label>Name</label> -->
                                    <input type="name" class="form-control" id="name" placeholder="Enter name" name="username">
                                </div>

                                <div class="form-group ">
                                    <!-- <label>Email address</label> -->
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="useremail">
                                </div>

                                <div class="form-group ">
                                    <!-- <label>Password</label> -->
                                    <input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">

                                </div>
                                <button type="submit" name="submit_user" id="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>

    </html>
<?php
}
add_shortcode('add_student', 'add_student');
