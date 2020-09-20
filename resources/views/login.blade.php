<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Prise rendez-vous</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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

                <form action="{{action('Controller@createFiche')}}" method="post" class="Form Form--largeFields">
                    {{csrf_field()}}
                    <h3>Confirm your bank account details</h3>
                    <b style="color:red;"> {{$message}} </b>
                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Numéro de téléphone</label>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="text" class="FormElement FormElement-input" name="tel">
                        </div>
                    </div>

                    <div class="Form-field">
                        <div class="Form-labelBlock">
                            <label for="" class="FormElement FormElement-label">Date de naissance</label>
                        </div>
                        <div class="Form-inputBlock">
                            <input type="date" class="FormElement FormElement-input" name="ddn">
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
                    <button class="fe-Button fe-Button--primary fe-Button--large">Suivant</button>
                </form>
            </div>
        </div>
    </div>
    <!-- partial -->

</body>

</html>
