<!DOCTYPE html>
<html lang="en">
<head>

    <title>Apptite | Verse huisbereide maaltijden bij hobbychefs thuis</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:url" content="http://myapptite.be"/>
    <meta property="og:type" content="Website"/>
    <meta property="og:title" content="Apptite | Verse huisbereide maaltijden bij hobbychefs thuis"/>
    <meta property="og:description"
          content="Apptite is een online platform dat foodies samenbrengt voor een verse huisbereide maaltijd bij hobbychefs thuis."/>
    <meta property="og:image" content="http://myapptite.be/assets/images/apptite.jpg"/>


    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- CSS & Bootstrap-->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/hover-min.css">
    <link rel="stylesheet" type="text/css" href="/css/animate.css">

    <!-- Ajax -->
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>

</head>
<body>

<section>
    @yield('content')
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
</script>

<!-- Analytics script -->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-57911115-3', 'auto');
    ga('send', 'pageview');

</script>

<script src="/js/all.js"></script>

</body>
</html>