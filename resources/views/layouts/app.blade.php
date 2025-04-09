<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Implementation</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body class="body">

    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <a href="/" class="logo">🌳 Tree Implementation</a>
            <nav>
                <a href="/tree" class="nav-link">Tree View</a>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <p>© {{ date('Y') }} TreeApp. All rights reserved.</p>
    </footer>

</body>
</html>
