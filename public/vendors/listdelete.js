function actionDelete(event) {
	event.preventDefault();
	let urlRequest = $(this).data('url');
	let that = $(this);
		Swal.fire({
	  	title: 'Bạn muốn xoá ?',
	  	text: "Dữ liệu sẽ được xoá và không thể lấy lại !",
	  	icon: 'warning',
	  	showCancelButton: true,
	  	confirmButtonColor: '#3085d6',
	  	cancelButtonColor: '#d33',
	  	confirmButtonText: 'Yes, delete it!'
	}).then((result) => {
	  	if (result.isConfirmed) {
	  		$.ajax({
	  			type: 'GET',
	  			url: urlRequest,
	  			success: function(data) {
	  				if(data.code == 200) {
	  					that.parent().parent().remove();
	  					Swal.fire(
			      		'Deleted!',
			      		'Your file has been deleted.',
			      		'success'
	    				)
	  				}
	  			},
	  			error: function() {

	  			}
	  		})
	    	
	  	}
	})
}


$(function () {
	$(document).on('click', '.action_delete', actionDelete);
})