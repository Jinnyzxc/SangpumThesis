import Vuex from 'vuex'
import { state, mutations, getters } from './mutation'
import {actions} from  './action'


export const vuex = new Vuex.Store({
    state,
    mutations, 
    getters,
    actions
})



