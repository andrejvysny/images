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
        #loader {
            border: 16px solid #f3f3f3; /* Light grey */
            border-top: 16px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin: auto;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
    <p id="message"></p>
    <div id="loader"></div>
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
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.text();
                })
                .then(data => {
                    document.getElementById('message').textContent = data;
                    document.getElementById('loader').remove();
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                });
        }, 1500)

    });

</script>
</body>
</html>