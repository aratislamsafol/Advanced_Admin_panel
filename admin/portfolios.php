<?php include('templates/header.php'); ?>
    <section class="portfolios-content-area py-4 px-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <ul class="nav nav-tabs" id="portfolioTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="all-portfolio" data-bs-toggle="tab" href="#portfolio-home" role="tab" aria-controls="portfolio-home" aria-selected="true">All Slider</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="addnew-portfolio" data-bs-toggle="tab" href="#addnewportfolio" role="tab" aria-controls="addnewportfolio" aria-selected="false">Add New</a>
                        </li>

                    </ul>

                    <div class="tab-content" id="portfolioTabContent">

                        <div class="tab-pane fade show active" id="portfolio-home" role="tabpanel" aria-labelledby="all-portfolio">

                            <table class="table table-bordered border-success table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>link</th>
                                        <th>Skills</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $show_query = "SELECT*FROM protfolios";
                                        $show_result = mysqli_query($con, $show_query);

                                        if(mysqli_num_rows($show_result) > 0){
                                            while($show = mysqli_fetch_assoc($show_result)){
                                                echo '
                                                    <tr>
                                                        <td>'.$show['port_id'].'</td>

                                                        <td><img src="assets/images/portfolios/'.$show['port_img'].'" width="100" height="100"></td>

                                                        <td>'.$show['port_title'].'</td>

                                                        <td>'.$show['port_des'].'</td>

                                                        <td><a href="'.$show['port_link'].'" target="_blank">'.$show['port_link'].'</a></td>

                                                        <td>'.$show['port_skills'].'</td>

                                                        <td>'.$show['category_name'].'</td>

                                                        <td>'.$show['created_by'].'</td>

                                                        <td class="text-center" width="10%"></td>
                                                '; 
                                            } 
                                        }         
                                    ?>
                                    
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="tab-pane fade" id="addnewportfolio" role="tabpanel" aria-labelledby="addnew-portfolio">

                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="mt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="portfolio_title" class="form-label">Title</label>
                                            <input type="text" name="portfolio_title" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="portfolio_img" class="form-label">Image</label>
                                            <input type="file" name="portfolio_img" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="portfolio_link" class="form-label">Link</label>
                                            <input type="text" name="portfolio_link" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3">
                                            <label for="portfolio_skills" class="form-label">Skills</label>
                                            <input type="text" name="portfolio_skills" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="portfolio_category" class="form-label">Category</label>
                                            <select name="portfolio_category" class="form-control">
                                                <option selected>Select category</option>
                                                <?php
                                                    $cat_query = "SELECT*FROM categorise";
                                                    $cat_result = mysqli_query($db, $cat_query);
                                                    if(mysqli_num_rows($cat_result) > 0){
                                                        while($cat_show = mysqli_fetch_assoc($cat_result)){
                                                            echo '
                                                                <option value="'.$cat_show['category_id'].'">'.$cat_show['category_name'].'</option>
                                                            ';
                                                        }
                                                    }else{
                                                        echo '
                                                            <option value="0">Unrecognized</option>
                                                        ';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="portfolio_des" class="form-label">Description</label>
                                            <textarea class="form-control" rows="3" name="portfolio_des"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" name="create_portfolio" class="btn btn-outline-success btn-lg">Add Portfolio</button>
                                    </div>
                                </div>
                                
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php

        // Insert Portfolio
        if(isset($_POST['create_portfolio'])){

            $port_title         = $_POST['portfolio_title'];
            $port_link          = $_POST['portfolio_link'];
            $port_skills        = $_POST['portfolio_skills'];
            $port_category      = $_POST['portfolio_category'];
            $port_des           = $_POST['portfolio_des'];
            $created_by         = $_SESSION['username'];

            // Upload image to dist folder
            $port_img       = $_FILES['portfolio_img']['name'];
            $port_img_tmp     = $_FILES['portfolio_img']['tmp_name'];
            move_uploaded_file($port_img_tmp, "assets/img/portfolios/$port_img");

            insertPortfolio($port_title, $port_des, $port_img, $port_link, $port_skills, $port_category, $created_by, $con);
        }
    ?>
<?php include('templates/footer.php'); ?>