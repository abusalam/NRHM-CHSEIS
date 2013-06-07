<?php

use LibDB as FN;

require_once('functions.php');
FN\session_auth();
FN\HtmlHeader("Data Entry");
FN\IncludeCSS();
FN\jQueryInclude();
?>
<script type="text/javascript">
  var current_id = 1;
  var OrgRow;
  function bindAdder(EnrMale, EnrFem, EnrTotal) {
    $(EnrMale).blur(function() {
      $(EnrTotal).text(Number(this.value) + Number($(EnrFem).val()));
    });
    $(EnrFem).blur(function() {
      $(EnrTotal).text(Number(this.value) + Number($(EnrMale).val()));
    });

  }
  function AddDatePicker(DatePicker, SchWeekDay) {
    $(DatePicker)
            .removeClass('hasDatepicker')
            .removeData('datepicker')
            .unbind()
            .datepicker({
      minDate: "1D",
      maxDate: "2M",
      dateFormat: 'dd/mm/yy',
      showOtherMonths: true,
      selectOtherMonths: true,
      showButtonPanel: true,
      changeMonth: true,
      changeYear: true,
      showAnim: "slideDown",
      altField: SchWeekDay,
      altFormat: "DD"
    });

  }
  $(function() {
    OrgRow = $("#Row").clone();
    bindAdder("#EnrMale", "#EnrFem", "#EnrTotal");
    AddDatePicker("#VisitDate", "#SchWeekDay");
    $("#AddRow")
            .click(
            function() {
              var NewRow = OrgRow.clone();
              NewRow.attr("id", "Row" + current_id);
              NewRow.find("#SlNo")
                      .attr("id", "SlNo" + current_id)
                      .val(Number(current_id + 1));
              NewRow.find("#EnrMale").attr("id", "EnrMale" + current_id);
              NewRow.find("#EnrFem").attr("id", "EnrFem" + current_id);
              NewRow.find("#EnrTotal").attr("id", "EnrTotal" + current_id);
              NewRow.find("#VisitDate").attr("id", "VisitDate" + current_id);
              NewRow.find("#SchWeekDay").attr("id", "SchWeekDay" + current_id);
              NewRow.appendTo(".DGrid");
              bindAdder("#EnrMale" + current_id, "#EnrFem" + current_id, "#EnrTotal" + current_id);
              AddDatePicker("#VisitDate" + current_id, "#SchWeekDay" + current_id);
              current_id = current_id + 1;
            }
    );
  });
</script>
<style>
  .TxtInput{
    border: 2px solid darkgray;
    width: 98%;
    margin: 0px;
  }
  .TxtInput:hover{
    border: 2px solid #fbd850;
  }
  .TxtInput:focus{
    border: 2px solid #1c94c4;
  }
  input{
    padding: 2px 4px 2px 4px;
  }
  input[readonly="readonly"]{
    border: none;
    background-color: transparent;
  }
  th,td{
    text-align: center;
  }
</style>
</head>
<body>
  <div class="TopPanel">
    <div class="LeftPanelSide"></div>
    <div class="RightPanelSide"></div>
    <h1>
      <?php echo AppTitle; ?>
    </h1>
  </div>
  <div class="Header"></div>
  <?php
  require_once("topmenu.php");
  ?>
  <div class="content">
    <div style="margin-top: 10px;">
      <h1 style="color: #333333;">Annexure-A</h1>
      <h2 style="text-align: center">Action Plan Format (Micro Planning)</h2>
      <div style="border: 2px solid black;">
        <h3 style="text-align: center;border-bottom: 2px solid black;background-color: #333333;color: white;">National Rural Health Mission - Child Health Screening and Early Intervention Services</h3>
        <table rules="all" width="100%" class="DGrid">
          <tr>
            <td colspan="8">Action Plan of <input style="width:100px;" class="TxtInput" type="text"/></td>
          </tr>
          <tr>
            <td colspan="3">State:<input style="width:100px;" class="TxtInput" type="text"/></td>
            <td colspan="3">District:<input style="width:100px;" class="TxtInput" type="text"/></td>
            <td colspan="3">Block/Municipality:<input style="width:100px;" class="TxtInput" type="text"/></td>
          </tr>
          <tr>
            <th rowspan="2">Sl. No.</th>
            <th rowspan="2">Name of Institution</th>
            <th colspan="3">Number of Children in Institution</th>
            <th rowspan="2">School Contact (Mobile) No.</th>
            <th rowspan="2">Visit Date</th>
            <th rowspan="2">Day</th>
          </tr>
          <tr>
            <th>Male</th>
            <th>Female</th>
            <th>Total</th>
          </tr>
          <tr id="Row">
            <td style="width:50px;"><input style="width:20px;" id="SlNo" readonly="readonly" value="1"/></td>
            <td><input id="InstName" class="TxtInput" name="InstName[]" type="text" /></td>
            <td style="width:60px;"><input style="width: 45px;" id="EnrMale" class="TxtInput" name="EnrMale[]" type="number" min="0" max="150"/></td>
            <td style="width:60px;"><input style="width: 45px;" id="EnrFem" class="TxtInput" name="EnrFem[]" type="number" min="0" max="150"/></td>
            <td style="width:60px;"><span id="EnrTotal">0</span></td>
            <td style="width:100px;text-align: center;"><input style="width: 85px;" id="Mobile" maxlength="10" class="TxtInput" name="Mobile[]" type="text" /></td>
            <td style="width:100px;"><input style="text-align: right;width: 92px;" id="VisitDate" class="TxtInput datepick" name="VisitDate[]" type="text" /></td>
            <td style="width:100px;"><input id="SchWeekDay" type="text" readonly="readonly"/></td>
          </tr>
        </table>
        <input type="button" id="AddRow" value="Add Schedule" />
        <p>Content goes here</p>
      </div>
    </div>
  </div>
  <div class="pageinfo">
    <?php FN\pageinfo(); ?>
  </div>
  <div class="footer">
    <?php FN\footerinfo(); ?>
  </div>
</body>
</html>
