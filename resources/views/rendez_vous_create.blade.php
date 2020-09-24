<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Prise rendez-vous</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" />
    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="Wrapper">
        <h2>Enable a bank feed for <b>Default Bank Account</b></h2>
        <div class="Card Card--horizontalSegments">
            <div class="Card-segment Card-segment--secondary Card-segment--padded--large Card-segment--grey">
                <div class="MediaObject MediaObject--verticallyCentered">
                    <div class="MediaObject-image">
                        <img src="https://cl.ly/pcdo/Image%202018-02-19%20at%203.07.13%20pm.png" alt="" height="32px"
                            width="32px">
                    </div>
                    <div class="MediaObject-content">
                        <h3>Natwest Business Account</h3>
                    </div>
                </div>
                <p>
                    Save time manually entering transactions by connecting directly with your NatWest Business Account
                    and have your transactions imported automatically and securely.
                </p>
                <p class="">
                    <a href="">Bankline and personal bank accounts are not eligible.</a>
                </p>
                <br>
                <br>
                <br>
                <p>
                    <a href="">← Go back</a>
                </p>
            </div>
            <div class="Card-segment Card-segment--padded--large">

                <form action="{{action('Controller@storeFiche')}}" method="post" class="Form Form--largeFields">
                    <input name="_method" type="hidden" value="post">

                    {{csrf_field()}}

                    <h3>Confirm your bank account details</h3>
                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Nom</label>
                            <b style="color:red;">*</b>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="text" class="FormElement FormElement-input" name="nom" required>
                        </div>
                    </div>

                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Prenom</label>
                            <b style="color:red;">*</b>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="text" class="FormElement FormElement-input" name="prenom" required>
                        </div>
                    </div>

                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Sexe</label>
                            <b style="color:red;">*</b>
                        </div>
                        <div class="Form-inputBlock">

                            <input type="radio" id="Homme" name="sexe" value="Homme">
                            <label for="Homme">Homme</label><br>

                            <input type="radio" id="Femme" name="sexe" value="Femme">
                            <label for="Femme">Femme</label><br>
                        </div>
                    </div>

                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Adresse</label>
                            <b style="color:red;">*</b>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="text" class="FormElement FormElement-input" name="adresse" required>
                        </div>
                    </div>
                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Adresse mail</label>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="email" class="FormElement FormElement-input" name="email">
                        </div>
                    </div>

                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Motif du test</label>
                            <b style="color:red;">*</b>
                        </div>
                        <div class="Form-inputBlock">
                            <select name="motif_test" id="motif_test" class="form-group">
                                <option></option>
                                <option value="voyage">Voyage</option>
                                <option value="suspect_covid">Suspect Covid</option>
                            </select>
                        </div>
                    </div>

                    <div class="Form-field" id="hidden_div" style="display: none;">

                        <div class="col-sm-4">
                            <label>Pays de Destination : </label>
                            <select id="pays" class="form-control" name="pays">
                                <option value=""> Pays de Destination </option>

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
                        </div>
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Date voyage</label>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="text" id="date_voyage" class="FormElement FormElement-input"
                                name="date_voyage">
                        </div>
                    </div>

                    <h3>Connect to your bank</h3>
                    <p class="Notice Notice--info">
                        This will take you out of FreeAgent to the NatWest banking website.
                    </p>
                    <p>
                        You will need your usual online banking details. Once logged in, you will be asked to review
                        Terms and Conditions and confirm or decline your agreement, before being returned automatically
                        to your FreeAgent account.
                    </p>
                    {{$tel}}
                    <input type="hidden" name="tel" value="{{$tel}}">
                    <input type="hidden" name="ddn" value="{{$ddn}}">

                    <button class="fe-Button fe-Button--primary fe-Button--large" type="submit">Suivant</button>
                </form>

            </div>
        </div>
    </div>
    <!-- partial -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js">
    </script>

    <script>
        $('#date_voyage').datetimepicker({
            inline: true,
        });

        document.getElementById('motif_test').addEventListener('change', function () {
            var style = this.value == 'voyage' ? 'block' : 'none';
            document.getElementById('hidden_div').style.display = style;
        });

    </script>
</body>

</html>
