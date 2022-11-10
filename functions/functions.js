

function processLoginAjaxPostRequest(url, dataRequest) {
    console.log(dataRequest);
    setLoader();
    $.post(url,   // url
        dataRequest,//{ myData: 'This is my data.' }, // data to be submit
        function (data, status, jqXHR) {// success callback
            //$('#ajax_result').value = ('status: ' + status + ', data: ' + data + '<br>');
            var dataParsed = JSON.parse(data);
            console.log(data);
            console.log(dataParsed);
            //removeLoader();

            if (dataParsed[0].error == null) {
                swal("Welcome " + dataParsed[0].first_name + " " + dataParsed[0].last_name, {
                    title: "Success",
                    icon: "success"
                })

                    .then((value) => {
                        if (value) {
                            //swal(`The returned value is: ${value}`);
                            window.location = 'dashboard';
                        } else {
                            //swal(`The returned value is: ${value}`);
                            window.location = 'dashboard';
                        }
                    });

            } else {
                swal({
                    //title: "New Course",
                    title: "Error",
                    icon: "error",
                    text: "Error: " + dataParsed[0].error
                    //button: "Got It!",
                });

            }

        })
}


function removeLoader() {
    // $(".loader").animate({ opacity: '0.2' });
    // setTimeout(() => {
    //     $('.loader').removeAttr('style');
    // }, 500);

    //$(".preloader").animate({ opacity: '0.2' }, 1500);
    $('.preloader').fadeOut(500, 'linear')
    //$('.preloader').attr('style', 'display:none');


    // setTimeout(() => {
    //     //console.log('setting up timeout');
    //     //$('.preloader').removeAttr('style');
    //     //$('.preloader').attr('style', 'display:none');

    // }, 500);

}

function setLoader() {
    // // $('.loader').attr('style', 'display:block');
    // // setTimeout(() => {
    // $('.loader').show();
    // $(".loader").animate({ opacity: '1' });
    // // }, 1000);


    // $('.loader').attr('style', 'display:block');
    // setTimeout(() => {
    $('.preloader').show();
    $(".preloader").animate({ opacity: '1' });


    // }, 1000);

}

function getInputValuesAndReturnTheirContentAsJson(elementIdsParsed) {
    jsonArray = [];
    for (var i = 0; i < elementIdsParsed.length; i++) {
        var htmlInput = document.getElementById(elementIdsParsed[i]);
        //console.log(elementIdsParsed);
        //console.log(htmlInput.value);
        // $("input[type='checkbox']").val();
        //console.log(htmlInput.type);
        //console.log($(htmlInput).is(":checked"));


        let jsonVar = {
            name: elementIdsParsed[i],
            value: $(htmlInput).val(),
            checked: $(htmlInput).is(":checked")
        }
        jsonArray.push(jsonVar);
    }
    //console.log(JSON.stringify(jsonArray, 't', 3));
    //return JSON.stringify(jsonArray, 't', 3);
    // console.log(jsonArray);
    return jsonArray;
}

function toggleShowPassword(passwordInputId, eyeElementId) {
    var passwordInput = document.getElementById(passwordInputId);
    var eyeElement = document.getElementById(eyeElementId);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        $(eyeElement).removeClass("la-eye-slash");
        $(eyeElement).addClass("la-eye");
    } else {
        passwordInput.type = "password";
        $(eyeElement).removeClass("la-eye");
        $(eyeElement).addClass("la-eye-slash");

    }
}

function toggleButtonDisabled(buttonId) {
    buttonId = document.getElementById(buttonId);
    //console.log($(buttonId).prop('disabled'));
    if ($(buttonId).prop('disabled')) {
        $(buttonId).prop({
            disabled: false
        });
    } else {
        $(buttonId).prop({
            disabled: true
        })
    }
}

function logout() {
    swal({
        title: "Ready to leave?",
        text: "Logout!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("Successfully logged out.", {
                    icon: "success",
                });
                window.location = 'functions/logout.php';
            } else {
                //swal("Great Choice!");
            }
        });
}

function createNewStudent(url, dataRequest) {
    getConfirmation('Are you sure?', 'Once sent, it cannot be edited until assessed by the school.', linkIfYes)
    console.log(dataRequest);
    setLoader();
    $.post(url,   // url
        dataRequest,//{ myData: 'This is my data.' }, // data to be submit
        function (data, status, jqXHR) {// success callback
            //$('#ajax_result').value = ('status: ' + status + ', data: ' + data + '<br>');
            var dataParsed = JSON.parse(data);
            console.log(dataParsed);
            removeLoader();

            if (dataParsed[0].error == null) {
                swal("Welcome! You can now login", {
                    title: "Success",
                    icon: "success",
                    button: "Got It!",
                }).then((value) => {
                    if (value) {
                        //swal(`The returned value is: ${value}`);
                        window.location = 'index#login_section';
                    } else {
                        //swal(`The returned value is: ${value}`);
                        window.location = 'index#login_section';
                    }
                });

            } else {
                swal({
                    //title: "New Course",
                    title: "Error",
                    icon: "error",
                    text: "Error: " + dataParsed[0].error
                    //button: "Got It!",
                });

            }

        })
}

