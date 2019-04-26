<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>@yield('title')</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./assets/material.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="assets/mdl-stepper-master/stepper.min.css"/>
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-orange.min.css" />
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      @yield('css')
    </head>
    <body>
      <div class="mdl-layout mdl-js-layout">
          <!-- Always shows a header, even in smaller screens. -->
          <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <header class="mdl-layout__header">
              <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">Title</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                  <a class="mdl-navigation__link" href="">Link</a>
                  <a class="mdl-navigation__link" href="">Link</a>
                  <a class="mdl-navigation__link" href="">Link</a>
                  <a class="mdl-navigation__link" href="">Link</a>
                </nav>
              </div>
            </header>
            <div class="mdl-layout__drawer">
              <span class="mdl-layout-title">Title</span>
              <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
              </nav>
            </div>
            <main class="mdl-layout__content">
              <div class="page-content">
                  <!-- Your content goes here -->
                  @yield('content')
              </div>
            </main>
          </div>
      </div>
      <script defer src="assets/material.min.js"></script>
      <script defer src="assets/mdl-stepper-master/stepper.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="assets/bootstrap/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
