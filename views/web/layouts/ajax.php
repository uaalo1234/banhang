<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script>
function add_to_cart(id,productId,quantity,size) {
		$.ajax( {
			method : 'POST',
			url: '<?php echo url('cart/add_to_cart') ?>',
			data: {id, productId, quantity, size},
			success: function() {
				alert('thêm thành công')
				// location.reload()
			},
			error: function() {
			}       
		})
		return false;
}

   function add_to_wishlist(id,productId,userId) {

		$.ajax( {
			method : 'POST',
			url: '<?php echo url('wishlist/add_to_wishlist') ?>',
			data: {id, productId, userId},
			success: function() {
				// alert('Đã thêm vào danh sách yêu thích của bạn !!!')
				Swal.fire({
				position: 'top-end',
				icon: 'success',
				title: 'Đã thêm vào danh sách yêu thích',
				showConfirmButton: false,
				timer: 1500
				})
				// location.reload()
			},
			error: function() {
			}       
		})
		return false;
}
</script>
