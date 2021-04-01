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
    <link rel="stylesheet" href="/../../css/style.css" />
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
                    <img src="../public/3acb05f8332bf07e11b4d7f552d90224_110x110.jpg" alt="aaa">
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
                    consultables sur le site web <a href="http://barounilab.com/"><b
                            style="color:red;font-weight:bolder;">www.barounilab.com</b></a>
                </p>
            </div>

            @if($fiche != null)
            <form class="form-detail" action="{{action('newController@storeFiche')}}" method="post" id="myform">
                <h2>PRISE DE RENDEZ-VOUS POUR LE TEST DE DÉPISTAGE COVID-19 (RT-PCR)</h2>

                {{csrf_field()}}

                <b style="color:red;">{{$msg}} </b> <br><br>

                <input name="_method" type="hidden" value="post">

                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Nom <b style="color:red;">*</b>
                        </label>
                    </div>
                    <div class="Form-inputBlock">
                        <input type="text" class="FormElement FormElement-input" name="nom" required
                            style="text-transform: capitalize;" value="{{$fiche->nom}}">
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
                            style="text-transform: capitalize;" value="{{$fiche->prenom}}">
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
                            <option value="{{$fiche->sexe}}">{{$fiche->sexe}}</option>
                            <option disabled></option>
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
                        <input type="text" class="FormElement FormElement-input" name="adresse" required
                            value="{{$fiche->adresse}}">
                    </div>
                </div>
                <br>
                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Adresse mail</label>
                    </div>
                    <div class="Form-inputBlock">
                        <input type="email" class="FormElement FormElement-input" id="email" name="email"
                            value="{{$fiche->email}}">
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
                            <option value="S">Prélevement sanguin</option>
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
                            <input type="text" class="FormElement FormElement-input" name="passport" id="passport">
                        </div>
                    </div> <br>
                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Num Billet</label>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="text" class="FormElement FormElement-input" name="billet" id="billet">
                        </div>
                    </div> <br>

                    <label>Pays </label>
                    <select id="pays" class="form-control" name="pays">
                        <option value=""> Pays </option>

                        <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea Sout">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
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
            @else
            <form class="form-detail" action="{{action('newController@storeFiche')}}" method="post" id="myform">
                <h2>PRISE DE RENDEZ-VOUS POUR LE TEST DE DÉPISTAGE COVID-19 (RT-PCR)</h2>

                {{csrf_field()}}

                <b style="color:red;">{{$msg}} </b> <br><br>

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
                            <option value="S">Prélevement sanguin</option>
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
                            <input type="text" class="FormElement FormElement-input" name="passport" id="passport">
                        </div>
                    </div> <br>
                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Num Billet</label>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="text" class="FormElement FormElement-input" name="billet" id="billet">
                        </div>
                    </div> <br>

                    <label>Pays </label>
                    <select id="pays" class="form-control" name="pays">
                        <option value=""> Pays </option>

                        <option value="Afganistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curaco">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea Sout">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Phillipines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uraguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
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
            @endif

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
    (function() {
        jQuery.browser.msie = false;
        jQuery.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            jQuery.browser.msie = true;
            jQuery.browser.version = RegExp.$1;
        }
    })();
    document.getElementById('motif_test').addEventListener('change', function() {
        $('#calendar').removeAttr('disabled');
        var style = this.value == 'V' || this.value == 'R' ? 'block' : 'none';
        if (this.value == 'V') {
            $('#email').attr('required', 'required');
            $('#pays').attr('required', 'required');
            $('#passport').attr('required', 'required');
            $('#billet').attr('required', 'required');
        } else {
            $('#email').removeAttr('required');
            $('#pays').removeAttr('required');
            $('#passport').removeAttr('required');
            $('#billet').removeAttr('required');
        }
        document.getElementById('hidden_div').style.display = style;
    });
    var exclude = []
    let date = null
    $('#calendar').datepicker({
        beforeShowDay: function(date) {
            var day = jQuery.datepicker.formatDate('dd-mm-yy', date);
            return [!~$.inArray(day, exclude) && (date.getDay() != 0)];
        },
        minDate: 0
    });

    $("#calendar").datepicker("option", "dateFormat", "dd/mm/yy");

    $('select[name=motif_test]').on('change', function() {
        $('#times').empty();
        $('#calendar').html(' ');
        $.ajax({
            type: "Post",
            url: "/findDates",
            data: {
                "_token": "{{ csrf_token() }}",
                "motif_test": this.value
            },
            success: function(result) {
                console.log(result);
            }
        });
    });
    $("#calendar").change(function() {
        let motif_test = $('select[name=motif_test] option').filter(':selected').val()
        let arr = $(this).val().split('/')
        date = arr[2] + '-' + arr[1] + '-' + arr[0]
        $.ajax({
            type: "Post",
            url: "/findTimes",
            data: {
                "_token": "{{ csrf_token() }}",
                "motif_test": motif_test,
                "date": date
            },
            success: function(result) {
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
                        element.slice(0, -3) + '</a>  <div>');
                });
                $(".horaire").click(function() {
                    $(".horaire").removeClass("active");
                    $(this).addClass('active');
                    if ($(this).hasClass("active")) {
                        console.log($(this).html() + ':00')
                        $("input[name=horaire]").val($(this).html());
                    }
                });
            }
        });
    });
    </script>

</body>

</html>