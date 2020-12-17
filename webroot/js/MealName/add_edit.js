/*$(document).ready(function () {
    
    $('#type-meal-id').on('change', function () {
        
        var typeMealId = $(this).val();
        if (typeMealId) {
        
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'type_meal_id=' + typeMealId,

                success: function (typeName) {
                    $select = $('#name-type-id');
                    $select.find('option').remove();
                    $.each(typeName, function (key, value)
                    {
                        
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name_meal + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#name-type-id').html('<option value="">Select Meal type first</option>');
        }
    });
});*/

var app = angular.module('linkedlists', []);

app.controller('TypeMealController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.nameType = response.data.nameType;
    });
});
