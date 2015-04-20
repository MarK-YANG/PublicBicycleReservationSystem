<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/16/15
 * Time: 10:53 PM
 */
?>

<script type="text/javascript" src="assets/customer/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/customer/js/bootstrap.min.js"></script>
<script src="assets/customer/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'en',
        pickDate: true,
        pickTime: false,
        hourStep: 1,
        minuteStep: 15,
        secondStep: 30,
        inputMask: true
    });
</script>


</body>
</html>