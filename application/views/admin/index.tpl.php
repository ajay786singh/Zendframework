<?php $totalusers= $this->totalusers; 

   $users=$totalusers['num'];
?>
<article class="module width_full">
			<header><h3>Stats</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<img src="http://chart.apis.google.com/chart?chxr=0,0,3000&amp;chxt=y&amp;chs=520x140&amp;cht=lc&amp;chco=76A4FB,80C65A&amp;chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&amp;chls=2|2&amp;chma=40,20,20,30" width="520" height="140" alt="">
				</article>
				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">New Users</p>
						<p class="overview_count"><a href="<?php echo $this->url(array('controller' => 'admin', 'action' => 'users'), null, true) ?>"><?php echo $users; ?></a></p>
						
					</div>
					<div class="overview_previous">
						<p class="overview_day">Visitors</p>
						<p class="overview_count">1,646</p>
						
					</div>
				</article>
				<div class="clear"></div>
			</div>
		</article>