export const state = {
    userIdentifier: null,
    commonSignUpData :{},
    userDataInfo: {}
}

export const mutations = {
    setUserIdentifier (state, data) {
        state.userIdentifier = data;
    },
    setCommonSignUpData (state, data) {
        state.commonSignUpData = data;
    },
    setUserData(state, data){
        state.userDataInfo = data;
    }
}

export const getters = {

}

