<?php
require_once('./../config.php');

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript"></script>
<script>
    function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    source = $('#frame')[0];
    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    pdf.fromHTML(
    source,
    margins.left,
    margins.top, {
        'width': margins.width,
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        pdf.save('Test.pdf');
    }, margins);
}
</script>


<div class="container">
	
	<div class="card card-outline rounded-0 card-teal">
	
<iframe id="frame" src='user/certificate.pdf' style="width: 100%;height: 600px;"></iframe>
<button onclick="javascript:demoFromHTML();">PDF</button>
</div>
</div>
<hr class="mx-n3">
<div class="text-right pt-1">
	<button class="btn btn-sm btn-flat btn-light bg-gradient-light border" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>