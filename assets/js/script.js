$(function(){
	$('.modalTambah').on('click', function(){
		$('#modalLabel').html('Add New Sub Menu');
		$('.modal-footer button[type=submit]').html('Add');
			$('#title').val('');
			$('#menu_id').val('');
			$('#url').val(''),
			$('#icon').val(''),
			$('#is_active').val('');
			$('#id').val('');
	});


	$('.tampilUbah').on('click', function(){
		$('#modalLabel').html('Edit Sub Menu');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action','edit');

		const id= $(this).data('id');

		$.ajax({
			url: "editsubmenu",
			data:{
				id:id
			},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#title').val(data.title);
				$('#menu_id').val(data.menu_id);
				$('#url').val(data.url),
				$('#icon').val(data.icon),
				$('#is_active').val(data.is_active);
				$('#id').val(data.id);
			}
		});
	});

	// menu management

	$('.tambah').on('click', function(){
		$('#modalLabel').html('Add Menu');
		$('.modal-footer button[type=submit]').html('Add');
			$('#menu').val('');
	});


	$('.ubah').on('click', function(){
		$('#modalLabel').html('Edit Menu');
		$('.modal-footer button[type=submit]').html('Edit');
		$('.modal-body form').attr('action','menu/editmenu');

		const id= $(this).data('id');

		$.ajax({
			url: "menu/carimenu",
			data:{
				id:id
			},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#menu').val(data.menu);
				$('#id').val(data.id);
			}
		});
	});



	$('.ubahrole').on('click', function(){
		$('#modalLabel').html('Change Role');
		$('.modal-footer button[type=submit]').html('Save');
		$('.modal-body form').attr('action','user/editrole');

		$.ajax({
			url: "crole",
			data:{
				id:id
			},
			method: 'post',
			dataType: 'json',
			success: function(data){
				$('#name').val(data.name);
				$('#role').val(data.role_id);
			}
		});

	});



});