function sendNewFiles(url, dataRequest) {
    // if (getSimpleConfirmation('Are you sure?', 'Once sent, it cannot be edited until assessed by the school.') == true) {
    console.log(dataRequest);
    setLoader();
    $.post(url,   // url
        dataRequest,//{ myData: 'This is my data.' }, // data to be submit
        function (data, status, jqXHR) {// success callback
            //$('#ajax_result').value = ('status: ' + status + ', data: ' + data + '<br>');
            var dataParsed = JSON.parse(data);
            console.log(dataParsed);
            removeLoader();

            if (dataParsed[0].error == null) {
                swal(dataParsed[0].success, {
                    title: "Success",
                    icon: "success",
                    button: "Got It!",
                }).then((value) => {
                    if (value) {
                        window.location = 'index';
                    } else {
                        //swal(`The returned value is: ${value}`);
                        window.location = 'index';
                    }
                });

            } else {
                swal({
                    //title: "New Course",
                    title: "Error",
                    icon: "error",
                    text: "Error: " + dataParsed[0].error
                    //button: "Got It!",
                });

            }

        })
    //  }
}

function checkIfAllFormFieldsFilled(buttonId, formValues, extraBooleanValue = null, extraBooleanIndex = null) {
    //var formValues = getInputValuesAndReturnTheirContentAsJson(['first_name', 'last_name', 'user_email', 'password1', 'password2', 'agree']);
    buttonId = document.getElementById(buttonId);

    for (var i = 0; i < formValues.length; i++) {
        //console.log(formValues[i].value);
        //console.log(formValues);

        //console.log(formValues[extraBooleanIndex][extraBooleanValue]);
        if (extraBooleanValue && extraBooleanIndex) {
            if (formValues[i].value == "" || formValues[extraBooleanIndex][extraBooleanValue] == false) {
                $(buttonId).prop({
                    disabled: true
                });
                return false;
            }
            if (formValues[i].name == 'calculator-plans' && (formValues[i].value == 'Invalid' || formValues[i].value == 'Select Plan')) {
                $(buttonId).prop({
                    disabled: true
                });
                return false;
            }


        } else {
            if (formValues[i].value == "") {
                $(buttonId).prop({
                    disabled: true
                });
                return false;
            }
        }
        $(buttonId).prop({
            disabled: false
        });

    }

}

function toggleElementVisibility(elementName, isItById) {
    if (isItById) {
        elementName = document.getElementById(elementName);
    } else {
        elementName = document.getElementsByClassName(elementName);
    }

    if ($(elementName).hasClass('active')) {
        $(elementName).removeClass('active');
    } else {
        $(elementName).addClass('active');
    }
}
//console.log('inside the custom function');

function scrollToElement(element) {
    //var container = $('#dashboardPage');
    element = document.getElementById(element);
    element.scrollIntoView();
}

function showSweetAlert(alert) {
    switch (alert) {
        case 'paid-request':
            swal({
                title: "Are you sure?",
                text: "You have paid into the company account. You can only send this message once.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Paid request sent! Your investment will be activated shortly.", {
                            icon: "success",
                        });
                    } else {
                        //swal("Your imaginary file is safe!");
                    }
                });
            break;

        case 'message-sent':
            $('#contact_name').val('');
            $('#contact_email').val('');
            $('#contact_message').val('');
            swal("Message Sent succesfully", {
                icon: "success",
            });

            break;
    }
}

function copyToClipboard(elementId) {
    /* Get the text field */
    var copyText = document.getElementById(elementId);

    /* Select the text field */
    // copyText.select();
    // copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.innerText);

    /* Alert the copied text */
    swal(copyText.innerText + "\n" + "Copied to clipboard", {
        title: "Success",
        icon: "success",
        button: "Got It"
    })
    //alert("Copied:" + copyText.innerText);
    // alert("Copied:" + copyText.value);
}

function maxValue(inputElementId, max) {
    inputElement = document.getElementById(inputElementId);
    if (inputElement.value > max) {
        inputElement.value = max;
    }
    //console.log(max);
}

function getConfirmation(messageTitle, messageDescription, linkIfYes) {
    swal({
        title: messageTitle,
        text: messageDescription,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                swal("Successfully Deactivated.", {
                    icon: "success",
                });
                window.location = linkIfYes;
            } else {
                //swal("Great Choice!");
            }
        });
}

function getSimpleConfirmation(messageTitle, messageDescription) {
    reply = false;
    swal({
        title: messageTitle,
        text: messageDescription,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                reply = true;
            } else {

                //swal("Great Choice!");
            }
        });
    return reply;
}












































































