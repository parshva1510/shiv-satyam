"use strict";
var KTCustomersList = function() {
    var t, e, o = () => {
            e.querySelectorAll('[data-kt-customer-table-filter="delete_row"]').forEach((e => {
                e.addEventListener("click", (function(e) {
                    e.preventDefault();
                    const o = e.target.closest("tr"),
                        n = o.querySelectorAll("td")[1].innerText;
                    Swal.fire({
                        text: "Are you sure you want to delete " + n + "?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then((function(e) {
                        e.value ? Swal.fire({
                            text: "You have deleted " + n + "!.",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        }).then((function() {
                            t.row($(o)).remove().draw()
                        })) : "cancel" === e.dismiss && Swal.fire({
                            text: n + " was not deleted.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        })
                    }))
                }))
            }))
        },
        n = () => {
            const o = e.querySelectorAll('[type="checkbox"]'),
                n = document.querySelector('[data-kt-customer-table-select="delete_selected"]');
            o.forEach((t => {
                t.addEventListener("click", (function() {
                    setTimeout((function() {
                        c()
                    }), 50)
                }))
            })), n.addEventListener("click", (function() {
                Swal.fire({
                    text: "Are you sure you want to delete selected customers?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function(n) {
                    n.value ? Swal.fire({
                        text: "You have deleted all selected customers!.",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    }).then((function() {
                        o.forEach((e => {
                            e.checked && t.row($(e.closest("tbody tr"))).remove().draw()
                        }));
                        e.querySelectorAll('[type="checkbox"]')[0].checked = !1
                    })) : "cancel" === n.dismiss && Swal.fire({
                        text: "Selected customers was not deleted.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }))
            }))
        };
    const c = () => {
        const t = document.querySelector('[data-kt-customer-table-toolbar="base"]'),
            o = document.querySelector('[data-kt-customer-table-toolbar="selected"]'),
            n = document.querySelector('[data-kt-customer-table-select="selected_count"]'),
            c = e.querySelectorAll('tbody [type="checkbox"]');
        let r = !1,
            l = 0;
        c.forEach((t => {
            t.checked && (r = !0, l++)
        })), r ? (n.innerHTML = l, t.classList.add("d-none"), o.classList.remove("d-none")) : (t.classList.remove("d-none"), o.classList.add("d-none"))
    };
    return {
        init: function() {
            (e = document.querySelector("#kt_customers_table")) && (e.querySelectorAll("tbody tr").forEach((t => {
                const e = t.querySelectorAll("td"),
                    o = moment(e[5].innerHTML, "DD MMM YYYY, LT").format();
                e[5].setAttribute("data-order", o)
            })), (t = $(e).DataTable({
                info: !1,
                order: [],
                columnDefs: [{
                    orderable: !1,
                    targets: 0
                }, {
                    orderable: !1,
                    targets: 6
                }]
            })).on("draw", (function() {
                n(), o(), c()
            })), n(), document.querySelector('[data-kt-customer-table-filter="search"]').addEventListener("keyup", (function(e) {
                t.search(e.target.value).draw()
            })), o(), (() => {
                const e = document.querySelector('[data-kt-ecommerce-order-filter="status"]');
                $(e).on("change", (e => {
                    let o = e.target.value;
                    "all" === o && (o = ""), t.column(3).search(o).draw()
                }))
            })())
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTCustomersList.init()
}));



// Class definition
var KTDatatablesExample = function () {
    // Shared variables
    var table;
    var datatable;

    // Private functions
    var initDatatable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            const dateRow = row.querySelectorAll('td');
            const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT").format(); // select date from 4th column in table
            dateRow[3].setAttribute('data-order', realDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            'pageLength': 10,
        });
    }

    // Hook export buttons
    var exportButtons = () => {
        const documentTitle = 'Customer Orders Report';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [
                {
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('#kt_customers_table_buttons'));

        // Hook dropdown menu click event to datatable export buttons
        const exportButtons = document.querySelectorAll('#kt_customers_table_export_menu [data-kt-export]');
        exportButtons.forEach(exportButton => {
            exportButton.addEventListener('click', e => {
                e.preventDefault();

                // Get clicked export value
                const exportValue = e.target.getAttribute('data-kt-export');
                const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

                // Trigger click event on hidden datatable export buttons
                target.click();
            });
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Public methods
    return {
        init: function () {
            table = document.querySelector('#kt_customers_table');

            if ( !table ) {
                return;
            }

            initDatatable();
            exportButtons();
            handleSearchDatatable();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesExample.init();
});