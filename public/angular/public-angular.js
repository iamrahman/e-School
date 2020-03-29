var app = angular.module("myApp", ['toaster', 'ngRoute']);
var enviroment_url = window.location.origin + '/api/';
var activeId = null;

(function (app) {

    app.controller("PublicAppController", function ($scope, $http, toaster) {
        $scope.error = ['', ''];
        $scope.message = ['', ''];
        $scope.userLogin = function (data) {
            if (data === undefined)
                $scope.error = ['Username is Required', 'Email is Required'];
            else if (data.email === '' || data.email === undefined)
                $scope.error = ['Username is Required', ''];
            else if (data.password === '' || data.password === undefined)
                $scope.error = ['', 'Email is Required'];
            else
                $scope.error = ['', ''];
            $http({
                method: 'POST',
                url: enviroment_url + 'user-login',
                data: data,
                headers: { "Content-Type": "application/json" }
            }).then(function successCallback(response) {
                const data = response['data'].data;
                localStorage.setItem('role', data.role);
                if (data.role === 'admin')
                    window.location.href = window.location.origin + "/admin";
                else if (data.role === 'teacher')
                    window.location.href = window.location.origin + "/teacher";
                else if (data.role === 'acountant')
                    window.location.href = window.location.origin + "/acountant";
            }, (err) => {
                const Error = err.data;
                $scope.message = ['error', Error.message];
            });
            //$scope.userSignup();
        }

        $scope.userSignup = function () {
            const data = {
                email: "aman@parent.com",
                name: "Parent Kumari",
                password: "123456",
                phone: "9876543210",
                father_name: "Sumhgf Khan",
                mother_name: "Maharani",
                dob: "12-12-1990",
                status: "active",
                role: 'parent',
                last_login: new Date(),
            }
            const CSRF_TOKEN = $scope.getToken();
            data._token = CSRF_TOKEN;

            $http({
                method: 'POST',
                url: enviroment_url + 'user-signup',
                data: data,
                headers: { "Content-Type": "application/json" }
            }).then(function successCallback(response) {
                console.log(response)
            });

        }

        $scope.getToken = function () {
            $http({
                method: 'GET',
                url: enviroment_url + 'get-token',
            }).then(function successCallback(response) {
                console.log(response)
            });
        }
        
    });
})(app);

app.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when('/login', {
            templateUrl: 'template/public/login.html'
        })
        .when('/signup', {
            templateUrl: 'template/public/signup.html'
        })
        .when('/', {
            templateUrl: 'template/public/login.html'
        });
}]);