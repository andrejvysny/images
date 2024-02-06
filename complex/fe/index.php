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
    <style>
        body{
            margin: 0;
            padding: 0;
            text-align: center;
            font-family: 'Roboto', sans-serif;
            background-color: #333333;
        }

        .variables,
        .data{
            display: block;
            background-color: white;
            margin: 50px auto;
            max-width: 1000px;
            border-radius: 20px;
            width: fit-content;
            padding: 40px;
        }

    </style>
</head>
<body>


<div class="variables">
    <p>
        Backend: <?= $_ENV['BACKEND_HOST'] ?>
    </p>

    <p>
        Private Backend: <?= $_ENV['PRIVATE_BACKEND_HOST'] ?>
    </p>

    <p>
        TEST_ENV = <?= $_ENV['TEST_ENV'] ?>
    </p>

    <p>
        SERVER_ADDR = <?= $_SERVER['SERVER_ADDR'] ?>
    </p>

    <p>
        SERVER_NAME = <?= $_SERVER['SERVER_NAME'] ?>
    </p>

    <p>
        SERVER_PORT = <?= $_SERVER['SERVER_PORT'] ?>
    </p>
</div>

<div class="data">
    <h1>Data from PUBLIC API: JS Fetch</h1>

    <p id="message">
        loading ...
    </p>
</div>

<div class="data">

<h1>Data from PRIVATE API: PHP Curl</h1>

<?php
$api_url = $_ENV['PRIVATE_BACKEND_HOST'];
if ($api_url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
    } else {
        curl_close($ch);
        echo "<pre>";
        print_r($response);
        echo "</pre>";
    }
}
?>
</div>

<script>

    const endpoint = "<?= $_ENV['BACKEND_HOST'] ?>";

    document.addEventListener("DOMContentLoaded", () => {

        setTimeout(() => {
            fetch(endpoint)
                .then(response => {
                    // Check if the response status is OK (200)
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    // Parse the response body as JSON
                    return response.json();
                })
                .then(data => {

                    document.getElementById('message').textContent = data
                })
                .catch(error => {
                    // Handle any errors that occurred during the fetch
                    console.error('Fetch error:', error);
                });
        }, 1500)

    });

</script>
</body>
</html>