<html>
	<head>
		<style type="text/css">
			/* table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
				} */

				html{
					margin: 30px;
				}

				table {
				border: 2px solid black;
				border-collapse: collapse;
				margin-left: auto;
  				margin-right: auto;
				margin-bottom: 20px;
				}

				thead.hr{
				border-bottom: 2px solid black;
				border-collapse: collapse;
				
				
				}

				tr.hr{
				border-top: 2px solid black;
				border-collapse: collapse;
				}

				th, td {
				padding-top: 10px;
				padding-bottom: 10px;
				padding-left: 10px;
				padding-right: 5px;
				}

				h1 {
					margin-bottom: -20px;
					margin-top: -15px;
					text-align: center;
				}

				.addcenter{
					text-align: center;
				}

				b {
					font-weight: bolder !important;
					font-size: 16px;
				}

				th.right-logo {
					padding: inherit;
				}
				th.right-logo img {
					width: 80px;
					margin-right: -130px;
				}
				th.left-logo img {
					width: 90px;
				}
				th.left-logo img {
					margin: -20px !important;
				}
				tr.hr td {
					padding: 15px;
				}

				.pt td{
					padding-top: 20px;
				}
				
				.pb td{
					padding-bottom: 20px;
				}
		</style>
	</head>
	<body>
		<table style="width: 740px">
			<colgroup>
				<col style="width: 10px">
				<col style="width: 100px">
				<col style="width: 100px">
				<col style="width: 100px">
				<col style="width: 100px">
				<col style="width: 120px">
			</colgroup>
			<thead class="hr">
			  <tr>
			  	<th class="left-logo" rowspan="2"><img src="assets/media/logos/left-logo.png"></th>
				<th colspan="4"><h1>Shiv Satyam Weighbridge</h1></th>
				<th class="right-logo" rowspan="2"><img src="assets/media/logos/right-logo.png"></th>
			  </tr>
			  <tr>
				<td class="addcenter" colspan="4">Village: Dhaneti, Bhuj-Bhachau Highway, <br> Dist. Kutch, Pin Code: 370020, Tel. (+91) 98244 86644</td>
			  </tr>
			</thead>
			<tbody>
			
			  <tr class="pt">
			  
			  <td><b>Ticket No.:</b></td><td><b>{{($data[0]->ticket_no)}}</b></td>
				<td><b>Vehicle No.:</b></td><td><b>{{$data[0]->vehicle_no}}</b></td>
				<td>Transporter:</td>	<td>{{$data[0]->name}}</td>
			  </tr>
			  <tr>
				<td><b>Gross:</b></td>	<td><b>{{($data[0]->gross_weight.' kg')}}</b></td>
				<td>Date:</td>	<td>{{(new DateTime($data[0]->gross_date))->format('d-m-Y')}}</td>
				<td>Time:</td>	<td>{{(new DateTime($data[0]->gross_time))->format('H:i A')}}</td>


			  </tr>
			  <tr>
				<td><b>Tare:</b></td>	<td><b>{{($data[0]->tare_weight.' kg')}}</b></td>
				<td>Date:</td>	<td>{{(new DateTime($data[0]->tare_date))->format('d-m-Y')}}</td>
				<td>Time:</td>	<td>{{(new DateTime($data[0]->tare_time))->format('H:i A')}}</td>
			  </tr>
			  <tr class="pb">
				<td><b>Net:</b></td>	<td><b>{{($data[0]->net_weight.' kg')}}</b></td>
				<td>Material:</td>	<td>{{($data[0]->material)}}</td>
				<td>Charges:</td>	<td>{{($data[0]->charges)}}</td>
			  </tr>
			  <tr class="hr"> 
				<td colspan="3">Operators Signature:</td>
				<td colspan="3">Drivers Signature:</td>
			  </tr>
			  
			</tbody>
		</table>

		<table style="width: 740px">
			<thead class="hr">
			  <tr>
				<th class="left-logo" rowspan="2"><img src="assets/media/logos/left-logo.png"></th>
				<th colspan="4"><h1>Shiv Satyam Weighbridge</h1></th>
				<th class="right-logo" rowspan="2"><img src="assets/media/logos/right-logo.png"></th>
			  </tr>
			  <tr>
				<td class="addcenter" colspan="4">Village: Dhaneti, Bhuj-Bhachau Highway, <br> Dist. Kutch, Pin Code: 370020, Tel. (+91) 98244 86644</td>
			  </tr>
			</thead>
			<tbody>
			
			  <tr class="pt">
				<td><b>Ticket No.:</b></td><td><b>{{($data[0]->ticket_no)}}</b></td>
				<td><b>Vehicle No.:</b></td>	<td><b>{{$data[0]->vehicle_no}}</b></td>
				<td>Transporter:</td>	<td>{{$data[0]->name}}</td>
			  </tr>
			  <tr>
				<td><b>Gross:</b></td>	<td><b>{{($data[0]->gross_weight.' kg')}}</b></td>
				<td>Date:</td>	<td>{{(new DateTime($data[0]->gross_date))->format('d-m-Y')}}</td>
				<td>Time:</td>	<td>{{(new DateTime($data[0]->gross_time))->format('H:i A')}}</td>
			  </tr>
			  <tr>
				<td><b>Tare:</b></td>	<td><b>{{($data[0]->tare_weight.' kg')}}</b></td>
				<td>Date:</td>	<td>{{(new DateTime($data[0]->tare_date))->format('d-m-Y')}}</td>
				<td>Time:</td>	<td>{{(new DateTime($data[0]->tare_time))->format('H:i A')}}</td>
			  </tr>
			  <tr class="pb">
				<td><b>Net:</b></td>	<td><b>{{($data[0]->net_weight.' kg')}}</b></td>
				<td>Material:</td>	<td>{{($data[0]->material)}}</td>
				<td>Charges:</td>	<td>{{($data[0]->charges)}}</td>
			  </tr>
			  <tr class="hr"> 
				<td colspan="3">Operators Signature:</td>
				<td colspan="3">Drivers Signature:</td>
			  </tr>
			 
			</tbody>
		</table>

		<table style="width: 740px">
			<thead class="hr">
			  <tr>
				<th class="left-logo" rowspan="2"><img src="assets/media/logos/left-logo.png"></th>
				<th colspan="4"><h1>Shiv Satyam Weighbridge</h1></th>
				<th class="right-logo" rowspan="2"><img src="assets/media/logos/right-logo.png"></th>
			  </tr>
			  <tr>
				<td class="addcenter" colspan="4">Village: Dhaneti, Bhuj-Bhachau Highway, <br> Dist. Kutch, Pin Code: 370020, Tel. (+91) 98244 86644</td>
			  </tr>
			</thead>
			<tbody>
			
			  <tr class="pt">
				<td><b>Ticket No.:</b></td>	<td><b>{{($data[0]->ticket_no)}}</b></td>
				<td><b>Vehicle No.:</b></td>	<td><b>{{$data[0]->vehicle_no}}</b></td>
				<td>Transporter:</td>	<td>{{$data[0]->name}}</td>
			  </tr>
			  <tr>
				<td><b>Gross:</b></td>	<td><b>{{($data[0]->gross_weight.' kg')}}</b></td>
				<td>Date:</td>	<td>{{(new DateTime($data[0]->gross_date))->format('d-m-Y')}}</td>
				<td>Time:</td>	<td>{{(new DateTime($data[0]->gross_time))->format('H:i A')}}</td>
			  </tr>
			  <tr>
				<td><b>Tare:</b></td>	<td><b>{{($data[0]->tare_weight.' kg')}}</b></td>
				<td>Date:</td>	<td>{{(new DateTime($data[0]->tare_date))->format('d-m-Y')}}</td>
				<td>Time:</td>	<td>{{(new DateTime($data[0]->tare_time))->format(' H:i A')}}</td>
			  </tr>
			  <tr class="pb">
				<td><b>Net:</b></td>	<td><b>{{($data[0]->net_weight.' kg')}}</b></td>
				<td>Material:</td>	<td>{{($data[0]->material)}}</td>
				<td>Charges:</td>	<td>{{($data[0]->charges)}}</td>
			  </tr>
			  <tr class="hr"> 
				<td colspan="3">Operators Signature:</td>
				<td colspan="3">Drivers Signature:</td>
			  </tr>
			 
			</tbody>
			
		</table>
	</body>
</html>

