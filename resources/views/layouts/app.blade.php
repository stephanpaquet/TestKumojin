<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TestKumojin - Test technique</title>


    <script src="https://unpkg.com/vuejs-datepicker/dist/locale/translations/fr.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body>

<div class="container-fluid" id="app">
    <App></App>
</div>

<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
