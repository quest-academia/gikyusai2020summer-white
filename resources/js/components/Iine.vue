<template>
	<div>
		<a href="/">TopPage</a>
		<br>
		<br>
		<router-link v-bind:to="{name: 'keijiban'}">
			<button class="btn btn-primary">掲示板へ行く</button>
		</router-link>
		<br><br>
		<button v-if="flag" v-on:click="changeFavorite">いいね済</button>
		<button v-else v-on:click="changeFavorite">いいね</button>
		<span>{{ number }}</span>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				flag: false,
				number: 3
			}
		},
		methods: {
			changeFavorite () {
				this.flag = !this.flag
				if (this.flag) {
					this.number += 1
				} else {
					this.number -= 1
				}
			}
		}
	}
</script>
