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
                document.getElementById('message').textContent = JSON.stringify(data, undefined,2);
                document.getElementById('loader').remove();
            })
            .catch(error => {
                console.error('Fetch error:', error);
            });
    }, 1500)

    setTimeout(() => {
        fetch(endpointprivate)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                document.getElementById('message_private').textContent = JSON.stringify(data, undefined,2);
                document.getElementById('loader_private').remove();
            })
            .catch(error => {
                document.getElementById('message_private').textContent = error;
                document.getElementById('message_private').style.color = "red";
                document.getElementById('loader_private').remove();
                console.error('Fetch error:', error);
            });
    }, 1500)
});