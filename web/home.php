<?php

function show()
{

    $datos = isset($_SESSION['userData']) ? true : false;

    if (!$datos) {
        outLogin();
    } else {
        logged();
    }
}

function outLogin()
{
?>
    <section class="container py-4">
        <article class="row my-3">
            <div class="col-md-4">
                <div class="card p-4 shadow">
                    <h2 class="display-5 text-center card-title">Title</h2>
                    <hr>
                    <div class="card-body text-center">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure alias fugit, doloribus quo fuga blanditiis rem perferendis illum iusto obcaecati facilis eos, modi quasi suscipit consequuntur? Nisi quidem sed consequuntur?
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow">
                    <h2 class="display-5 text-center card-title">Title</h2>
                    <hr>
                    <div class="card-body text-center">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure alias fugit, doloribus quo fuga blanditiis rem perferendis illum iusto obcaecati facilis eos, modi quasi suscipit consequuntur? Nisi quidem sed consequuntur?
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow">
                    <h2 class="display-5 text-center card-title">Title</h2>
                    <hr>
                    <div class="card-body text-center">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure alias fugit, doloribus quo fuga blanditiis rem perferendis illum iusto obcaecati facilis eos, modi quasi suscipit consequuntur? Nisi quidem sed consequuntur?
                        </p>
                    </div>
                </div>
            </div>
        </article>
    </section>
<?php
}

function logged(){

}

?>