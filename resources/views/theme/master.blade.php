<!DOCTYPE html>
<html lang="en">

@include('theme.head_tag')

<body class="rbt-header-sticky">

@include('theme.header')

@include('theme.mobile_menu')

@yield('body')

@include('theme.copyright')

<!-- JS
============================================ -->
<!-- Modernizer JS -->
@include('theme.script')
@yield('script')
</body>

</html>
