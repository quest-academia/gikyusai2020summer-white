<template>
	<div>
		<br><br>
		<h3>掲示板に投稿する</h3>	
		<label for="name">ニックネーム</label>
		<input
			id="name"
			type="text"
			v-model="name"
		>
		<br><br>
		<label for="comment">コメント</label>
		<textarea
			id="comment"
			v-model="comment"
		></textarea>
		<button v-on:click="createComment">ボタン</button>
		<br><br>
		<h2>掲示板</h2>
		<div v-for="post in posts" v-bind:key="post.name">
			<div>名前：{{ post.name }}</div>
			<div>コメント：{{ post.comment }}</div>
			<br>
		</div>
	</div>
</template>

<script>
	import axios from "axios";
	export default {
		data () {
			return {
				name: "",
				comment: "",
				posts: []
			}
		},
		created () {
			axios
				.get(
					'/index'
				)
				.then(response => {
					this.posts = response.data.posts
					console.log(response.data.posts);
				})
				.catch(error => {
					console.log(error);
				});	
		},
		methods: {
			createComment() {
				axios
					.post(
						'/store',
						{
							name: this.name,
							comment: this.comment
						}
					)
					.then(response => {
						console.log(response);
					})
					.catch(error => {
						console.log(error);
					});	
				this.name = "";
				this.comment = "";
			}
		}
	}
</script>
