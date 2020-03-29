var privateApp = angular.module("myPrivateApp", ['toaster', 'ngRoute', 'chart.js']);
var enviroment_url = window.location.origin + '/api/';
var activeId = null;

(function (privateApp) {
    privateApp.controller("PrivateAppController", function ($scope, $http, toaster, $routeParams) {

        $scope.labels = ["Absent", "Present",];
        $scope.graphData = [30, 300];

        $scope.callAPI = function (url, location) {

            $http({
                method: 'GET',
                url: enviroment_url + url,
            }).then(function successCallback(response) {
                window.location.href = window.location.origin + '/' + location;
            });
        }

        $scope.callApiGetData = function (data, url, back_url, variableName) {
            console.log(data)
            $http({
                method: 'POST',
                url: enviroment_url + url,
                data: data,
                headers: { "Content-Type": "application/json" }
            }).then(function successCallback(response) {
                document.getElementById('myForm').reset();
                toaster.pop('success', "Message", response.data.message, 3000, 'trustedHtml');
                $scope.getAPIData(back_url, variableName);
                $("#mediumModal .close").click();
            });
        }

        $scope.getAPIData = function (url, data) {
            $http({
                method: 'GET',
                url: enviroment_url + url,
            }).then(function successCallback(response) {
                $scope[data] = response['data'].data;
            });
        }

        $scope.postAPIData = function (url, data, redirect_url) {
            $http({
                method: 'POST',
                url: enviroment_url + url,
                data: data,
                headers: { "Content-Type": "application/json" }
            }).then(function successCallback(response) {
                document.getElementById('myForm').reset();
                toaster.pop('success', "Message", response.data.message, 3000, 'trustedHtml');
            });
        }

        $scope.onChangeAPI = function (original_url, url, data, value) {
            if (value === '') {
                url = original_url;
            }
            $http({
                method: 'GET',
                url: enviroment_url + url,
            }).then(function successCallback(response) {
                $scope[data] = response['data'].data;
            });
        }

        $scope.getProfileData = function (url, data) {
            $http({
                method: 'GET',
                url: enviroment_url + url + '?id=' + $routeParams.id,
            }).then(function successCallback(response) {
                $scope[data] = response['data'].data;
            });
        }
        $scope.goBack = function () {
            window.history.back();
        }

        $scope.uploadMarks = function(data) {
            console.log("data");
            console.log(data);
        }

    });
})(privateApp);

privateApp.config(['$routeProvider', function ($routeProvider) {
    const role = localStorage.getItem('role');
    $routeProvider
        .when('/dashboard', {
            templateUrl: 'template/' + role + '/dashboard.html'
        })
        .when('/classes', {
            templateUrl: 'template/' + role + '/classes.html'
        })
        .when('/students', {
            templateUrl: 'template/' + role + '/students.html'
        })
        .when('/teachers', {
            templateUrl: 'template/' + role + '/teachers.html'
        })
        .when('/upload_marks', {
            templateUrl: 'template/' + role + '/upload_marks.html'
        })
        .when('/course', {
            templateUrl: 'template/' + role + '/course.html'
        })
        .when('/results', {
            templateUrl: 'template/' + role + '/results.html'
        })
        .when('/staff', {
            templateUrl: 'template/' + role + '/staff.html'
        })
        .when('/time_table', {
            templateUrl: 'template/' + role + '/time_table.html'
        })
        .when('/announcement', {
            templateUrl: 'template/' + role + '/announcement.html'
        })
        .when('/view_all_announcement', {
            templateUrl: 'template/' + role + '/view_all_announcement.html'
        })
        .when('/student_profile/:id', {
            templateUrl: 'template/' + role + '/student_profile.html'
        })
        .when('/request', {
            templateUrl: 'template/' + role + '/request.html'
        })
        .when('/', {
            templateUrl: 'template/' + role + '/dashboard.html'
        });
}]);