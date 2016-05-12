/**
* regApp Modul
*
* Description
*/
var app = angular.module('regApp', ['ngMessages']);


app.controller('regCtrl', ['$scope','$timeout','$http', function($scope,$timeout,$http){
	$scope.formResponse = false;
	$scope.formResponseError = true;

	$scope.formSubmit = function () {

		if($scope.name == null || $scope.email == null || $scope.phone == null){
			$scope.formResponseError = false;
			$timeout( function(){ $scope.hideFailureMessage(); }, 6000);
		}
		else
		{

		var data = { name: $scope.name, email: $scope.email, phone: $scope.phone}

		var req = {
		 method: 'POST',
		 url: 'formStore.php',
		 headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
		 data: $.param(data)
		}

		$http(req).then(function successCallback(response) {
			$scope.name = '';
			$scope.email = '';
			$scope.phone = '';
			$scope.formResponse = true;
			$timeout( function(){ $scope.hideSuccessMessage(); }, 6000);

		  }, function errorCallback(response) {
			    
		  });
		}
		
	}

	$scope.hideSuccessMessage = function () {
		$scope.formResponse = false;
	}
	$scope.hideFailureMessage = function () {
		$scope.formResponseError = true;
	}
}]);