var mod=angular.module('bzapp',[]);
mod.controller('bz3ctrl',[
    '$scope',function($scope)
    {
        $scope.pics=[
             {
    "userId": 1,
    "id": 1,
    "title": "swapping of two numbers"
  },
  {
    "userId": 3,
    "id": 1,
    "title": "bubble sort of two numbers"
  },
  {
    "userId": 2,
    "id": 1,
    "title": "sorting of two numbers"
  },
  
  {
    "userId": 4,
    "id": 9,
    "title": "how to find fibinocci series"
  }
  
        ];
    }
]);