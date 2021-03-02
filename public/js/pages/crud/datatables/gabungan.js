"use strict";
var KTDatatablesExtensionButtons = function() {


	var initTable1 = function() {

		// begin first table
		var table = $('#kt_datatable').DataTable({
			responsive: true,

			buttons: [
				'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
			],
			processing: true,
			serverSide: true,
			ajax: {
                url: 'http://localhost/demo1/public/json/users',
				// url: 'https://preview.keenthemes.com/metronic/theme/html/tools/preview/api/datatables/demos/default.php',
				type: 'GET',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'OrderID', 'Country',
						'ShipCity', 'ShipAddress', 'CompanyAgent', 'CompanyName',
						'Status', 'Type'],
				},
			},
            columns: [
				{data: 'id', render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                    }},
				{data: 'name'},
				{data: 'email'},
				{data: 'created_at'},
				{data: 'Status'},
				{data: 'id', responsivePriority: -1,render: function (data, type, row, meta) {
                    return '\
                    <a onclick="editData('+data+')" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3" title="Edit details">\
                    <i class="la la-edit"></i>\
                </a>\
                <a onclick="deleteData('+data+')" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3" title="Delete">\
                    <i class="la la-trash"></i>\
                </a>\
                ';
                    }},
			],columnDefs: [
				{
					width: '75px',
					targets: -2,
					render: function(data, type, full, meta) {
						var status = {
							0: {'title': 'Admin', 'class': ' label-light-warning'},
							1: {'title': 'Client', 'class': ' label-light-success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
			],
		});

		$('#export_print').on('click', function(e) {
			e.preventDefault();
			table.button(0).trigger();
		});

		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			table.button(4).trigger();
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesExtensionButtons.init();
});

function deleteData(id){
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {
        $.ajax({
            url : "users/" + id,
            type : "POST",
            data : {'_method' : 'DELETE', '_token' : csrf_token},
            success : function(data) {
                var table = $('#kt_datatable').DataTable();
                table.ajax.reload();
                swal({
                    title: 'Success!',
                    text: data.message,
                    type: 'success',
                    timer: '1500'
                })
            },
            error : function () {
                swal({
                    title: 'Oops...',
                    text: data.message,
                    type: 'error',
                    timer: '1500'
                })
            }
        });
    });
    }


    function editData(id) {
        window.location = "http://localhost/demo1/public/users/" +id+"/edit";
}

