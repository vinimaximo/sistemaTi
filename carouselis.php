<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuleta Quente</title>
</head>

<body>
    <div id="banners" class="carousel slide" data-ride="carousel">
        <!-- Indicador do Item -->
        <ol class="carousel-indicators">
            <li data-target="#banners" class="active" data-slide-to="0"></li>
            <li data-target="#banners" data-slide-to="1"></li>
            <li data-target="#banners" data-slide-to="2"></li>
        </ol>
        <!-- Imagens -->
        <div class="carousel-inner" role="listbox">
            <div class="item active"><img src="images/chuleta-capa.jpg" alt="" class="center-block">
            </div>
            <div class="item"><img src="images/familia.jpg" alt="" class="center-block"></div>
            <div class="item"><img src="images/folhas.jpg" alt="" class="center-block"></div>

        </div>
        <a href="#banners" class="left carousel-control" role="button" data-slide="prev">
            <span class="glyphicon " aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a href="#banners" class="right carousel-control" role="button" data-slide="next">
            <span class="glyphicon " aria-hidden="true"></span>
            <span class="sr-only">Proximo</span>
        </a>
    </div>
</body>

</html>