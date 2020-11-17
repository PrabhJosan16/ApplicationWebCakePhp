$(document).ready(function () {
    // The path to action from CakePHP is in urlToLinkedListFilter 
    $('#type_meal_id').on('change', function () {
        var typeMealId = $(this).val();
        if (typeMealId) {
            $.ajax({
                url: urlToLinkedListFilter,
                data: 'type_meal_id=' + typeMealId,
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
            $('#name-type-id').html('<option value="">Select Type meal first</option>');
        }
    });
});


