<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Network Access</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.halo.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@300;400;500&display=swap">
  <style>
    body {
      font-family: 'Geist Mono', monospace;
      letter-spacing: -0.03em;
    }

    #vanta-canvas {
      overflow: hidden;
    }

    .input-icon {
      top: 50%;
      transform: translateY(-50%);
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
  @yield('content')
  @stack('scripts')
</body>

</html>