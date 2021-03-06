		<!-- Content -->
		<div class="col-md-10">
			<!-- Overview -->
			<div id="content-overview" class="admin-content">
				
			</div>

			<!-- Reports -->
			<div id="content-reports" class="admin-content">
				<div class="row">
					<!-- Reports List -->
					<div class="col-md-3">
						<div class="list-group report-list"></div>
					</div>

					<!-- Reports Detail -->
					<div class="col-md-9 report-details">
						<div class="row report-details-big report-details-uppercase">
							<div id="report-details-category" class="col-md-12" ></div>
						</div>
						<div class="row report-details-big">
							<div id="report-details-address" class="col-md-12"></div>
						</div>
						<div class="row" class="report-details-small">
							<div id="report-details-date" class="col-md-4"></div>
							<div id="report-details-score" class="col-md-4"></div>
							<div id="report-details-vote" class="col-md-4"></div>
						</div>
						<div class="row">
							<div id="report-details-map" class="col-md-6" ></div>
							<div class="col-md-6" id="report-details-image-container">
								<img src="" id="report-details-image"/>
							</div>
						</div>
						<div class="row"><div class="col-md-12 report-details-update-header">Updates</div></div>
						<div class="row">
							<div id="report-details-updates" class="list-group col-md-12" ></div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<textarea id="report-update-area" placeholder="Enter update here."></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-success" id="report-btn-update" disabled>Post Update</button>
							</div>
						</div>
						<div id="report-details-buttons" class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-success" id="report-btn-open">Open Report</button>
								<button type="button" class="btn btn-danger" id="report-btn-close">Close Report</button>
							</div>
						</div>
						<div id="report-pay-user" class="row">
							<div class="col-md-12">
								<input type="number" class="form-control" id="report-payuser" placeholder="Enter Amount">
								<button type="button" class="btn btn-warning" id="report-reward">Reward This User</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6x__caSSACAJWV9uoEYA6mcP9J4xdo_c&sensor=false"></script>
<script src="<?=base_url(); ?>static/js/admin.js"></script>
<script>
	$(document).ready(function() {
		admin.base_url = "<?=base_url(); ?>";
		admin.ep_reports_open = "admin/api/get_reports";
		admin.ep_reports_closed = "admin/api/get_reports_closed";
		admin.ep_report_update = "admin/api/save_update";
		admin.ep_report_set_open = "admin/api/set_open";
		admin.ep_report_set_close = "admin/api/set_close";
		admin.ep_paymoney = "admin/api/pay_money";
		admin.browser_id = "<?=$browser['id']; ?>";
		admin.init();
		google.maps.event.addDomListener(window, 'load', admin.map_initialize);
	});
</script>
