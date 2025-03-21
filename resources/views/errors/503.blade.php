<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We'll Be Back Soon - Maintenance Mode</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            text-align: center;
        }
        .container {
            max-width: 600px;
            padding: 30px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top: 4px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="mb-3">🚧 We're Under Maintenance 🚧</h1>
        <p>We're making some updates to improve your experience. Please check back later!</p>
        
        <div class="spinner"></div>

        <p class="mt-3">Thank you for your patience.</p>
    </div>

</body>
</html>
