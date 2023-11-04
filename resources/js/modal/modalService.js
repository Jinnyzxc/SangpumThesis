import { Modal } from 'flowbite';
import { showCurrentModal } from './../config/login'
const options = {
    placement: 'bottom-right',
    backdrop: 'dynamic',
    backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
    closable: true,
    onHide: () => {
        console.log('modal is hidden');
    },
    onShow: () => {
        console.log('modal is shown');
    },
    onToggle: () => {
        console.log('modal has been toggled');
    }
  };

  const $targetEl = document.getElementById(showCurrentModal());

 export const modal = new Modal($targetEl, options);

