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
                {{$message}} <br>

            <!-- @if($fiche != null)
                <a class="btn btn-success"
                    href="{{ URL::to('/rendez-vous-covid/modifier/' . $fiche->id) }}">
                    Modifier
                </a>
            @endif -->
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
