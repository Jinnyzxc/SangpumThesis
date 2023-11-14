export const isUserLoggedIn = () => localStorage.getItem('APP_DEMO_USER_TOKEN') ? true : false;
export const getUserType = () => localStorage.getItem('userIdentity');
export const commonSignupData = () => localStorage.getItem('commonSignupData');
export const showCurrentModal = () => localStorage.getItem('modal');