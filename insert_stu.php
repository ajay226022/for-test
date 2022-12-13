<?php
if(isset($_POST['submit_user'])){
    global $wpdb;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_id = wp_create_user($email,$password,$email);
    update_user_meta($user_id,"username",$username);

    if($user_id){
        echo "<script>alert('User created successfully.')</script>";
    }
}

?>

<body>
    <div class="container">
        <!-- <div class="row"> -->
            <!-- <div class="col-md-12 "> -->
                <div class="card">
                    <!-- <div class="card-header"> -->
                        <h4>Add Students</h4>
                    <!-- </div> -->
                    <div class="card-body">
                        <form class="insert-form" id="insert_form" method="POST">

                            <div class="form-group ">
                                <label>Name</label>

                                <input type="name" class="form-control" id="name" placeholder="Enter name" name="username">
                            </div>

                            <div class="form-group ">
                                <label>Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                            </div>

                            <div class="form-group ">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password">
                            </div>

                            <!-- <div class="form-group ">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control" id="number" placeholder="Enter number">
                            </div> -->

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">

                            </div><br>
                            <button type="submit" name="submit_user" id="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        

</body>

</html>