@extends('layouts.custom')
@section('content')
<div class="page has-sidebar-left">
	<div>
		<header class="blue accent-3 relative">
			<div class="container-fluid text-white">
				<div class="row p-t-b-10 ">
					<div class="col">
						<div class="pb-3">
							<div class="image mr-3  float-left">
								<img class="user_avatar no-b no-p" src="{{ asset('img/dummy/u2.png') }}" alt="User Image">
							</div>
							<div>
								<h6 class="p-t-10">{{ $data->name }}</h6>
								{{ $data->email }}
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
						<li>
							<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"><i class="icon icon-home2"></i>Home</a>
						</li>
						<li>
							<a class="nav-link" id="v-pills-payments-tab" data-toggle="pill" href="#v-pills-payments" role="tab" aria-controls="v-pills-payments" aria-selected="false"><i class="icon icon-money-1"></i>Payments</a>
						</li>
						<li>
							<a class="nav-link" id="v-pills-timeline-tab" data-toggle="pill" href="#v-pills-timeline" role="tab" aria-controls="v-pills-timeline" aria-selected="false"><i class="icon icon-cog"></i>Timeline</a>
						</li>
					</ul>
				</div>

			</div>
		</header>

		<div class="container-fluid animatedParent animateOnce my-3">
			<div class="animated fadeInUpShort">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-lg-4">
										<div class="card r-3">
											<div class="p-4">
												<div class="float-right">
													<span class="icon-award text-light-blue s-48"></span>
												</div>
												<div class="counter-title">Total Saldo</div>
												<h5 class="sc-counter mt-3">{{ $data->balance }}</h5>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="card r-3">
											<div class="p-4">
												<div class="float-right"><span class="icon-stop-watch3 s-48"></span>
												</div>
												<div class="counter-title ">Total Deposit</div>
												<h5 class="sc-counter mt-3">500000</h5>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="white card">
											<div class="p-4">
												<div class="float-right"><span class="icon-orders s-48"></span>
												</div>
												<div class="counter-title">Total Order</div>
												<h5 class="sc-counter mt-3">316000</h5>
											</div>
										</div>
									</div>
								</div>

								<div class="row my-3">
									<!-- bar charts group -->
									<div class="col-md-12">
										<div class="card">
											<div class="card-header white">
												<h6>Chart Order <small>30 Hari Terakhir</small></h6>
											</div>
											<div class="card-body">
												<div id="graphx" style="width:100%; height:300px;" ></div>
											</div>
										</div>
									</div>
									<!-- /bar charts group -->
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="v-pills-payments" role="tabpanel" aria-labelledby="v-pills-payments-tab">
						<div class="row">
							<div class="col-md-12">
								<div class="card no-b">
									<div class="card-header white b-0 p-3">
										<h4 class="card-title">Invoices</h4>
										<small class="card-subtitle mb-2 text-muted">Items purchase by users.</small>
									</div>
									<div class="collapse show" id="invoiceCard">
										<div class="card-body p-0">
											<div class="table-responsive">
												<table id="recent-orders"
												class="table table-hover mb-0 ps-container ps-theme-default">
												<thead class="bg-light">
													<tr>
														<th>SKU</th>
														<th>Invoice#</th>
														<th>Customer Name</th>
														<th>Status</th>
														<th>Amount</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>PAP-10521</td>
														<td><a href="#">INV-281281</a></td>
														<td>Baja Khan</td>
														<td><span class="badge badge-success">Paid</span></td>
														<td>$ 1228.28</td>
													</tr>
													<tr>
														<td>PAP-532521</td>
														<td><a href="#">INV-01112</a></td>
														<td>Khan Sab</td>
														<td><span class="badge badge-warning">Overdue</span>
														</td>
														<td>$ 5685.28</td>
													</tr>
													<tr>
														<td>PAP-05521</td>
														<td><a href="#">INV-281012</a></td>
														<td>Bin Ladin</td>
														<td><span class="badge badge-success">Paid</span></td>
														<td>$ 152.28</td>
													</tr>
													<tr>
														<td>PAP-15521</td>
														<td><a href="#">INV-281401</a></td>
														<td>Zoor Shoor</td>
														<td><span class="badge badge-success">Paid</span></td>
														<td>$ 1450.28</td>
													</tr>
													<tr>
														<td>PAP-532521</td>
														<td><a href="#">INV-01112</a></td>
														<td>Khan Sab</td>
														<td><span class="badge badge-warning">Overdue</span>
														</td>
														<td>$ 5685.28</td>
													</tr>
													<tr>
														<td>PAP-05521</td>
														<td><a href="#">INV-281012</a></td>
														<td>Bin Ladin</td>
														<td><span class="badge badge-success">Paid</span></td>
														<td>$ 152.28</td>
													</tr>
													<tr>
														<td>PAP-15521</td>
														<td><a href="#">INV-281401</a></td>
														<td>Zoor Shoor</td>
														<td><span class="badge badge-success">Paid</span></td>
														<td>$ 1450.28</td>
													</tr>
													<tr>
														<td>PAP-32521</td>
														<td><a href="#">INV-288101</a></td>
														<td>Walter R.</td>
														<td><span class="badge badge-warning">Overdue</span>
														</td>
														<td>$ 685.28</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="tab-pane fade" id="v-pills-timeline" role="tabpanel" aria-labelledby="v-pills-timeline-tab">

					<div class="row">
						<div class="col-md-12">
							<!-- The time line -->
							<ul class="timeline">
								<!-- timeline time label -->
								<li class="time-label">
									<span class="badge badge-danger r-3">
										10 Feb. 2014
									</span>
								</li>
								<!-- /.timeline-label -->
								<!-- timeline item -->
								<li>
									<i class="ion icon-envelope bg-primary"></i>
									<div class="timeline-item card">
										<div class="card-header white"><a href="#">Support Team</a> sent you an email    <span class="time float-right"><i class="ion icon-clock-o"></i> 12:05</span></div>
										<div class="card-body">
											Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
											weebly ning heekya handango imeem plugg dopplr jibjab, movity
											jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
											quora plaxo ideeli hulu weebly balihoo...
										</div>
										<div class="card-footer">
											<a class="btn btn-primary btn-xs">Read more</a>
											<a class="btn btn-danger btn-xs">Delete</a>
										</div>
									</div>
								</li>
								<!-- END timeline item -->
								<!-- timeline item -->
								<li>
									<i class="ion icon-user yellow"></i>

									<div class="timeline-item  card">

										<div class="card-header white"><h6><a href="#">Sarah Young</a> accepted your friend request<span class="float-right"><i class="ion icon-clock-o"></i> 5 mins ago</span></h6></div>


									</div>
								</li>
								<!-- END timeline item -->
								<!-- timeline item -->
								<li>
									<i class="ion icon-comments bg-danger"></i>

									<div class="timeline-item  card">


										<div class="card-header white"><h6><a href="#">Jay White</a> commented on your post   <span class="float-right"><i class="ion icon-clock-o"></i> 27 mins ago</span></h6></div>

										<div class="card-body">
											Take me to your leader!
											Switzerland is small and neutral!
											We are more like Germany, ambitious and misunderstood!
										</div>
										<div class="card-footer">
											<a class="btn btn-warning btn-flat btn-xs">View comment</a>
										</div>
									</div>
								</li>
								<!-- END timeline item -->
								<!-- timeline time label -->
								<li class="time-label">
									<span class="badge badge-success r-3">
										3 Jan. 2014
									</span>
								</li>
								<!-- /.timeline-label -->
								<!-- timeline item -->
								<li>
									<i class="ion icon-camera indigo"></i>

									<div class="timeline-item  card">

										<div class="card-header white"><a href="#">Mina Lee</a> uploaded new photos<span class="time float-right"><i class="ion icon-clock-o"></i> 2 days ago</span></div>


										<div class="card-body">
											<img src="http://placehold.it/150x100" alt="..." class="margin">
											<img src="http://placehold.it/150x100" alt="..." class="margin">
											<img src="http://placehold.it/150x100" alt="..." class="margin">
											<img src="http://placehold.it/150x100" alt="..." class="margin">
										</div>
									</div>
								</li>
								<!-- END timeline item -->
								<!-- timeline item -->
								<li>
									<i class="ion icon-video-camera bg-maroon"></i>

									<div class="timeline-item  card">
										<div class="card-header white"><a href="#">Mr. Doe</a> shared a video<span class="time float-right"><i class="ion icon-clock-o"></i> 5 days ago</span></div>


										<div class="card-body">
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tMWkeBIohBs" allowfullscreen="" frameborder="0"></iframe>
											</div>
										</div>
										<div class="card-footer">
											<a href="#" class="btn btn-xs bg-maroon">See comments</a>
										</div>
									</div>
								</li>
								<!-- END timeline item -->
								<li>
									<i class="ion icon-clock-o bg-gray"></i>
								</li>
							</ul>
						</div>
						<!-- /.col -->
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
</div>
@endsection
