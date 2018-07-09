(function () {
    'use strict';

    angular
        .module('elogbooks.user')
        .controller('UserEditController', ['$http', '$state', 'userResponse', UserEditController]);

    function UserEditController($http, $state, userResponse) {
        var vm = this;

        vm.user = {
            name : userResponse.name,
            email : userResponse.email
        };

        vm.edit = edit;

        function edit() {
            $http.put(
                'http://localhost:8001/user/edit/' + userResponse.id,
                vm.user
            ).then(function (response) {
                $state.go('users.view', {id:response.data.id});
            }, function () {
                console.log('Request Failed');
            });
        }
    }
})();
