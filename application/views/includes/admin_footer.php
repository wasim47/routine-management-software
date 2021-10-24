<script type="text/javascript">
                        $(document).ready(function () {
						//alert('dfd');
                            $('.date-picker').daterangepicker({
                                singleDatePicker: true,
								format: 'YYYY-MM-DD',
                                calender_style: "picker_4"
                            }, function (start, end, label) {
                                console.log(start.toISOString(), end.toISOString(), label);
                            });
                        });
                    </script>
					<!--<div class="row" style="text-align:center; width:100%">
                        <a target="_blank" href="http://softxmagic.com/">
                        <img src="<?php echo base_url();?>asset/uploads/mylogo.png" style="width:150px; height:auto" />
                        </a>
					</div>-->
            </body>

</html>