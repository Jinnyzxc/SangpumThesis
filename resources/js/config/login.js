export const isUserLoggedIn = () => localStorage.getItem('APP_DEMO_USER_TOKEN')
export const getUserType = () => localStorage.getItem('userIdentity');