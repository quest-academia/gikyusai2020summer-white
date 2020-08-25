import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		searchKeyword: null,
		searchTime: null,
	},
	mutations: {
		inputKeyword (state, word) {
			state.searchKeyword = word;
		},
		inputTime (state, time) {
			state.searchTime = time;
		},
	}
});
