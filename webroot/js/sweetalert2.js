/*!
 * sweetalert2 v11.17.2
 * Released under the MIT License.
 */
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
    typeof define === 'function' && define.amd ? define(factory) :
    (global.Swal = factory());
}(this, (function () { 'use strict';

var styles = "/* Add your CSS styles here */"; // You can keep the original styles or modify them as needed

var defaultParams = {
    title: '',
    text: '',
    html: '',
    footer: '',
    icon: null,
    toast: false,
    target: 'body',
    backdrop: true,
    animation: true,
    allowOutsideClick: true,
    allowEscapeKey: true,
    allowEnterKey: true,
    showConfirmButton: true,
    showCancelButton: false,
    preConfirm: null,
    confirmButtonText: 'OK',
    cancelButtonText: 'Cancel',
    buttonsStyling: true,
    reverseButtons: false,
    focusConfirm: true,
    focusCancel: false,
    showCloseButton: false,
    closeButtonAriaLabel: 'Close this dialog',
    showLoaderOnConfirm: false,
    imageUrl: null,
    imageWidth: null,
    imageHeight: null,
    imageAlt: '',
    timer: null,
    width: null,
    padding: null,
    background: null,
    input: null,
    inputPlaceholder: '',
    inputValue: '',
    inputOptions: {},
    inputAutoTrim: true,
    inputAttributes: {},
    inputValidator: null,
    grow: false,
    position: 'center',
    progressSteps: [],
    currentProgressStep: null,
    onBeforeOpen: null,
    onOpen: null,
    onClose: null,
};

var swalClasses = {
    container: 'swal2-container',
    popup: 'swal2-popup',
    title: 'swal2-title',
    content: 'swal2-content',
    actions: 'swal2-actions',
    confirm: 'swal2-confirm',
    cancel: 'swal2-cancel',
    close: 'swal2-close',
    icon: 'swal2-icon',
    image: 'swal2-image',
    input: 'swal2-input',
    textarea: 'swal2-textarea',
    file: 'swal2-file',
    select: 'swal2-select',
    radio: 'swal2-radio',
    checkbox: 'swal2-checkbox',
    validationerror: 'swal2-validationerror',
    progresssteps: 'swal2-progresssteps',
    progresscircle: 'swal2-progresscircle',
    progressline: 'swal2-progressline',
    loading: 'swal2-loading',
    styled: 'swal2-styled',
    shown: 'swal2-shown',
    hide: 'swal2-hide',
    fade: 'swal2-fade',
};

var swal = function swal() {
    var params = Object.assign({}, defaultParams);
    // Handle parameters and show warnings if necessary
    // ...

    // Create and show the popup
    var container = document.createElement('div');
    container.className = swalClasses.container;
    container.innerHTML = `
        <div class="${swalClasses.popup}" tabindex="-1">
            <div class="${swalClasses.title}">${params.title}</div>
            <div class="${swalClasses.content}">${params.html || params.text}</div>
            <div class="${swalClasses.actions}">
                ${params.showCancelButton ? `<button class="${swalClasses.cancel}">${params.cancelButtonText}</button>` : ''}
                <button class="${swalClasses.confirm}">${params.confirmButtonText}</button>
            </div>
        </div>
    `;
    document.body.appendChild(container);

    // Add event listeners for buttons
    container.querySelector(`.${swalClasses.confirm}`).onclick = function () {
        // Handle confirm button click
        // ...
    };

    if (params.showCancelButton) {
        container.querySelector(`.${swalClasses.cancel}`).onclick = function () {
            // Handle cancel button click
            // ...
        };
    }

    // Show the popup with animation
    if (params.animation) {
        container.classList.add('show');
    }

    return new Promise(function (resolve, reject) {
        // Handle promise resolution and rejection
        // ...
    });
};

// Expose the swal function
return swal;

})));
if (typeof window !== 'undefined' && window.Swal) window.swal = window.Swal;