// var myFilterBox = addFilterBox({
//     target: {
//         selector: '.course_head',
//         items: '.courses1 .courses2 .courses3',
//         sources: [
//             '.course_name',
//             '.course_name .course_code'
//         ]
//     },
//     addTo: {
//         selector: '.course_head',
//         position: 'before'
//     },
//     input: {
//         label: 'Search: ',
//         attrs: {
//             class: 'form-control',
//             placeholder: '*CEE121 **COMPUTER ENGINEERING'
//         }
//     },
//     // wrapper: {
//     //     tag: 'div',
//     //     attrs: {
//     //         class: 'filterbox-wrap'
//     //     }
//     // },
//     displays: {
//         counter: {
//             tag: 'span',
//             attrs: {
//                 class: 'counter'
//             },
//             addTo: {
//                 selector: '.filterbox-wrap',
//                 position: 'append'
//             },
//             text: function () {
//                 return '<strong>' + this.countVisible() + '</strong>/' + this.countTotal();
//             }
//         },
//         noresults: {
//             tag: 'div',
//             addTo: {
//                 selector: '.course_head',
//                 position: 'after'
//             },
//             attrs: {
//                 class: 'no-results'
//             },
//             text: function () {
//                 return !this.countVisible() ? 'No matching course code or title for "' + this.getFilter() + '".' : '';
//             }
//         }
//     },
//     callbacks: {
//         onReady: onFilterBoxReady,
//         afterFilter: function () {
//             this.toggleHide(this.getTarget(), this.isAllItemsHidden());
//         },
//         onEnter: function () {
//             var $firstItem = this.getFirstVisibleItem();

//             if ($firstItem) {
//                 alert('First visible item: ' + $firstItem.querySelector('td').textContent + '\n(onEnter callback)');
//             }
//         }
//     },
//     highlight: {
//         style: 'background: #FFD662',
//         minChar: 1
//     },
//     filterAttr: 'data-filter',
//     suffix: '-mysuffix',
//     debuglevel: 2,
//     inputDelay: 100,
//     zebra: true,
//     enableObserver: true,
//     initTableColumns: true,
//     useDomFilter: false
// });

// var myFilterBox2 = addFilterBox({
//     target: {
//         selector: '.course_head2',
//         items: '.courses1 .courses2 .courses3',
//         sources: [
//             '.course_name',
//             '.course_name .course_code'
//         ]
//     },
//     addTo: {
//         selector: '.course_head2',
//         position: 'before'
//     },
//     input: {
//         label: 'Search: ',
//         attrs: {
//             class: 'form-control',
//             placeholder: '*CEE121 **COMPUTER ENGINEERING'
//         }
//     },
//     // wrapper: {
//     //     tag: 'div',
//     //     attrs: {
//     //         class: 'filterbox-wrap'
//     //     }
//     // },
//     displays: {
//         counter: {
//             tag: 'span',
//             attrs: {
//                 class: 'counter'
//             },
//             addTo: {
//                 selector: '.filterbox-wrap',
//                 position: 'append'
//             },
//             text: function () {
//                 return '<strong>' + this.countVisible() + '</strong>/' + this.countTotal();
//             }
//         },
//         noresults: {
//             tag: 'div',
//             addTo: {
//                 selector: '.course_head',
//                 position: 'after'
//             },
//             attrs: {
//                 class: 'no-results'
//             },
//             text: function () {
//                 return !this.countVisible() ? 'No matching course code or title for "' + this.getFilter() + '".' : '';
//             }
//         }
//     },
//     callbacks: {
//         onReady: onFilterBoxReady,
//         afterFilter: function () {
//             this.toggleHide(this.getTarget(), this.isAllItemsHidden());
//         },
//         onEnter: function () {
//             var $firstItem = this.getFirstVisibleItem();

//             if ($firstItem) {
//                 alert('First visible item: ' + $firstItem.querySelector('td').textContent + '\n(onEnter callback)');
//             }
//         }
//     },
//     highlight: {
//         style: 'background: #FFD662',
//         minChar: 1
//     },
//     filterAttr: 'data-filter',
//     suffix: '-mysuffix',
//     debuglevel: 2,
//     inputDelay: 100,
//     zebra: true,
//     enableObserver: true,
//     initTableColumns: true,
//     useDomFilter: false
// });

// function onFilterBoxReady() {
//     this.fixTableColumns(this.getTarget());
//     // this.filter('bra');
//     this.focus(true);
// }

// function dollarFormat(number) {
//     //window.alert('This naira format function is working');
//     console.log('inside dollarFormat function');
//     document.write('$');
//     document.write(number.toLocaleString(undefined, { maximumFractionDigits: 0 }));
//     //return ''.formater.format(number);
// }

// function dollarFormatReturn(number) {
//     //window.alert('This naira format function is working');
//     console.log('inside dollarFormatR function');
//     //window.alert('this should be working');
//     amount = number.toLocaleString(undefined, { maximumFractionDigits: 0 });
//     return (amount);
// }
