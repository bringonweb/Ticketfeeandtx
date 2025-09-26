<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="navbar-fix.css">
</head>
<body>
    <?php include 'partials/navbar.php'; ?>
    <div class="error-page-container">
        <div class="error-page-content">
            <h1 class="error-page-title">404</h1>
            <h2 class="error-page-subtitle">Oops! Page Not Found</h2>
            <p class="error-page-message">
                The page you're looking for might have been removed, had its name changed, or is temporarily unavailable.
            </p>
            <a href="/" class="error-page-button">Go to Homepage</a>
        </div>
    </div>
</body>
</html>