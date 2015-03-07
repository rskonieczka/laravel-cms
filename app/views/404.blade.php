<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Law 4 Growth">
    <meta name="author" content="art4webs">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel - CMS</title>
    {{ HTML::style('front/css/bootstrap.css') }}
    {{ HTML::style('front/css/bootstrap-theme.css') }}
    <!--[if lt IE 9]>
    {{ HTML::script('front/js/html5shiv.min.js') }}
    {{ HTML::script('front/js/respond.min.js') }}
    <![endif]-->

</head>
<body>
<main>
    <section class="welcome">
        <div>
            <h1>{{ Lang::get('interface.404') }}</h1>
            <p>{{ Lang::get('interface.404desc') }}</p>
        </div>
    </section>
</main>
</body>
