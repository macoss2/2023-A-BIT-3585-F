<?php
// Include database connection
include 'db.php';

// Fetch devices from the database
$query = $pdo->query("SELECT * FROM devices");
$devices = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Home Automation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Smart Home Automation System</h1>
        
        <div class="row mt-4">
            <?php foreach ($devices as $device): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($device['name']); ?></h5>
                        <p class="card-text">Status: <strong><?php echo ucfirst($device['status']); ?></strong></p>
                        <a href="control.php?id=<?php echo $device['id']; ?>&status=<?php echo $device['status'] === 'on' ? 'off' : 'on'; ?>" class="btn btn-<?php echo $device['status'] === 'on' ? 'danger' : 'success'; ?>">
                            Turn <?php echo $device['status'] === 'on' ? 'Off' : 'On'; ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
