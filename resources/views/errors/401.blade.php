<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 - Unauthorized</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #1a1a2e;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }
        .error-container {
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        .error-code {
            font-size: 8rem;
            font-weight: bold;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
            animation: glitch 1s infinite alternate;
        }
        .error-text {
            font-size: 1.5rem;
            margin-top: -20px;
            opacity: 0.8;
        }
        .btn-home {
            margin-top: 20px;
            padding: 12px 24px;
            background: #e94560;
            color: #ffffff;
            font-size: 1.2rem;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }
        .btn-home:hover {
            background: #ff2e63;
            box-shadow: 0px 0px 10px #ff2e63;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes glitch {
            0% { text-shadow: 4px 4px #ff0055, -4px -4px #00ffff; }
            100% { text-shadow: -4px -4px #ff0055, 4px 4px #00ffff; }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">401</div>
        <div class="error-text">Oops! You're unauthorized to see this page.</div>
        <br><a href="/" class="btn-home" style="margin-top:3rem">Go Home</a>
    </div>
</body>
</html>
