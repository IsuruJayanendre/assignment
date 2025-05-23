<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Dashboard')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
@include('sweetalert::alert')

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center">My Dashboard</h4>
    <a href="/dash"> Dashboard</a>
    <a href="{{ route('person.index') }}"> People</a>

    @if (Auth::user()->user_type == '1')
    <a href="{{ route('religion.index') }}"> Religions</a>
    <a href="{{ route('gender.index') }}"> Genders</a>
    @endif
    
    <a href="#">⚙️ Settings</a>
    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
    @csrf
    <button type="submit" class="btn btn-link text-danger text-decoration-none w-100 text-start">
        🚪 Logout
    </button>
</form>

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
