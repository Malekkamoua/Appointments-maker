<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Prise rendez-vous</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="../../css/opensans-font.css">
    <link rel="stylesheet" type="text/css" href="../../fonts/line-awesome/css/line-awesome.min.css">

    <!-- Main Style Css -->
    <link rel="stylesheet" href="/../../css/style.css" />
</head>

<body class="form-v4">
    <div class="page-content">
        <div class="form-v4-content">

            <div class="form-left">
                <div style="display:flex;padding:5%;">
                    <center><img src="/public/logobenayed.jpg" alt="logobenayed" style="margin-left: 7%;"></center> <br>
                </div>
                <h4> Laboratoire Azza Ben Ayed</h4> <br>
                <h3>Information</h3>

                <p class="text-1">
                    Afin d’assurer la sécurité de non contamination aux patients conventionnels et de nos équipes, nous
                    avons décidé de mettre en place des circuits dédiés pour les prélèvements COVID-19. Ce système
                    permet d’éviter les contacts entre chaque personne tout en assurant notre devoir de santé publique
                    pour vous accompagner dans vos analyses.
                </p>
                <p class="text-2"><span><b>Important:</b></span>
                    <ul>
                        <li>Si vous êtes en confinement et que vous souhaitez vous faire tester pour la COVID-19, merci
                            de nous appeler sur le numéro :
                        </li>
                        <li>
                            Toute personne qui se présente sans rendez-vous ne sera pas prise en charge.
                        </li>

                </p>
                </ul>
                <p class="text-1">
                    Le résultat du test est disponible après 24h. Les résultats des tests RT-PCR Covid-19 sont
                    consultables sur le site web <a href="http://labobenayed.com/" target="_blank"><b
                            style="color:red;font-weight:bolder;">www.labobenayed.com</b></a>
                </p>
            </div>

            <form class="form-detail" action="{{action('newController@annulerRdv')}}" method="post" id="myform">
                <h2>PRISE DE RENDEZ-VOUS POUR LE TEST DE DÉPISTAGE COVID-19 (RT-PCR)</h2>

                <div class="alert alert-info" role="alert" style="position:relative; top:30px;">

                    <h4 class="alert-heading">Votre rendez-vous est fixé pour le:</h4>
                    <p> {!! $message !!}</p> <br>
                    @if($show_mail_message)
                        <p>Un mail vous a été envoyé contenant les informations que vous avez saisies ainsi que votre date et horaire de rendez-vous.</p>
                    @endif
                    <hr>
                    <p class="mb-0">
                        Prière se présenter 15 minutes avant votre rendez-vous pour les formalités d'inscription et paiement. <br><br>
                        Si vous avez des questions, veuillez appeler le *******.
                    </p>
                </div>

                <br><br>

                @if($fiche != null)
                {{csrf_field()}}
                <input name="_method" type="hidden" value="post">
                <input type="hidden" name="tel" value="{{$fiche->gsm}}">
                <button class="btn btn-danger" type="submit">Annuler rendez-vous</button>
            </form>
            @endif
            </form>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js">
    </script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script>
        jQuery.browser = {};
        (function () {
            jQuery.browser.msie = false;
            jQuery.browser.version = 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();

        document.getElementById('motif_test').addEventListener('change', function () {
            var style = this.value == 'voyage' ? 'block' : 'none';
            document.getElementById('hidden_div').style.display = style;
        });

    </script>
</body>

</html>
