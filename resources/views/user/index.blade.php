<!DOCTYPE html>
<html lang="en">
    @include('header/header');

<body class="animsition" ng-app="myPrivateApp" ng-controller = "PrivateAppController">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('sidebar/index')

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('navbar/index')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
            <toaster-container toaster-options="{'time-out': 3000,'position-class': 'toast-top-right'}"></toaster-container>
                <ng-view></ng-view>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
@include('footer/footerScript')

</body>

</html>
<!-- end document-->
