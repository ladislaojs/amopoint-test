<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph</title>
</head>
<body>
    <div style="max-width: 1000px; max-height: 80vh; margin-bottom: 32px;">
        <h2>Visits agregated by time</h2>
        <canvas id="visits_by_time"></canvas>
    </div>
    <div style="max-height: 80vh;">
        <h2>Visits agregated by location</h2>
        <canvas id="visits_by_location"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        (async function() {
            const res = await fetch('/api/visits', {
                headers: {
                    "Accept": "application/json",
                }
            });
            const data = await res.json();

            const visitsByTime = data.visits_by_time;
            const visitsByLocation = data.visits_by_location;

            new Chart(
                document.getElementById('visits_by_time'),
                {
                type: 'bar',
                data: {
                    labels: visitsByTime.map(row => row.time),
                    datasets: [
                        {
                            label: 'Visits',
                            data: visitsByTime.map(row => row.count)
                        }
                    ]
                }
                }
            );

            new Chart(
                document.getElementById('visits_by_location'),
                {
                type: 'pie',
                data: {
                    labels: visitsByLocation.map(row => row.location),
                    datasets: [
                        {
                            label: 'Visits',
                            data: visitsByLocation.map(row => row.count)
                        }
                    ]
                }
                }
            );
        })();
    </script>
</body>
</html>