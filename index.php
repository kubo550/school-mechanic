<!DOCTYPE html>
<html lang="pl">

<body>
    <?php include('header.php'); ?>

    <div class="container">
        <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
                <li data-target="#carousel-example-2" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                        <img class="d-block w-100" height="500" width="1600" src="https://www.mazautouae.com/wp-content/themes/automobile-child/images/inner-banner-img.jpg" alt="Warsztat Logo">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Kurdziel Warsztat </h3>
                        <p>Sprawdz co Cię czeka</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view">
                        <img class="d-block w-100" height="500" src="https://i.pinimg.com/originals/fe/24/e6/fe24e649db9d259f2b59edef6bcea577.jpg" alt="Second slide">
                        <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Wpisz się na listę klientów</h3>
                        <a href="klienci.php">
                            <button class="btn btn-primary">Dodaj Klienta</button>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="view">
                        <img class="d-block w-100" height="500" src="https://ocdn.eu/images/pulscms/NDg7MDA_/511a2dcfb670ce7ab044005bab6b7d76.jpg" alt="Third slide">
                        <div class="mask rgba-black-slight"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Samochody</h3>
                        <a href="samochody.php">
                            <button class="btn btn-primary">Dodaj Samochód</button>
                        </a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>

</body>

</html>