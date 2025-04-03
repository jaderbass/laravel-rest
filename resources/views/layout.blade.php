<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Musik Datenbank</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-md bg-body-tertiary mb-5">
    <div class="container">
      <a class="navbar-brand" href="/songs">REST-API</a>

      <button 
        class="navbar-toggler" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#navbarNav" 
        aria-controls="navbarNav" 
        aria-expanded="false" 
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/songs">Songs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/labels">Labels</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/songs/create">Neuen Song anlegen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/labels/create">Neues Label anlegen</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
    <div class="container">
      @yield('content')
    </div>
  </main>
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>