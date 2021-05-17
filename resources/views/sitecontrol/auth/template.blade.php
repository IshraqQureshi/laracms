<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page_title }} - {{ $site_title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}css/bootstrap.css">
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}css/app.css">
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}css/auth.css">
    <link rel="stylesheet" href="{{ config('constants.__SITECONTROL_ASSETS') }}css/custom.css">
</head>

<body>

    @include($view_directory . $view)

</body>

</html>