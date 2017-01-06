<style>
.flex-container {
 display: -webkit-flex;
 display: flex;
 justify-content: space-around;
 align-items: flex-start;
 flex-wrap: wrap;
 width: 100%;
 height: 100%;
 background-color: #ffffff;
}

.flex-item {
 width: 154px;
 height: 100%;
 margin: 10px;
 text-align: center;
}
.flex-item h2 {
 padding-top: 5px;
}
.learnpageIcons {
 box-sizing: border-box;
 width: 100%;
 height: 150px;
 border: 4px solid #ffffff;
 display: table;
 background-color: #44b3e2;
 color: #ffffff;
 box-shadow: none;
}
.learnpageIcons i {
 display: table-cell;
 vertical-align: middle;
 text-align: center;
 text-shadow: none;
}
.nextPrev {
 display: none;
}
</style>
<div class="flex-container">
	<div class="flex-item">
		<div class='learnpageIcons'>
			<div class='iconCircle'></div>
		</div>
		<h2>Electricity Monitoring</h2>
		<p>Learn all about the basics of electricity monitoring, from AC power theory to designing and building your own monitoring system.</p>
	</div>
	<div class="flex-item">
		<div class='learnpageIcons'>
			<div class='iconCircle'></div>
		</div>
		<h2>Sustainable Energy</h2>
		<p>Learn the theory behind the available methods and technologies for achieving a sustainable energy supply.</p>
	</div>
	<div class="flex-item">
		<div class='learnpageIcons'>
			<div class='iconCircle'></div>
		</div>
		<h2>PV<br>
		Diversion</h2>
		<p>Learn how to build a solar PV diverter to make use of excess energy.</p>
	</div>
</div>
<script>
   $(".learnpageIcons:eq(0)").append(
    "<i class='fa fa-bolt fa-3x'><\/i>");
   $(".learnpageIcons:eq(1)").append(
    "<i class='fa fa-globe fa-3x'>");
   $(".learnpageIcons:eq(2)").append(
    "<i class='fa fa-random fa-3x' style='padding:8px 0 0 4px;'><\/i>");
</script>