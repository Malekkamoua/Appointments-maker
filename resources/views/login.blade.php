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
    <link rel="stylesheet" href="../../css/style.css" />
</head>

<body class="form-v4">
    <div class="page-content">
        <div class="form-v4-content">
            <div class="form-left">
                <h2>INFOMATION</h2>
                <p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.</p>
                <p class="text-2"><span>Eu ultrices:</span> Vitae auctor eu augue ut. Malesuada nunc vel risus commodo
                    viverra. Praesent elementum facilisis leo vel.</p>
                <p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.</p>
                <p class="text-2"><span>Eu ultrices:</span> Vitae auctor eu augue ut. Malesuada nunc vel risus commodo
                    viverra. Praesent elementum facilisis leo vel. Lorem ipsum </p>
                <p class="text-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.</p>

            </div>

            <form class="form-detail" action="{{action('Controller@createFiche')}}" method="post" id="myform"
                style="position:relative; top:35px;">
                <h2>Prise de rendez-vous pour test PCR</h2>

                {{csrf_field()}}

                <input name="_method" type="hidden" value="post">
                <b style="color:red;">{{$message}}</b>
                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Nom <b style="color:red;">*</b>
                        </label>
                    </div>
                    <div class="Form-inputBlock">
                        <input type="number" class="FormElement FormElement-input" name="tel" required>
                    </div>
                </div>
                <br>

                <div class="Form-field">
                    <div class="Form-labelBlock">
                        <label for="" class="FormElement FormElement-label">Nom <b style="color:red;">*</b>
                        </label>
                    </div>
                    <div class="Form-inputBlock">
                        <input type="date" class="FormElement FormElement-input" name="ddn" required>
                    </div>
                </div>
                <br>
                <div class="form-row-last" style="padding: 12%;position: relative;top: -14px;
">
                    <input type="submit" name="register" class="btn btn-info" value="Register" style="float:right;">
                </div>
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
            var style = this.value == 'voyage' ? 'block' : 'none';
            document.getElementById('hidden_div').style.display = style;
        });

    </script>
</body>

</html>
