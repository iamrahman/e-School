<!DOCTYPE html>
<html lang="en">

@include('header/header')

<body class="animsition" ng-app="myApp" ng-controller = "PublicAppController" style="background: #0f0c29;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #24243e, #302b63, #0f0c29);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #24243e, #302b63, #0f0c29); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
    <div class="">
        <div class="">
            <div class="container">
                <ng-view></ng-view>
            </div>
        </div>

    </div>

@include('footer/footerScript')

</body>

</html>