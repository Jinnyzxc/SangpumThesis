export const state = {
    userIdentifier: null,
    commonSignUpData :{}
}

export const mutations = {
    setUserIdentifier (state, data) {
        state.userIdentifier = data;
    },
    setCommonSignUpData (state, data) {
        state.commonSignUpData = data;
    }
}

export const getters = {

}

