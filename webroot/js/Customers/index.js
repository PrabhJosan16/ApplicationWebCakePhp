
// Update the customers data list
function getCustomers() {
    $.ajax({
        type: 'GET',
        url: urlToRestApi,
        dataType: "json",
        success:
                function (data) {
                    var CustomerTable = $('#CustomerData');
                    CustomerTable.empty();
                    $.each(data.customers, function (key, value)
                    {
                        var editDeleteButtons = '</td><td>' +
                                '<a href="javascript:void(0);" class="btn btn-warning" rowID="' +
                                    value.id + 
                                    '" data-type="edit" data-toggle="modal" data-target="#modalCustomerAddEdit">' + 
                                    'edit</a>' +
                                '<a href="javascript:void(0);" class="btn btn-danger"' +
                                    'onclick="return confirm(\'Are you sure to delete data?\') ?' + 
                                    'customerAction(\'delete\', \'' + 
                                    value.id + 
                                    '\') : false;">delete</a>' +
                                '</td></tr>';
                        CustomerTable.append('<tr><td>' + value.id + '</td><td>' + value.Customer_Details + '</td><td>' + value.contact + editDeleteButtons);
 
                    });

                }

    });
}

 /* Function takes a jquery form
 and converts it to a JSON dictionary */
function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    $.each(array, function () {
        json[this.name] = this.value || '';
    });

    return json;
}


function CustomerAction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = {add: "added", edit: "updated", delete: "deleted"};
    var requestType = '';
    var customerData = '';
    var ajaxUrl = urlToRestApi;
    frmElement = $("#modalCustomerAddEdit");
    if (type == 'add') {
        requestType = 'POST';
        customerData = convertFormToJSON(frmElement.find('form'));
    } else if (type == 'edit') {
        requestType = 'PUT';
        customerData = convertFormToJSON(frmElement.find('form'));
    } else {
        requestType = 'DELETE';
        ajaxUrl = ajaxUrl + "/" + id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: requestType,
        url: ajaxUrl,
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(customerData),
        success: function (msg) {
            if (msg) {
                frmElement.find('.statusMsg').html('<p class="alert alert-success">Çustomer data has been ' + statusArr[type] + ' successfully.</p>');
                getCustomers();
                if (type == 'add') {
                    frmElement.find('form')[0].reset();
                }
            } else {
                frmElement.find('.statusMsg').html('<p class="alert alert-danger">Some problem occurred, please try again.</p>');
            }
        }
    });
}

// Fill the customer's data in the edit form
function editCustomer(id) {
    $.ajax({
        type: 'POST',
        url: 'customerAction.php',
        dataType: 'JSON',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#id').val(data.id);
            $('#Customer_Details').val(data.Customer_Details);
        }
    });
}

// Actions on modal show and hidden events
$(function () {
    $('#modalCustomerAddEdit').on('show.bs.modal', function (e) {
        var type = $(e.relatedTarget).attr('data-type');
        var customerFunc = "customerAction('add');";
        $('.modal-title').html('Add new customer (customer)');
        if (type == 'edit') {
            customerFunc = "customerAction('edit');";
            $('.modal-title').html('Edit customer (customer)');
            var rowId = $(e.relatedTarget).attr('rowID');
            editCustomer(rowId);
        }
        $('#customerSubmit').attr("onclick", customerFunc);
    });

    $('#modalCustomerAddEdit').on('hidden.bs.modal', function () {
        $('#customerSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});



