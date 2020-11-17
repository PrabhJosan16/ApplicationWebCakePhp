/* global urlToLinkedListFilter */
    // The path to action from CakePHP is in urlToLinkedListFilter
$(document).ready(function () {
    
    $('#type-meal-id').on('change', function () {
        
        var TypeMealId = $(this).val();
        if (TypeMealId) {
        
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'type_meal_id=' + TypeMealId,

                success: function (TypeNameMe) {
                    $select = $('#name-type-id');
                    $select.find('option').remove();
                    $.each(TypeNameMe, function (key, value)
                    {
                        alert("SEX");
                        $.each(value, function (childKey, childValue) {
                            $select.append('<option value=' + childValue.id + '>' + childValue.name_meal + '</option>');
                        });
                    });
                }
            });
        } else {
            $('#name-type-id').html('<option value="">Select KrajRegion first</option>');
        }
    });
});
