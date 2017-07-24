<?php
$langFileToLoad = __ROOT_DIR . '/languages/langDash.'. $language .'.php';
		include($langFileToLoad);
	?>

<div class="container-fluid" id="content">
	<div class="row">
		<div class="col-md-2">
			<button data-toggle="collapse" data-target="#left_menu"  id="left_menu_button"><h6 id="left_menu_tittle">50 appels</h6></button>

			<div id="left_menu" class="collapse">
				<form>
					<div id="left-menu-first-part">
				<h5 id="left_menu_first_tittle"><?php	echo $lang['FILTERS']; ?></h5>
				<h5><?php	echo $lang['OPERATOR']; ?>
					<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#operatorModal"><span class=" 	glyphicon glyphicon-cog"></span></button>
				</h5>


				<!-- Modal -->
				<div id="operatorModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title"><?php	echo $lang['OPERATOR']; ?></h4>
					      </div>
					      <div class="modal-body">
					        <p>P.Robert</p>
									<div class="checkbox">
								 		<label><input type="checkbox" value=""><?php	echo $lang['MY_TEAM']; ?></label>
									</div>
									<div class="checkbox">
								 		<label><input type="checkbox" value="">P.Robert</label>
									</div>
									<div class="checkbox ">
								 		<label><input type="checkbox" value="">A.Opérateur</label>
									</div>
									<p>...</p>
					      </div>
					    </div>

					  </div>
				</div>
				<select name="operator" id="selectOperator" onchange="operatorType_filter(this.value)">
					<?php
							if($_COOKIE["operatorType"] != ''){
								echo '<option value="'.$_COOKIE["operatorType"].'">'.$lang[$_COOKIE["operatorType"]].'</option>';
								foreach ($operator_types as $key => $operator) {
									if($operator != $_COOKIE["operatorType"]){
										echo '<option value="'.$operator.'">'.$lang[$operator].'</option>';
									}
								}
							}else{
								foreach ($operator_types as $key => $operator) {
										echo '<option value="'.$operator.'">'.$lang[$operator].'</option>';
								}
							}
							?>
				</select>
				<h5><?php	echo $lang['LOCATION']; ?>
					<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#locationModal"><span class=" 	glyphicon glyphicon-cog"></button>
				</h5>
				<!-- Modal -->
				<div id="locationModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<p>...</p>
								</div>
							</div>
						</div>
				</div>
				<input type="text" class="form-control" placeholder="<?php	echo $lang['SEARCH_TOWN']; ?>" name="">

				  <label for="distance"><?php	echo $lang['RANGE']; ?><span id="rangeDisplay">50km</span></label>
				  <input type="range" name="distance" id="distance" value="50" min="0" max="100" oninput="displayValRange(this.value)" onchange="displayValRange(this.value)">
					<h5><?php	echo $lang['TIME_SLOT']; ?></h5>
					<select name="timeSlot" id="selectTimeSlot">
						<option value=""><?php	echo $lang['TIME_SLOT_SELECT_ALL']; ?></option>
						<option value="">???</option>
						<option value="">???</option>
					</select>
					<h5><?php	echo $lang['STATE']; ?>
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#stateModal"><span class=" 	glyphicon glyphicon-cog"></button>
					</h5>
					<!-- Modal -->
					<div id="stateModal" class="modal fade" role="dialog">
						<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<p>...</p>
									</div>
								</div>
							</div>
					</div>
					<div class="checkbox">
						<?php
								if(isset($_COOKIE["waiting"]) && $_COOKIE["waiting"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="callStatusFilter_waiting()"><span>'.$lang['NEW_CALLS'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="callStatusFilter_waiting()" checked><span>'.$lang['NEW_CALLS'].'</span></label>';
								}
						?>
					</div>
					<div class="checkbox">
						<?php
								if(isset($_COOKIE["ongoing"]) && $_COOKIE["ongoing"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="callStatusFilter_ongoing()"><span>'.$lang['ONGOING_CALLS'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="callStatusFilter_ongoing()" checked><span>'.$lang['ONGOING_CALLS'].'</span></label>';
								}
						?>
					</div>
					<div class="checkbox ">
						<?php
								if(isset($_COOKIE["ended"]) && $_COOKIE["ended"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="callStatusFilter_ended()"><span>'.$lang['ENDED_CALLS'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="callStatusFilter_ended()" checked><span>'.$lang['ENDED_CALLS'].'</span></label>';
								}
						?>
					</div>
					<h5><?php	echo $lang['INTERVENTION_TYPE']; ?>
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#interventionModal"><span class=" 	glyphicon glyphicon-cog"></button>
					</h5>
					<!-- Modal -->
					<div id="interventionModal" class="modal fade" role="dialog">
						<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<p>...</p>
									</div>
								</div>
							</div>
					</div>
					<select name="interventionType" id="selectInterventionType" onchange="interventionType_filter(this.value)">
				<?php
						if($_COOKIE["emergencyType"] != ''){
							echo '<option value="'.$_COOKIE["emergencyType"].'">'.$lang[$_COOKIE["emergencyType"]].'</option>';
							foreach ($emergency_types as $key => $emergency) {
								if($emergency != $_COOKIE["emergencyType"]){
									echo '<option value="'.$emergency.'">'.$lang[$emergency].'</option>';
								}
							}
						}else{
							foreach ($emergency_types as $key => $emergency) {
									echo '<option value="'.$emergency.'">'.$lang[$emergency].'</option>';
							}
						}
						?>
					</select>
					<h5><?php	echo $lang['DIALED_NUMBER']; ?>
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#phoneNumberModal"><span class=" 	glyphicon glyphicon-cog"></button>
					</h5>
					<!-- Modal -->
					<div id="phoneNumberModal" class="modal fade" role="dialog">
						<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<p>...</p>
									</div>
								</div>
							</div>
					</div>
				<div id="called-numbers-filters">
					<div id="called-numbers-filters-left">
						<div class="checkbox">
							<?php
									if(isset($_COOKIE["called-number-112"]) && $_COOKIE["called-number-112"]=="false"){
											echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_112()"><span>112</span></label>';
									}else{
										echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_112()"  checked><span>112</span></label>';
									}
							?>
						</div>
						<div class="checkbox">
							<?php
									if(isset($_COOKIE["called-number-18"]) && $_COOKIE["called-number-18"]=="false"){
											echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_18()"><span>18</span></label>';
									}else{
										echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_18()"  checked><span>18</span></label>';
									}
							?>
						</div>
						<div class="checkbox ">
							<?php
									if(isset($_COOKIE["called-number-17"]) && $_COOKIE["called-number-17"]=="false"){
											echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_17()"><span>17</span></label>';
									}else{
										echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_17()"  checked><span>17</span></label>';
									}
							?>
						</div>
						<div class="checkbox">
							<?php
									if(isset($_COOKIE["called-number-15"]) && $_COOKIE["called-number-15"]=="false"){
											echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_15()"><span>15</span></label>';
									}else{
										echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_15()"  checked><span>15</span></label>';
									}
							?>
						</div>
					</div>
					<div id="called-numbers-filters-right">
						<div class="checkbox">
							<?php
									if(isset($_COOKIE["called-number-114"]) && $_COOKIE["called-number-114"]=="false"){
											echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_114()"><span>114</span></label>';
									}else{
										echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_114()"  checked><span>114</span></label>';
									}
							?>
						</div>
						<div class="checkbox ">
							<?php
									if(isset($_COOKIE["called-number-194"]) && $_COOKIE["called-number-194"]=="false"){
											echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_194()"><span>194</span></label>';
									}else{
										echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_194()"  checked><span>194</span></label>';
									}
							?>
						</div>
						<div class="checkbox ">
							<?php
									if(isset($_COOKIE["called-number-196"]) && $_COOKIE["called-number-196"]=="false"){
											echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_196()"><span>196</span></label>';
									}else{
										echo '<label><input type="checkbox" value="" onclick="calledNumberFilter_196()"  checked><span>196</span></label>';
									}
							?>
						</div>
					</div>
				</div>
			</div>
			<div id="left-menu-second-part">
					<h5 id="left-menu-second-part-first-tittle"><?php	echo $lang['PREFERENCES']; ?>
						<!-- Trigger the modal with a button -->
						<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#preferencesModal"><span class=" 	glyphicon glyphicon-cog"></button>
					</h5>
					<!-- Modal -->
					<div id="preferencesModal" class="modal fade" role="dialog">
						<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
										<p>...</p>
									</div>
								</div>
							</div>
					</div>

					<div class="checkbox ">
						<?php
								if(isset($_COOKIE["ongoing_first_filter"]) && $_COOKIE["ongoing_first_filter"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="ongoingCallsFirst()"><span>'.$lang['ONGOING_CALLS_FILTER'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="ongoingCallsFirst()" checked><span>'.$lang['ONGOING_CALLS_FILTER'].'</span></label>';
								}
						?>
					</div>
					<div class="checkbox">
						<?php
								if(isset($_COOKIE["state"]) && $_COOKIE["state"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="state_filter()"><span>'.$lang['STATE_FILTER'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="state_filter()" checked><span>'.$lang['STATE_FILTER'].'</span></label>';
								}
						?>
					</div>
					<div class="checkbox">
						<?php
								if(isset($_COOKIE["picture"]) && $_COOKIE["picture"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="picture_filter()"><span>'.$lang['PICTURE_FILTER'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="picture_filter()" checked><span>'.$lang['PICTURE_FILTER'].'</span></label>';
								}
						?>
					</div>
					<div class="checkbox ">
						<?php
								if(isset($_COOKIE["nature"]) && $_COOKIE["nature"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="nature_filter()"><span>'.$lang['NATURE_FILTER'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="nature_filter()" checked><span>'.$lang['NATURE_FILTER'].'</span></label>';
								}
						?>
					</div>
					<div class="checkbox">
						<?php
								if(isset($_COOKIE["location"]) && $_COOKIE["location"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="location_filter()"><span>'.$lang['LOCATION_FILTER'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="location_filter()" checked><span>'.$lang['LOCATION_FILTER'].'</span></label>';
								}
						?>
					</div>
					<div class="checkbox">
						<?php
								if(isset($_COOKIE["identity"]) && $_COOKIE["identity"]=="false"){
										echo '<label><input type="checkbox" value="" onclick="identity_filter()"><span>'.$lang['IDENTITY_FILTER'].'</span></label>';
								}else{
									echo '<label><input type="checkbox" value="" onclick="identity_filter()" checked><span>'.$lang['IDENTITY_FILTER'].'</span></label>';
								}
						?>
					</div>
					<div class="checkbox ">
						<label><input type="checkbox" value=""><span><?php	echo $lang['HIDE_IMAGES_FILTER']; ?></span></label>
					</div>
		</div>
				</form>
			</div>


		</div>

		<div class="col-md-8 ticketsArea">
				<div class="container ticketsContainer" id="tickets">
					<?php
					if(isset($requests)){
						foreach($requests as $request){

								echo '<ul class="list-group  ticket '.$request->request_id().' '.$request->status().' called-number-'.$request->called_number().' '.$request->request_type_of_incident().'">';
								echo '<li class="list-group-item '.$request->status().' ticketsGroup ">';
								echo '<a data-toggle="collapse" href="#collapse'.$request->request_id().'">';
								echo '<ul class="list-group-horizontal">';
								echo ' <li class="list-group-item"><span class="glyphicon glyphicon-phone">'.$request->timestamp().'</span></li>';
								echo '<li class="list-group-item state"><span class="glyphicon glyphicon-earphone glyphicon-earphone-'.$request->status().'"></span></li>';
								echo '<li class="list-group-item picture">Second item</li>';
								if($request->request_type_of_incident() == 'FIRE'){
									echo ' <li class="list-group-item nature"><span class="glyphicon glyphicon-fire glyphicon-fire-ongoing"></span></li>';
								}else{
									echo '<li class="list-group-item nature">Third item</li>';
								}
								echo '  <li class="list-group-item ticketLocation location"><span class="glyphicon glyphicon-map-marker">'.$request->caller_location().'</span></li>';
									echo '</a>';
								echo '<li class="list-group-item identity"><ul>
																									<li>'.$request->caller_name().' '.$request->caller_surname().'</li>
																									<li>'.$request->caller_phone_number().'</li>
																									<li>'.$request->caller_nationality().'</li>';
																						if($request->is_victim()){
																							echo '<li><label><input type="checkbox" value="" checked>'.$lang['VICTIM'].'</label></li>';
																						}else{
																							echo '<li><label><input type="checkbox" value="">'.$lang['VICTIM'].'</label></li>';
																						}
						    echo  											     '</ul>
											</li>';
								echo '</ul>';

								echo '</li>';
								echo '</ul>';

								echo '<div id="collapse'.$request->request_id().'" class="panel-collapse collapse collapse-table">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Vidéos (x)</th>
														<th>Infos victime(s)</th>
														<th>Messages (x)</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>VIDEO</td>
														<td>INFOS</td>
														<td>CHAT</td>
													</tr>
												</tbody>
											</table>
										</div>';
						}
					}
					?>

				</div>
		</div>

		<div class="col-md-2">
			<button data-toggle="collapse" data-target="#right_menu" id="rigth_menu_button"><h6 id="right_menu_tittle"><?php	echo $lang['CONTACTS']; ?></h6></button>

				<div id="right_menu" class="collapse">
					<form>
						<div class="right-menu-even">
							<input type="text" class="form-control" placeholder="<?php	echo $lang['SEARCH']; ?>" name="">


							<select name="language" id="selectLang">
								<option value=""><?php	echo $lang['CONTACT_LANGUAGE']; ?></option>
								<option value=""><?php	echo $lang['FRENCH']; ?></option>
								<option value=""><?php	echo $lang['ENGLISH']; ?></option>
								<option value=""><?php	echo $lang['SPANISH']; ?></option>
							</select>

							<label for="perimetre"><?php	echo $lang['CONTACT_PERIMETRE']; ?><span id="perimetreDisplay">50km</span></label>
						  <input type="range" name="perimetre" id="perimetre" value="50" min="0" max="100" oninput="displayValPerimetre(this.value)" onchange="displayValPerimetre(this.value)">
						</div>
						<div class="right-menu-odd">
							<h5><?php	echo $lang['CONTACTS_MY_TEAM']; ?><span class="badge">3</span></h5>
							<ul>
								<li>opérateur 1</li>
								<li>opérateur 2</li>
								<li>opérateur 3</li>
							</ul>
						</div>
						<div class="right-menu-even">
							<h5>17 POLICE - MONACO <span class="badge">4</span></h5>
							<ul>
								<li>opérateur 1</li>
								<li>opérateur 2</li>
								<li>opérateur 3</li>
								<li>opérateur 4</li>
							</ul>
						</div>
						<div class="right-menu-odd">
							<h5>18 POMPIER - NICE <span class="badge">2</span></h5>
						</div>
						<div class="right-menu-even">
							<h5>15 SAMU - NICE <span class="badge">4</span></h5>
						</div>
						<div class="right-menu-odd">
							<h5>114 MALENTENDANTS - NICE <span class="badge">1</span></h5>
						</div>
						<div class="right-menu-even">
							<h5>196 CROSS - NICE <span class="badge">3</span></h5>
						</div>
						<div class="right-menu-odd">
							<h5>119 ENFANCE EN DANGER - NICE <span class="badge">4</span></h5>
						</div>
						<div class="right-menu-even">
							<h5>113 DROGUE ALCOOL</h5>
						</div>
						<div class="right-menu-odd">
							<h5>AUTRES...</h5>
						</div>
					</form>
				</div>


		</div>
	</div>
</div>
<script src='js/dashboard.js'></script>
