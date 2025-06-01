<?php
include 'koneksi.php'; // Pastikan file koneksi ke database ada

// Ambil data suara kandidat dari database
$query = "SELECT name, votes FROM candidates";
$result = $conn->query($query);

$candidate_names = [];
$candidate_votes = [];

while ($row = $result->fetch_assoc()) {
    $candidate_names[] = $row['name'];
    $candidate_votes[] = $row['votes'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagram Voting</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Hasil Voting Ketua OSIS</h1>
    <canvas id="voteChart" width="400" height="400"></canvas>
    <script>
        const ctx = document.getElementById('voteChart').getContext('2d');
        const voteChart = new Chart(ctx, {
            type: 'bar', // Anda bisa mengganti menjadi 'pie' jika ingin diagram pie
            data: {
                labels: <?php echo json_encode($candidate_names); ?>,
                datasets: [{
                    label: 'Jumlah Suara',
                    data: <?php echo json_encode($candidate_votes); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
