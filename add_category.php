<?php
$pdo = require_once '../server/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //echo 'post';
    $cname = $_POST['category_name'];
    $cdesc = $_POST['category_desc'];
    $catpic =$_FILES["image"];

    //if()
    $picpath = 'assets/images/'. $catpic['name'];
    move_uploaded_file($catpic["tmp_name"],$picpath );

    $statement = $pdo->prepare("select * from category where category_name ='$cname'");
    $statement->execute();
    $cats = $statement->fetchAll(PDO::FETCH_ASSOC);

    if($statement->rowCount($cats)>0){

        echo 'youve already added this category you can add another one';

    }else{


            $statement = $pdo->prepare("INSERT INTO category (category_name, category_description, category_picture)
                VALUES (:cname, :cdesc, :cpic)");
            $statement->bindValue(':cname', $cname);
            $statement->bindValue(':cdesc', $cdesc);
            $statement->bindValue(':cpic', $picpath);


            if ($statement->execute()) {
                header('location: add_success.php');
            };

    }

}
require_once  'header.php';
require_once  'nav.php';
?>
    <div class="container">
        <div class="py-6">
            <!-- row -->
            <div class="row">
                <div class="offset-xl-3 col-xl-6 col-md-12 col-12">
                    <!-- card -->
                    <div class="card">
                        <!-- card body -->
                        <div class="card-body p-lg-6">
                            <!-- form -->

                            <div class="row" >
                                <form method="post" action=" " enctype="multipart/form-data">
                                    <!-- form group -->
                                    <div class="mb-3 col-12">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="category_name" placeholder="Enter The name of this category" required>
                                    </div>
                                    <!-- form group -->
                                    <div class="mb-3 col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="category_desc" placeholder="Enter brief about this category..." rows="3"></textarea>
                                    </div>

                                    <div class="col-12 mb-4">

                                        <div class="mb-3 col-12 col-md-12 fallback">
                                            <label class="form-label" for="profilefname">Category Image</label>
                                            <div class="custom-file-container" data-upload-id="courseCoverImg" id="courseCoverImg">
                                                <label class="form-label">
                                                    <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                                       title="Clear Image"></a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input name="image" type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" />
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <small class="mt-3 d-block">Upload The  category image here</small>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-8"></div>
                                    <!-- button -->
                                    <div class="col-12">
                                        <button class="btn btn-primary col-12" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
//require_once  '../component/categoryform.php';
require_once  'footer.php';