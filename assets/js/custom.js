$(document).ready(function () {
	// Dynamic modal #general
	$(document).on('click', '[data-target="#customModel"]', function (e) {
		e.preventDefault();
		var href = $(this).attr('href');
		$.get(href, function (data) {
			$("#customModel").html(data).modal();
		});
	});

	// Image Model
	$(document).on('click', '[data-target="#lightbox"]', function (e) {
		e.preventDefault();
		var href = $(this).attr('href');
		$(".popup-image").attr('src', href);
		$("#lightbox").modal();
	});

	$('.select2-general').select2({
		minimumResultsForSearch: 20
	});

});

function id_encrypt(string) {
    var key = 'FbcCY2yCFBwVCUE9R+6kJ4fAL4BJxxjd';
    var iv = 'e16ce913a20dadb8';
    var encrypted = CryptoJS.AES.encrypt(string, CryptoJS.enc.Utf8.parse(key), {
        iv: CryptoJS.enc.Utf8.parse(iv)
    });
    var str = encrypted.toString();
    return window.btoa(str);
}

$('#image').change(function (e) {
	v = $(this).val();
	if (v != '') {
		// Validate File Extension
		var validExts = new Array(".jpg", ".jpeg", ".png");
		var fileExt = v;
		fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
		if (validExts.indexOf(fileExt) < 0) {
			e.preventDefault();
			swal({
				type: "warning",
				text: "Invalid file selected. Only jpg, jpeg and png file is allowed",
				title: "Image error"
			});
			$(this).val('');
			// $('form[data-toggle="validator"]').bootstrapValidator('updateStatus', 'csv_file', 'NOT_VALIDATED');
			return false;
		}
		// Validate file size
		if (e.target.files[0].size > (1024 * 1024)) {
			e.preventDefault();
			swal({
				type: "warning",
				text: "Allowed file size exceeded. (Max. 1024 KB)",
				title: "Image error"
			});
			$(this).val('');
			// $('form[data-toggle="validator"]').bootstrapValidator('updateStatus', 'csv_file', 'NOT_VALIDATED');
			return false;
		}

		else
			return true;
	}
});

$('#icon').change(function (e) {
	v = $(this).val();
	if (v != '') {
		// Validate File Extension
		var validExts = new Array(".jpg", ".jpeg", ".png");
		var fileExt = v;
		fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
		if (validExts.indexOf(fileExt) < 0) {
			e.preventDefault();
			swal({
				type: "warning",
				text: "Invalid file selected. Only jpg, jpeg and png file is allowed",
				title: "Image error"
			});
			$(this).val('');
			// $('form[data-toggle="validator"]').bootstrapValidator('updateStatus', 'csv_file', 'NOT_VALIDATED');
			return false;
		}
		// Validate file size
		if (e.target.files[0].size > (1024 * 1024)) {
			e.preventDefault();
			swal({
				type: "warning",
				text: "Allowed file size exceeded. (Max. 1024 KB)",
				title: "Image error"
			});
			$(this).val('');
			// $('form[data-toggle="validator"]').bootstrapValidator('updateStatus', 'csv_file', 'NOT_VALIDATED');
			return false;
		}

		else
			return true;
	}
});

function status(x) {
	if (x == 0) {
		return '<span class="badge badge-danger mr-1 mb-1 mt-1">Inactive</span>';
	} else {
		return '<span class="badge badge-success mr-1 mb-1 mt-1">Active</span>';
	}
}


function text_box_short(x, name, fields) {
    return '<input type="text" name="order[' + fields[0] + ']" value="' + x + '" class="form-control order form-control-que">';
}
$('body').on('click', '#re-order', function(e) {
    e.preventDefault();
    $('#form_action').val($(this).attr('data-action'));
    $('#action-form-submit').trigger('click');
});

function question_action(x){
	x = id_encrypt(x);
	var link = '';
    link += '<a href="' + site_url + 'admin/questions/edit/' + x + '" title="Edit Question" class="text-success action-icon" data-toggle="data-toggle/data-dismiss" data-target="#customModel"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';
    link += "<a href='javascript:void(0)' title='Delete Question' title='Delte Question' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original-title='Delete' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete Question?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/questions/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
    return link;
}

$(document).ready(function(){
    $("#startdate").datepicker({
        todayBtn:  1,
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var minDate = new Date(selected.date.valueOf());
        $('#enddate').datepicker('setStartDate', minDate);
    });

    $("#enddate").datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function (selected) {
        var maxDate = new Date(selected.date.valueOf());
        $('#startdate').datepicker('setEndDate', maxDate);
    });

});

function dateformat(x){
  let offset = moment().format('Z');
  var html = moment(x * 1000).utcOffset(offset).format("D MMM YYYY") + ' <small>' + moment(x * 1000).utcOffset(offset).format("hh:mm A") + '</small>';
  return html;
}

function app_action(x, name, fields) {
    x = id_encrypt(fields[0]);
    console.log(fields);
    var link = '';
    link += '<a href="' + site_url + 'admin/application/view/' + x +'" title="View" class="text-dark action-icon"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;<sup class="text-danger text-large">('+fields[5]+')</sub></a>&nbsp;&nbsp;';
    link += "<a href='javascript:void(0)' title='Delete Application' title='Delte Application' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original-title='Delete' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete Application?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/application/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
    return link;
}
 function  candidates_action(x, name, fields) {
 	x = id_encrypt(x);
 	console.log(fields);
 	var link = '';
 	link += "<a href='javascript:void(0)' title='Delete Candidate' title='Delte Candidate' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original-title='Delete' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete Candidate?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/candidates/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
 	return link;
 }

  $(document).on('click', '.copy', function() {
    var text = $(this).attr('data-link');
    var input = document.createElement('input');
    input.setAttribute('value', text);
    document.body.appendChild(input);
    input.select();
    var result = document.execCommand('copy');
    document.body.removeChild(input);
    $(this).attr('data-original-title', 'Copied');
    $(this).tooltip('show');
    $(this).attr('data-original-title', 'Copy to clipboard');
});


function role_action(x){
	x = id_encrypt(x);
    var link = ''; 
    link += '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" data-original-title="Copy to clipboard" title="" class="download copy" data-link="'+site_url+'home/'+x+'"><i class="fa fa-clone" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';
    link += '<a href="' + site_url + 'admin/job_role/edit/' + x + '" title="Edit Role" class="text-success action-icon" data-toggle="data-toggle/data-dismiss" data-target="#customModel"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';
    link += "<a href='javascript:void(0)' title='Delete Role' title='Delte Role' class='po action-icon waves-effect waves-light text-danger' data-html='true' data-placement='left' data-toggle='popover' data-original-title='Delete' data-trigger='focus' data-content=\"<p>Are you sure, you want to delete Role?</p><a class='btn btn-danger po-delete' href='" + site_url + "admin/job_role/delete/" + x + "'>Yes I'm sure</a>&nbsp;&nbsp;<a class='btn btn-light po-close'>No</a>\" ><i class='icon-trash'></i></a>&nbsp;&nbsp;";
    return link;
}