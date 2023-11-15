<?php


class scripts
{

    public function __construct()
    {
    }

    public function show()
    {
        ?>
	        <script src="<?=$_ENV['PAGE_SERVE']?>/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	        <script src="<?=$_ENV['PAGE_SERVE']?>/node_modules/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
            <script>
        ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
        <?php
        if(isset($_SESSION["error"]) && ($_SESSION["error"] != "rigth")){
        ?>
            <script>
                swal("Error", "<?=$_SESSION["error"]?>", "error")
            </script>
        <?php
            $_SESSION['error'] = "rigth";
        }
    }

}


?>