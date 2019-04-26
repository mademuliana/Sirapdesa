window.addEventListener('load', function () {
    var selector = '.mdl-stepper#demo-stepper-step-editable';
    // Select stepper container element
    var stepperElement = document.querySelector(selector);
    var Stepper;
    var steps;

    // The component instance is not upgraded and so not defined.
    // console.log(typeof stepperElement.MaterialStepper); // undefined

    // Upgrades all registered components found in the current DOM.
    // This is automatically called on window load.
    componentHandler.upgradeAllRegistered();

    // At this point, component handler already upgraded
    // the Stepper component and assigned the instance for
    // control over API.
    // console.log(typeof stepperElement.MaterialStepper); // object

    if (!stepperElement) return;

    // Get the MaterialStepper instance of element to control it.
    Stepper = stepperElement.MaterialStepper;

    if (!Stepper) {
        console.error('MaterialStepper instance is not available for selector: ' + selector + '.');
        return;
    }

    var page = 0;

    steps = stepperElement.querySelectorAll('.mdl-step');
    for (var i = 0; i < steps.length; i++) {
        // When user clicks on [data-stepper-next] button of step.
        steps[i].addEventListener('onstepnext', function (e) {
            console.log(e);
            var boleh = true;

            if(document.getElementById('form-tambah-semua')!=null) {
                if (page == 0) {
                    if (
                        document.getElementById('nama-pemilik').value == "" ||
                        document.getElementById('nomor-identitas-pemilik').value == "" ||
                        document.getElementById('nomor-kohir-pemilik').value == ""
                    ) boleh = false;
                } else if (page == 1) {
                    if (
                        document.getElementById('provinsi-tanah').value == "" ||
                        document.getElementById('kabupaten-tanah').value == "" ||
                        document.getElementById('kelurahan-tanah').value == "" ||
                        document.getElementById('desa-tanah').value == "" ||
                        document.getElementById('rt-tanah').value == "" ||
                        document.getElementById('rw-tanah').value == ""
                    ) boleh = false;
                } else if (page == 2) {
                    if (
                        document.getElementById('nomor-persil-tanah').value == "" ||
                        document.getElementById('luas-tanah').value == "" ||
                        document.getElementById('kelas-desa-tanah').value == "" ||
                        document.getElementById('nomor-ipeda-tanah').value == ""
                    ) boleh = false;
                }
            }
            else if(document.getElementById('form-tambah-tanah')!=null) {
                if (page == 0) {
                    if (
                        document.getElementById('provinsi-tanah').value == "" ||
                        document.getElementById('kabupaten-tanah').value == "" ||
                        document.getElementById('kelurahan-tanah').value == "" ||
                        document.getElementById('desa-tanah').value == "" ||
                        document.getElementById('rt-tanah').value == "" ||
                        document.getElementById('rw-tanah').value == ""
                    ) boleh = false;
                } else if (page == 1) {
                    if (
                        document.getElementById('nomor-persil-tanah').value == "" ||
                        document.getElementById('luas-tanah').value == "" ||
                        document.getElementById('kelas-desa-tanah').value == "" ||
                        document.getElementById('nomor-ipeda-tanah').value == ""
                    ) boleh = false;
                }
            }

            if(boleh){
                Stepper.next();
                page++;
            } else{
                alert('Data tidak boleh kosong !');
            }

            e.preventDefault();
        });


        steps[i].addEventListener('onstepskip', function (e) {
            Stepper.skip();
        });

        // When user clicks on [data-stepper-next] button of step.
        steps[i].addEventListener('onstepback', function (e) {
            // {element}.MaterialStepper.next() change the state of current step to "completed"
            // and move one step forward.
            Stepper.back();
        });
    }
})
//alert dialog
(function() {
    'use strict';
    var dialogButton = document.querySelector('.dialog-button');
    var dialog = document.querySelector('#dialog');
    if (! dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function() {
        dialog.showModal();
    });
    dialog.querySelector('button:not([disabled])')
        .addEventListener('click', function() {
            dialog.close();
        });
}());