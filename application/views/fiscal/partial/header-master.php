<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $title ?>
  </title>

  <link  type="image/x-icon" rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-57x57.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-60x60.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-72x72.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-76x76.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-114x114.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-120x120.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-144x144.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-152x152.png">
    <link  type="image/x-icon" rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/home/images/favicon/apple-icon-180x180.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>assets/home/images/favicon/android-icon-192x192.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/home/images/favicon/favicon-32x32.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>assets/home/images/favicon/favicon-96x96.png">
    <link  type="image/x-icon" rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/home/images/favicon/favicon-16x16.png">
    <link  type="image/x-icon" rel="manifest" href="<?= base_url() ?>assets/home/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/home/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?= base_url() ?>/_assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url() ?>/_assets/demo/demo.css" rel="stylesheet" />
  <style>
    .loader {
      position: absolute;
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid blue;
      border-right: 16px solid green;
      border-bottom: 16px solid red;
      -webkit-animation: spin 2s linear infinite;
      justify-content: center;
      align-items: center;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
      /* Safari */
      animation: spin 2s linear infinite;
      z-index: 2147483647;
      margin: 0;
      top: 40%;
      left: 50%;
      margin-right: -50%;
      transform: translate(-50%, -50%);
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% {
        -webkit-transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
      }
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body class="">