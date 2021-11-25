import Vue from 'vue';
import Vuex from 'vuex';

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
            context.commit('ADD_EMPLOYEE', employee)
        },
        removeEmployee: (context, index) => { 
            context.commit('REMOVE_EMPLOYEE', index)
        }
    }
});