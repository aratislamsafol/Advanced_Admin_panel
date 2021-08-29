<?php include('templates/header.php'); ?>
    
    <section class="search-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Search result for</h2>
                </div>
            </div>
            <hr>
            <div class="row">
            <?php
                if(isset($_POST['search_req'])){
                    $search_key = $_POST['search_key'];

                    $search_query = "SELECT*FROM sliders WHERE slider_title LIKE '%$search_key%'";
                    $search_result = mysqli_query($db, $search_query);

                    if(mysqli_num_rows($search_result) > 0){
                        while($search_data = mysqli_fetch_assoc($search_result)){
                            echo '
                                <div class="col-3">
                                    <h3>'.$search_data['slider_title'].'</h3>
                                </div>
                            ';
                        }
                    }else{
                        echo "No data found with this key: $search_key";
                    }
                }
            ?>
            </div>
        </div>
        
    </section>

<?php include('templates/footer.php'); ?>