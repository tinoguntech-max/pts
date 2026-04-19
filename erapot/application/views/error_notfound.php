<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= DEVELOPER_IDENTITY ?> Error Page">
    <meta name="keywords" content="<?= DEVELOPER_IDENTITY ?>">
    <link rel="shortcut icon" href="img/ico/favicon.png">
    <title><?= DEVELOPER_IDENTITY ?> - 404 Error</title>

    <!-- Base Styles -->
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/style-responsive.css') ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->


</head>

  <body class="body-404">

      <section class="error-wrapper">
          <i class="icon-404"></i>
          <div class="text-center">
              <h2 class="green-bg">page not found</h2>
          </div>
          <p>Something went wrong or that page doesn't exist yet.</p>
          <a href="<?= base_url() ?>" class="back-btn">Back to Home</a>
      </section>

  </body>
</html>
