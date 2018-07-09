(function () {
    'use strict';

    angular
        .module('elogbooks.job')
        .controller('JobEditController', ['$http', '$state', 'jobResponse', '$scope', JobEditController]);

    function JobEditController($http, $state, jobResponse, $scope) {
        var vm = this;


        $scope.users = $http.get("http://localhost:8001/user")
            .then(function(response) {
                $scope.users = response.data.data;
            });
        vm.job = {
            description : jobResponse.description,
            status : jobResponse.status,
            user_id : jobResponse.user_id
        };

        vm.edit = edit;

        function edit() {
            $http.put(
                'http://localhost:8001/job/edit/' + jobResponse.id,
                vm.job
            ).then(function (response) {
                $state.go('jobs.view', {id:response.data.id});
            }, function () {
                console.log('Request Failed');
            });
        }
    }
})();
