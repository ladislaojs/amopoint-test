<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <h1>This page counts visits</h1>
    <script>
        async function collectGeoData() {
            try {
                const res = await fetch("{{ $ip_api_endpoint }}");
                const data = await res.json();

                return {
                    ip_address: data.query,
                    location: data.city,
                    device: navigator.userAgent,
                };
            } catch (error) {
                console.error(error);
            }
        }

        async function sendGeoData(data) {
            try {
                const res = await fetch("/api/visits", {
                    method: "POST",
                    body: JSON.stringify(data),
                    headers: {
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                    }
                });
            } catch (error) {
                console.error(error);
            }
        };

        collectGeoData().then(sendGeoData);
    </script>
</body>
</html>