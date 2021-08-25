<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-25 23:40:14
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-25 23:54:24
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Book Sharing</title>

  @include('frontend.layouts.partials.style')

</head>
<body>

    @include('frontend.layouts.partials.header')
    @yield('content')
    @include('frontend.layouts.partials.footer')
    @include('frontend.layouts.partials.script')

</body>
</html>
