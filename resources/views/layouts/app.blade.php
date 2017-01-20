<!DOCTYPE html>
<html lang="fr">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/uikit.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/uikit.min.js"></script>
</head>

<body>
    <div class="uk-container-expand header">
        <div uk-grid>
            <div class="uk-width-expand">
                <nav class="uk-navbar-container menu" uk-navbar>
                    <div class="uk-navbar-left">

                        <ul class="uk-navbar-nav">
                            <li><a class="parent" href="{{route('home')}}">Accueil</a></li>
                            <li>
                                <a class="parent" href="#">Parent</a>
                                <div class="uk-navbar-dropdown">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li><a href="#">Active</a></li>
                                        <li><a href="#">Item</a></li>
                                        <li><a href="#">Item</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a class="parent" href="#">Item</a></li>
                        </ul>

                    </div>
                </nav>
            </div>
            <div class="uk-width-1-5@m uk-width-1-1@s"><img src="/images/logo.svg" alt="Dropzone - Logo"></div>
        </div>
    </div>
</body>
</html>