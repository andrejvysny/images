<?php 
require_once "./functions.php"
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link href="./style.css" rel="stylesheet"/>
</head>
<body>


<div class="container">
    <div class="row my-5">
        <div class="col-12">
                <h1 class="text-light text-center" >Analyze connections</h1>
        </div>
    </div>


    <div class="row my-4">
        <div class="col-md-12">
            <div class="card py-4">
                <div class="card-head">
                    <h3>Current Service</h3>
                </div>
                <div class="card-body">

                <div class="row">

                <div class="col-md-6">
                    <h5 class="mt-5 fw-bold">Server Variables</h5>
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $server = ["SERVER_NAME", "SERVER_ADDR", "SERVER_PORT","SERVER_PROTOCOL","HTTPS","REMOTE_ADDR","REMOTE_HOST"];
                        foreach($server as $var){
                            ?>
                        <tr>
                        <td><?= $var?></td>
                        <td><?= $_SERVER[$var] ?? null?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                    </div>


                    <div class="col-md-6">
                    <h5 class="mt-5 fw-bold">Environment Variables</h5>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $environment = ["BACKEND_HOST", "PRIVATE_BACKEND_HOST", "TEST_ENV"];
                        foreach($environment as $var){
                            ?>
                        <tr>
                        <td><?= $var?></td>
                        <td><?= $_ENV[$var] ?? null?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                    </div>

                   

                </div>

                </div>
            </div>            
        </div>
    </div>

    <div class="row my-4">
        <div class="col-md-6">
            <div class="card py-4" style="background: #d8edf3">
                <div class="card-head">
                    <h3>Backend Public Service</h3>
                </div>
                <div class="card-body">

                <div class="row">
                        <div class="col-12 py-4 border-bottom">
                                <h5 class="fw-bold">JS Fetch</h5>
                                <p class="p-0" id="message"></p>
                                <div id="loader">
                                    <div class="spinner-border text-primary " role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>    
                        </div>
                    </div>

                </div>

                <div class="row">
                        <div class="col-12 py-4">
                            <h5 class="fw-bold">PHP Curl</h5>                      
                            <?= isset($_ENV["BACKEND_HOST"]) ? getRequest($_ENV["BACKEND_HOST"]) : "Undefined BACKEND_HOST"?>                   
                        </div>
                    </div>
            </div>            
        </div>

        <div class="col-md-6 ">
            <div class="card py-4" style="background: #f3d8d8">
                <div class="card-head">
                    <h3>Backend Private Service</h3>    
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12 py-4 border-bottom">
                                <h5 class="fw-bold">JS Fetch</h5>
                                <p class="p-0" id="message_private"></p>
                                <div id="loader_private">
                                    <div class="spinner-border text-primary " role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 py-4">
                            <h5 class="fw-bold">PHP Curl</h5>
                        
                                <?= isset($_ENV["PRIVATE_BACKEND_HOST"]) ? getRequest($_ENV["PRIVATE_BACKEND_HOST"]) : "Undefined PRIVATE_BACKEND_HOST"?>
                            
                        </div>
                    </div>

                </div>
            </div>            
        </div>
    </div>
</div>







<script>
    const endpoint = "<?= $_ENV['BACKEND_HOST'] ?>";
    const endpointprivate = "<?= $_ENV['PRIVATE_BACKEND_HOST'] ?>";
</script>
<script defer src="./script.js"></script>

</body>
</html>