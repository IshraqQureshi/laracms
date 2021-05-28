<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

@if(GeneralHelper::getSiteTheme() == 'light')
    <link rel="stylesheet" href="{{ config('constants.__FRONTEND_ASSETS') }}css/light-theme.css">
  @elseif(GeneralHelper::getSiteTheme() == 'dark')
  <link rel="stylesheet" href="{{ config('constants.__FRONTEND_ASSETS') }}css/dark-theme.css">
  @endif

  <link rel="stylesheet" href="{{ config('constants.__FRONTEND_ASSETS') }}css/custom.css">
  <title>Document</title>
</head>
<body style="font-size: {{ GeneralHelper::getSiteFontSize() }}">

  <header>
    <nav class="navbar">
      <ul>
        @foreach (GeneralHelper::getSiteNavigation() as $navItem)
          <li>
            <a href="{{ $navItem->slug }}">{{ $navItem->title }}</a>
          </li>
        @endforeach
        <li>
          <a href="#">Blog</a>
        </li>
      </ul>
    </nav>
  </header>
  

  <main>
    <section>
      <div class="container">
        @include($view_directory . $view)
      </div>
    </section>
  </main>

  <footer>
    <p>Copyrights &copy; {{ date('Y') }}</p>
  </footer>
</body>
</html>