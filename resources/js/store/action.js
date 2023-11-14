export const actions = {
    setUserIdentifier ({commit}, data) {
        commit('setUserIdentifier', data)
    },
    setCommonSignUpData ({commit}, data){
        commit('setCommonSignUpData', data)
    },
    setUserData({commit}, data){
        commit('setUserData', data)
    }
}