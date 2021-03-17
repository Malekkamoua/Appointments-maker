<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }

    </style>

</head>

<body class="login-page" style="background: white">

    <div>
        <center> <img src="./header2.jpg" alt="logo"></center>
        <h5 class="imgs">
            <center>Laboratoire Mohamed Nejib Barouni El menzah 6 <br> Ariana (Tél: 71 236 155 - 71
                767 177)</center>
        </h5>
        <h4>
            @if($show_text)
                <center>FICHE DE RENDEZ-VOUS TEST COVID </center>
            @else
                <center>FICHE DE RENDEZ-VOUS</center>
            @endif
        </h4>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                    </td>
                    <td></td>
                    <td class="text-right"> <br>
                        <img src="data:image/png;base64, {!! $qrcode !!}">

                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
        <div class="row">
            <div class="col-xs-7">
                <p><b>N°RENDEZ-VOUS: </b> {{$num_rdv}}</p>
                <p><b>SAISIE LE: </b> {{$saisie}} </p>

                <br>
            </div>

            <div class="col-xs-4">
                <p><b>DATE DE RENDEZ-VOUS: </b> {{$date_rdv}} </p>
                <p><b>HEURE DE RENDEZ-VOUS: </b> {{$heure_rdv}} </p>
            </div>
        </div>
        <div style="margin-bottom: 0px">&nbsp;</div>


        <table class="table">
            <thead>
                <tr>
                    <th>Informations du patient</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <b>NOM PRENOM:</b> <br> <br>
                        <b>DATE NAISSANCE:</b> <br>
                        <b>SEXE: </b> <br>
                        <b>TELEHONE:</b> <br>
                        <b>EMAIL:</b> <br>
                        <b>ADRESSE:</b> <br>
                    </td>
                    <td></td>
                    <td class="text-left">
                        {{$nom}} {{$prenom}} <br> <br>
                        {{$ddn}} <br>
                        {{$sexe}} <br>
                        {{$tel}} <br>
                        {{$email}} <br>
                        {{$adresse}} <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>PAYS DE DEPART:</b> <br>
                        <b>PAYS D'ARRIVEE:</b> <br>
                        <b>NUMERO DE PASSPORT:</b> <br>
                        <b>NUMERO DE BILLET:</b> <br>
                    </td>
                    <td></td>
                    <td class="text-left">
                        {{$pays}} <br>
                        Tunisie <br>
                        {{$passport}} <br>
                        {{$billet}} <br>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>
