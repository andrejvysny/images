<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<h1>Data from API:</h1>

<p id="message">
    loading ...
</p>


<script>

    const endpoint = "<?= $_ENV['BACKEND_HOST'] ?>";

    document.addEventListener("DOMContentLoaded", () => {
        fetch("http://backend/")
            .then(response => {
                // Check if the response status is OK (200)
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                // Parse the response body as JSON
                return response.json();
            })
            .then(data => {

                document.getElementById('message').textContent = data.message
            })
            .catch(error => {
                // Handle any errors that occurred during the fetch
                console.error('Fetch error:', error);
            });
    });

</script>
</body>
</html>