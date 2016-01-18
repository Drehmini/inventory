
// Jquery
$(document).ready(function() {
// modal namespace
  var modal = {};

  $(document).on("click", "a[data-bb]", function(e) {
    e.preventDefault();
    var type = $(this).data("bb");

    if (typeof modal[type] === "function") {
      modal[type]();
    }
  });

  modal.check_in = function() {
    bootbox.alert("Test");
  };

  modal.check_out = function() {
    bootbox.alert("Tester");
  };

  modal.add = function() {
    bootbox.alert("Add button");
  };
// end modal namespace
// datatable js

  $('#current_inventory').dataTable( {
    "paging": false,
    "ordering": false,
    "info": false
  });

  $('#overdue_equipment').dataTable( {
    "paging": false,
    "ordering": false,
    "info": false
  });

  $('#transaction_history').dataTable( {
    "paging": false,
    "ordering": false,
    "info": false
  });

  $("#people").dataTable( {
    "paging": false,
    "ordering": false,
    "info": false
  });
// end datatable js
});
