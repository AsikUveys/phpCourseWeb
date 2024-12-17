<?php
    require "libs/variables.php";
    require "libs/functions.php";

    if(empty($_GET["id"])) {
        header('Location: admin-categories.php');
    }

    $id = $_GET["id"];

    $result = getCategoryById($id);
    $category = mysqli_fetch_assoc($result);

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        if(isset($_POST['delete'])) {
            if(deleteCategory($id)) {
                $_SESSION["message"] = $id." numaralı kategori silindi";
                $_SESSION["type"] = "danger";

                header('Location: admin-categories.php');
            } else {
                echo "hata";
            }
        } elseif(isset($_POST['cancel'])) {
            header('Location: admin-categories.php');
        }
    }
?>

<?php include "partials/_header.php" ?>
<?php include "partials/_navbar.php" ?>

<div class="container my-3">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form method="POST">
                    <b><?php echo $category["kategori_adi"]?></b> isimli kategoriyi silmek istiyor musunuz?
                    <button type="submit" name="delete" class="btn btn-danger">Sil</button>
                    <button type="submit" name="cancel" class="btn btn-secondary">Hayır</button>
                </form>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include "partials/_footer.php" ?>
