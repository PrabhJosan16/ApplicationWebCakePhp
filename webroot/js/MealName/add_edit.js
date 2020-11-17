$(document).ready(function () {
    
    $('#type-meal-id').on('change', function () {
        
        var TypeMealId = $(this).val();
        if (TypeMealId) {
        
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'type_meal_id=' + TypeMealId,

                success: function (TypeName) {
                    $select = $('#name-type-id');
                    $select.find('option').remove();
                    $.each(TypeName, function (key, value)
                    {
                        
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
