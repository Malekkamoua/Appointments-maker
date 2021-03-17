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
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/redmond/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <!-- Main Style Css -->
    <link rel="stylesheet" href="../../css/style.css" />
    <style>
        .active {
            background-color: yellow;
        }

    </style>
</head>

<body class="form-v4">
    <div class="page-content">
        <div class="form-v4-content">
            <div class="form-left">
                <div style="display:flex;padding:5%;">
                    <img src="../../3acb05f8332bf07e11b4d7f552d90224_110x110.jpg" alt="aaa">
                    <h2 style="margin:5%;">Laboratoire Najib Barouni</h2>
                </div>
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
                            de nous appeler sur le numéro : 23 707 465
                        </li>
                        <li>
                            Toute personne qui se présente sans rendez-vous ne sera pas prise en charge.
                        </li>

                </p>
                </ul>
                <p class="text-1">
                    Le résultat du test est disponible après 24h. Les résultats des tests RT-PCR Covid-19 sont
                    consultables sur le site web <a href="https://barounilab.com/"><b
                            style="color:red;font-weight:bolder;">www.barounilab.com</b></a>
                </p>
            </div>

            <form class="form-detail" action="{{action('newController@storeFiche')}}" method="post" id="myform">
                <h2>PRISE DE RENDEZ-VOUS POUR LE TEST DE DÉPISTAGE COVID-19 (RT-PCR)</h2>

                {{csrf_field()}}

                <input name="_method" type="hidden" value="post">

                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Nom <b style="color:red;">*</b>
                        </label>
                    </div>
                    <div class="Form-inputBlock">
                        <input type="text" class="FormElement FormElement-input" name="nom" required
                            style="text-transform: capitalize;">
                    </div>
                </div>
                <br>
                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Prenom <b style="color:red;">*</b>
                        </label>
                    </div>
                    <div class="Form-inputBlock">
                        <input type="text" class="FormElement FormElement-input" name="prenom" required
                            style="text-transform: capitalize;">
                    </div>
                </div>
                <br>
                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Sexe <b style="color:red;">*</b>
                        </label>
                    </div>
                    <div class="Form-inputBlock">
                        <select name="sexe" id="sexe" class="form-control">
                            <option></option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Adresse <b style="color:red;">*</b>
                        </label>
                    </div>
                    <div class="Form-inputBlock">
                        <input type="text" class="FormElement FormElement-input" name="adresse" required>
                    </div>
                </div>
                <br>
                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Adresse mail</label>
                    </div>
                    <div class="Form-inputBlock">
                        <input type="email" class="FormElement FormElement-input" id="email" name="email">
                    </div>
                </div>
                <br>
                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Motif du test <b style="color:red;">*</b>
                        </label>
                    </div>
                    <div class="Form-inputBlock">
                        <select name="motif_test" id="motif_test" class="form-control">
                            <option></option>
                            <option value="A">Suspect Covid</option>
                            <option value="V">Voyage</option>
                            <option value="R">Retour voyage</option>
                            <option value="S">sang</option>
                        </select>
                    </div>
                </div>
                <br>

                <div class="Form-field" id="hidden_div" style="display: none;">
                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Passport</label>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="number" class="FormElement FormElement-input" name="passport" id="passport">
                        </div>
                    </div> <br>
                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Num Billet</label>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="number" class="FormElement FormElement-input" name="billet" id="billet">
                        </div>
                    </div> <br>

                    <label>Pays </label>
                    <select id="pays" class="form-control" name="pays">
                        <option value=""> Pays </option>

                        <option value=Albanie>Albanie</option>
                        <option value=Alg&eacute;rie>Alg&eacute;rie</option>
                        <option value=Allemagne>Allemagne</option>
                        <option value=Arabie Saoudite>Arabie Saoudite</option>
                        <option value=Australie>Australie</option>
                        <option value=Autriche>Autriche</option>
                        <option value=Bahre&iuml;n>Bahre&iuml;n</option>
                        <option value=Belgique>Belgique</option>
                        <option value=Br&eacute;sil>Br&eacute;sil</option>
                        <option value=Bulgarie>Bulgarie</option>
                        <option value=Canada>Canada</option>
                        <option value=Chine>Chine</option>
                        <option value=Cor&eacute;e du nord>Cor&eacute;e du nord</option>
                        <option value=Cor&eacute;e du Sud>Cor&eacute;e du Sud</option>
                        <option value=Croatie>Croatie</option>
                        <option value=Danemark>Danemark</option>
                        <option value=Egypte>Egypte</option>
                        <option value=Emirats arabes unis>Emirats arabes unis</option>
                        <option value=Espagne>Espagne</option>
                        <option value=Etats-Unis>Etats-Unis</option>
                        <option value=Finlande>Finlande</option>
                        <option value=France>France</option>
                        <option value=Gabon>Gabon</option>
                        <option value=Gr&egrave;ce>Gr&egrave;ce</option>
                        <option value=Hong Kong>Hong Kong</option>
                        <option value=Hongrie>Hongrie</option>
                        <option value=Inde>Inde</option>
                        <option value=Irak>Irak</option>
                        <option value=Iran>Iran</option>
                        <option value=Italie>Italie</option>
                        <option value=Japon>Japon</option>
                        <option value=Jordanie>Jordanie</option>
                        <option value=Koue&iuml;t>Koue&iuml;t</option>
                        <option value=Liban>Liban</option>
                        <option value=Luxembourg>Luxembourg</option>
                        <option value=Lybie>Lybie</option>
                        <option value=Malaisie>Malaisie</option>
                        <option value=Mali>Mali</option>
                        <option value=Malte>Malte</option>
                        <option value=Maroc>Maroc</option>
                        <option value=Mauritanie>Mauritanie</option>
                        <option value=Oman>Oman</option>
                        <option value=Palestine>Palestine</option>
                        <option value=Pays Bas>Pays Bas</option>
                        <option value=Philippines>Philippines</option>
                        <option value=Pologne>Pologne</option>
                        <option value=Portugal>Portugal</option>
                        <option value=Qatar>Qatar</option>
                        <option value=Romanie>Romanie</option>
                        <option value=Russie>Russie</option>
                        <option value=S&eacute;n&eacute;gal>S&eacute;n&eacute;gal</option>
                        <option value=Serbie>Serbie</option>
                        <option value=Singapour>Singapour</option>
                        <option value=Su&egrave;de>Su&egrave;de</option>
                        <option value=Suisse>Suisse</option>
                        <option value=Sychelles>Sychelles</option>
                        <option value=Syrie>Syrie</option>
                        <option value=Thailande>Thailande</option>
                        <option value=Turquie>Turquie</option>
                        <option value=Ukraine>Ukraine</option>
                        <option value=Yemen>Yemen</option>
                    </select>
                    <br>
                </div>

                <div class="Form-labelBlock">
                    <label for="" class="FormElement FormElement-label">Date rendez-vous <b
                            style="color:red;">*</b></label>
                </div>
                <input id="calendar" class="FormElement FormElement-input" name="date_voyage" disabled required> <br>
                <br>

                <div id="times">

                </div>

                <input type="hidden" name="horaire" id='horaire' required>
                <input type="hidden" name="tel" value="{{$tel}}">
                <input type="hidden" name="ddn" value="{{$ddn}}">

                <div class="form-row-last">
                    <input type="submit" class="register" value="Valider" style="float:right;">
                </div>

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

            $('#calendar').removeAttr('disabled');

            var style = this.value == 'V' || this.value == 'R' ? 'block' : 'none';

            if (this.value == 'V') {
                $('#email').attr('required', 'required');

            } else {
                $('#email').removeAttr('required');;
            }

            document.getElementById('hidden_div').style.display = style;
        });

        var exclude = []

        let date = null

        $('#calendar').datepicker({
            beforeShowDay: function (date) {
                var day = jQuery.datepicker.formatDate('dd-mm-yy', date);
                return [!~$.inArray(day, exclude) && (date.getDay() != 0)];
            },
            minDate: 0
        });

        $('select[name=motif_test]').on('change', function () {

            $('#times').empty();
            $('#calendar').html(' ');

            $.ajax({
                type: "Post",
                url: "/findDates",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "motif_test": this.value
                },
                success: function (result) {
                    console.log(result);
                }
            });
        });

        $("#calendar").change(function () {

            let motif_test = $('select[name=motif_test] option').filter(':selected').val()

            let arr = $(this).val().split('/')
            date = arr[2] + '-' + arr[0] + '-' + arr[1]

            $.ajax({
                type: "Post",
                url: "/findTimes",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "motif_test": motif_test,
                    "date": date
                },
                success: function (result) {
                    console.log(result);
                    $('#times').empty();
                    if (result.length == 0) {
                        $("#times").append('<small><center>Horaire indisponible.</center></small>')
                    } else {
                        $("#times").append(
                            '<label>Horaires disponibles: <b style="color:red;">*</b></label> ')
                    }
                    result.forEach(element => {
                        $("#times").append(
                            '<div style="display: inline-grid;margin:10px;"> <a class="btn btn-info horaire">' +
                            element + '</a>  <div>');
                    });

                    $(".horaire").click(function () {

                        $(".horaire").removeClass("active");
                        $(this).addClass('active');

                        if ($(this).hasClass("active")) {
                            console.log($(this).html())
                            $("input[name=horaire]").val($(this).html());
                        }
                    });


                }
            });
        });

    </script>

</body>

</html>
