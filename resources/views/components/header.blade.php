<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SPP</title>

  <link rel="stylesheet" href="{{ urlTemplate() }}assets/modules/fontawesome/css/all.min.css">

  <link rel="stylesheet" type="text/css" href="{{ mix('css/all_css.css') }}">
  <link rel="stylesheet" href="{{ urlTemplate() }}assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="stylesheet" href="{{ urlTemplate() }}assets/modules/select2/dist/css/select2.min.css">

  
  @stack('css')
<!-- Start GA -->
<!-- /END GA -->
</head>