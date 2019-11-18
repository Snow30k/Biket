const base_url = 'https://myproject30k.tech/';

// fungsi membuka CkFinder dan mengembalikan url ke sebuah edit
function selectFileWithCKFinder(outputto) {
	CKFinder.popup({
		chooseFiles: true,
		width: 800,
		height: 600,
		onInit: function (finder) {
			finder.on('files:choose', (evt) => {
				const file = evt.data.files.first();
				$(outputto).val(file.getUrl());
			});

			finder.on('file:choose:resizedImage', (evt) => {
				$(outputto).val(evt.data.resizedUrl);
			});
		}
	});
}

$(document).ready(() => {
	const msg = $('#msg').data('msg');
	const type = $('#msg').data('type');
	if (msg) {
		Swal.fire({
			type: type,
			title: type,
			text: msg,
			showConfirmButton: true,
			timer: 3000
		})
	}

	if($('.showmodal-add').data('addmodal') === true){
		$('#add-modal').modal('toggle');
	}

	// SweetAlert Pada Saat Menghapus
	$('.info-delete').on('click', (e) => {
		const href = $(e.currentTarget).attr('href');
		e.preventDefault();
		Swal.fire({
			title: 'Apakan anda yakin menghapus data ini ?',
			text: "data yang dihapus tidak akan dapat di kembalikan!!!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus Data!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.value) {
				window.location.href = href;
			}
		})
	})

	//Faq Edit Click lisner
	$('.faq-edit').on('click', (e) => {
		e.preventDefault();
		const id = $(e.currentTarget).data('id');
		$.ajax({
			url: base_url + 'info/admin/faq/getfaqbyid/' + id,
			type: 'GET',
			dataType: 'JSON',
			success: (response) => {
				$('#update_pertanyaan').val(response['pertanyaan']);
				$('#update_jawaban').val(response['jawaban']);
				$('#frm-update-faq').attr('action', base_url + 'info/admin/faq/update/' + id)
				$('#updateFAQ').modal('toggle')
			},
			error: (jqXHR, exception) => {
				Swal.fire({
					type: 'error',
					title: 'Oops...',
					text: 'Telah Terjadi Kesalahan!!!',
				})
			},
		});
	});

	$('.add-url-coursel').on('click', () => {
		selectFileWithCKFinder('#link-add');
	})
	
	$('.edit-url-coursel').on('click', () => {
		selectFileWithCKFinder('#link');
	})
});
