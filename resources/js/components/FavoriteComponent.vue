<template>
	<div>
		<button v-if="flag" v-on:click="changeFavorite">いいね済</button>
		<button v-else v-on:click="changeFavorite">いいね</button>
	</div>
</template>

<script>
	export default {
		data () {
			return {
				flag: false
			}
		},
		methods: {
			changeFavorite () {
				this.flag = !this.flag
			}
		}
	}
</script>
