(function () {
    'use strict';

    angular
        .module('elogbooks.job')
        .controller('JobViewController', ['$http', 'jobResponse', '$scope', JobViewController]);

    function JobViewController($http, jobResponse, $scope) {
        var vm = this;

        vm.job = {
            description : jobResponse.description,
            status : jobResponse.status,
            user_id : jobResponse.user_id
        };

       $scope.user = $http.get("http://localhost:8001/user/" + jobResponse.user_id)
            .then(function(response) {
                $scope.user = response.data;
                console.log(response.data);

            });

        console.log(vm.job);
    }
})();
