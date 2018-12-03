<style>
body {
   background-color: #ffffff;
}
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
   transition: 0.3s;
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
   transition: 0.3s ease-in-out;
}
.fcontainer {
   -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
   -webkit-touch-callout: none;
   -webkit-user-select: none;
   -khtml-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
    user-select: none;
}
.fcontainer:hover .learnpageIcons {
   background-color: #777777;
   /*border: 8px solid #ffffff;*/
}
.fcontainer:hover h2 {
   color: #777777;
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
.editGit {
   display: none;
}
</style>
<div class="flex-container">
	<div class="flex-item">
    <div class="fcontainer">
      <a href="electricity-monitoring/ac-power-theory/introduction">
      	<div class='learnpageIcons'>
      		<div class='iconCircle'></div>
      	</div>
      	<h2>Electricity Monitoring</h2>
      	<p>Learn all about the basics of electricity monitoring, from AC power theory to designing and building your own monitoring system.</p>
    	</a>
    </div>
	</div>
	<div class="flex-item">
	  <div class="fcontainer">
	    <a href="sustainable-energy/energy/introduction">
		    <div class='learnpageIcons'>
		    	<div class='iconCircle'></div>
		    </div>
		    <h2>Sustainable Energy</h2>
		    <p>Exploring the context of energy, renewable supply, energy efficiency and zero carbon energy systems.</p>
		  </a>
		</div>
	</div>
	<div class="flex-item">
	  <div class="fcontainer">
	    <a href="pv-diversion/introduction/choosing-an-energy-diverter.md">
		    <div class='learnpageIcons'>
			    <div class='iconCircle'></div>
		    </div>
		    <h2>PV<br>Diversion</h2>
		    <p>Discover how to build a solar PV diverter.</p>
		  </a>
	  </div>
	</div>
  <div class="flex-item">
	  <div class="fcontainer">
	    <a href="other-utilities/water-and-gas/introduction">
		    <div class='learnpageIcons'>
			    <div class='iconCircle'></div>
		    </div>
		    <h2>Other<br>Utilities</h2>
		    <p>Studies on other applications, such as gas and water monitoring.</p>
		  </a>
	  </div>
	</div>
	
</div>
<script>
  $(".learnpageIcons:eq(0)").append(
  "<i class='fa fa-bolt fa-3x'></i>");
  $(".learnpageIcons:eq(1)").append(
  "<i class='fa fa-globe fa-3x'></i>");
  $(".learnpageIcons:eq(2)").append(
  "<i class='fa fa-random fa-3x' style='padding:8px 0 0 4px;'></i>");
  $(".learnpageIcons:eq(3)").append(
  "<i class='fa fa-bath fa-3x'></i>");
</script>
