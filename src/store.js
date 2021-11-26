import Vue from 'vue';
import Vuex from 'vuex';
import VuexPersistence from 'vuex-persist';
const vuexLocal = new VuexPersistence({
    storage: window.localStorage,
})

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        employees: [],
    },

    getters: {
        getEmployees: (state) => state.employees
    },

    mutations: {
        ADD_EMPLOYEE: (state, employee) => {
            state.employees.push(employee)
        },
        REMOVE_EMPLOYEE: (state, index) => {
            state.employees.splice(index, 1)
        }
    },

    actions: {
        addEmployee: (context, employee) => { 
            context.state.employee = [];
            context.commit('ADD_EMPLOYEE', employee)
        },
        removeEmployee: (context, index) => { 
            context.commit('REMOVE_EMPLOYEE', index)
        }
    },
    plugins: [vuexLocal.plugin]
});