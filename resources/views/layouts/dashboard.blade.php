<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
    }
    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: white;
    }
    .sidebar a {
      color: white;
      padding: 10px;
      display: block;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #495057;
    }
    .content {
      flex-grow: 1;
      padding: 20px;
    }
    .navbar {
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center">My Dashboard</h4>
    <a href="#"> Dashboard</a>
    <a href="{{ route('person.index') }}"> People</a>
    <a href="#"> Reports</a>
    <a href="#"> Users</a>
    <a href="#">⚙️ Settings</a>
    <a href="#" class="mt-auto text-danger">🚪 Logout</a>
  </div>

  <!-- Main Content -->
  <div class="content">
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand navbar-light mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Welcome, {{ Auth::user()->name ?? 'Guest' }}</span>
      </div>
    </nav>

    <!-- Yielded Page Content -->
    <div class="container">
      @yield('content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
