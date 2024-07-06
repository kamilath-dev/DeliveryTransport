<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Le Transporteur</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/3.jpg" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="../tr/style.css">

        <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    </head>
    <body id="page-top">

        

        <!-- Navigation-->
        <nav style="position:fixed; width:100%; top:0; z-index: 1;" class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div style="height: 100%;" class="container">
            <img style="border-radius:50%" height="50" width="100" src="../assets/img/logo.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div style="padding: 10px;" class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../index.html">Acceuil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                        <li style=" background-color:white;" class="nav-item"><a style="color:red;" class="nav-link" href="deconnexion.php">Se Deconnecter</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!-- Masthead-->
        
       
<br><br>
    
<section class="contact-us-section ptb-100">
        <div class="container contact">
            <div class="col-12 pb-3 message-box d-none">
                <div class="alert alert-danger"></div>
            </div>
            <div class="row justify-content-around">
                <div class="col-md-5">
                    <div class="contact-us-content">
                        <h2>Simplifiez vos envois avec Le Transporteur</h2>
                        <p class="lead">Faites confiance a notre expertise en transport et livraison et faites livrer vos colis en toute sécurité et dans les délais impartis

</p>

                 
                    </div>
            </div>
            <div class="col-md-6">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                        <div style="width:100%;" class="container">
        <h2 class="text-center">Choisir les adresses de Depart et de Livraison</h2><br>
        <form id="locationForm" method="POST">
            <div class="form-group">
                <label for="location1">Adresse de depart</label>
                <input type="text" id="location1" name="location1" class="form-control" placeholder="Entrez le premier lieu">
                <div id="suggestions1" class="suggestions"></div>
            </div>
            <div class="form-group">
                <label for="location2">Adresse de livraison</label>
                <input type="text" id="location2" name="location2" class="form-control" placeholder="Entrez le second lieu">
                <div id="suggestions2" class="suggestions"></div>
            </div>
            <input type="hidden" id="lat1" name="lat1">
            <input type="hidden" id="lon1" name="lon1">
            <input type="hidden" id="lat2" name="lat2">
            <input type="hidden" id="lon2" name="lon2">
            <input type="submit" class="btn btn-primary btn-block" value="Continuer">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        const geoapifyApiKey = 'a3c17daf41b9452388135fa6ffdf08e3'; // Remplacez par votre clé API Geoapify

        $('#location1').on('input', function() {
            const query = $(this).val();
            if (query.length > 2) {
                getSuggestions(query, '#suggestions1', '#lat1', '#lon1', '#location1');
            }
        });

        $('#location2').on('input', function() {
            const query = $(this).val();
            if (query.length > 2) {
                getSuggestions(query, '#suggestions2', '#lat2', '#lon2', '#location2');
            }
        });

        function getSuggestions(query, suggestionsContainer, latField, lonField, locationField) {
            axios.get(`https://api.geoapify.com/v1/geocode/autocomplete?text=${query}&apiKey=${geoapifyApiKey}&filter=countrycode:bj`)
                .then(response => {
                    const suggestions = response.data.features;
                    let suggestionsHtml = '';
                    suggestions.forEach(suggestion => {
                        suggestionsHtml += `<div class="suggestion-item" data-lat="${suggestion.properties.lat}" data-lon="${suggestion.properties.lon}" data-name="${suggestion.properties.formatted}">${suggestion.properties.formatted}</div>`;
                    });
                    $(suggestionsContainer).html(suggestionsHtml);
                    $(suggestionsContainer).find('.suggestion-item').on('click', function() {
                        const lat = $(this).data('lat');
                        const lon = $(this).data('lon');
                        const name = $(this).data('name');
                        $(latField).val(lat);
                        $(lonField).val(lon);
                        $(locationField).val(name);
                        $(suggestionsContainer).html('');
                    });
                })
                .catch(error => console.error('Error fetching suggestions:', error));
        }
    </script>
    <?php
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Radius of the earth in km

    $latDistance = deg2rad($lat2 - $lat1);
    $lonDistance = deg2rad($lon2 - $lon1);

    $a = sin($latDistance / 2) * sin($latDistance / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        sin($lonDistance / 2) * sin($lonDistance / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distance = $earthRadius * $c; // Distance in km

    return $distance;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $lat1 = $_POST['lat1'];
    $lon1 = $_POST['lon1'];
    $lat2 = $_POST['lat2'];
    $lon2 = $_POST['lon2'];

    $_SESSION['depart'] = $_POST['location1'];
    $_SESSION['livraison'] = $_POST['location2'];
    $distance = calculateDistance($lat1, $lon1, $lat2, $lon2);
    $ecart = number_format($distance, 2);
    $_SESSION['ecart'] = $ecart;
    
    ?>
                                <script>
                                    location.href = 'valide.php';
                                </script>
                            <?php
}
?>
                        
                    </div>
                </div>
        </div>
    </section>

   


        <hr>
       
            <div style="display:flex; justify-content:space-around; width: 90%; margin:auto;">
                <div>
                    <div style="text-align: center;"><a style="text-decoration: 2px underline; font-size:15px;" 
                href="V/ml.html">Mentions legales</a>   /    <a style="text-decoration: 2px underline; 
                font-size:15px;" href="V/cgv.html">Conditions générales de d'utilisation</a></div><br>

       
        <div style="text-align: center;"><a style="font-size:15px; text-decoration: 2px underline;" 
            href="V/pdp.html">Politique de données personnelles</a></div><br>
                </div>
                <div>
                    <h4>Adresse</h4><br>
                    Quartier Houéyihô, Ilot 1140, Parcelle J Cotonou (BENIN)<br>
 delivery.bj@letrans-porteur.com
                </div>
            </div>

            <hr>

        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2024 - Le transporteur</div></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="bootstrap/js/bootstrap.min.js" ></script>

        <script src="../styles/jquery-3.6.0.min.js"></script>
        <script src="../styles/feather.min.js"></script>
        <script src="../styles/script.js"></script>

 
<!--Bootstrap js-->
<script src="tr/js/bootstrap.min.js"></script>


<!--jquery easypiechart-->

    </body>
</html>
<style>
        
        .suggestions {
            border: 1px solid #ced4da;
            border-top: none;
            max-height: 150px;
            overflow-y: auto;
        }
        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }
        .suggestion-item:hover {
            background-color: #e9ecef;
        }
    </style>