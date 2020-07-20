	<h3>掲示板に投稿する</h3>	
	<form method="post" action="{{ route('post.store') }}"
		<label for="name">ニックネーム</label>
		<input
			id="name"
			name="name"
			type="text"
		>
		<br><br>
		<label for="comment">コメント</label>
		<textarea
			id="comment"
			name="comment"
			type="text"
		></textarea>
		<?php echo csrf_field(); ?>
		<button type="submit">コメントを送付</button>
	</form>
