</div>
			<div class="row">
				<?php include('pre_results.php');?>
			</div>	
			<br>


				<footer >
					<div class="row text-center" id="election_footer">
						<span>&copy; Copyright Sakshi 2018. All rights reserved.</span>
					</div>
				</footer>
		<!-- Main Body End -->
			</div>

		</div>
		<!-- Mini Cube 
		<div class="miniCube" id="miniCube">
			<ul class="miniCube_list">
				<li>1</li>
				<li>2</li>
				<li>3</li>
			</ul>
		</div>
		<div class="miniCube_open" id="miniCube_open">
			<h5>Open</h5>
		</div>
		<div class="miniCube_close" id="miniCube_close">
			<h5>X</h5>
		</div>
		-->
		<!-- ScrollToTop -->
		<div class="scrollTop" id="scrollTop">
			<img src="/elections-2019/assets/images/arrow.png" width="25px" />
		</div>

		<style>
			.scrollTop{position:fixed;bottom:25px;right:20px;background-color:#eee;padding:8px;border-radius:25px 25px;display: none;}
			.scrollTop:hover{background-color:#eb6a14;cursor:pointer;}
			.miniCube{position:fixed;bottom:0;right:150px;width:100px;height:100px;border:1px solid #000;z-index:999;background-color:#fff;}
			.miniCube>ul>li{display:inline-block;text-decoration: none;width:100px;height:100px;}
			.miniCube_open{position:fixed;bottom:0;right:150px;width:100px;height:25px;border:1px solid #000;text-align:center;z-index:999;background-color:#fff;display:none;}
			.miniCube_close{position:fixed;bottom:100px;right:150px;width:25px;height:25px;border:1px solid #000;text-align:center;z-index:999;background-color:#fff;}
		</style>
		<script>
			$(window).on('scroll',scrollTopHide);
			function scrollTopHide()
			{
				var height = $('html,body').scrollTop();
				//alert(height);
				if( height > 20)
				{
					$('.scrollTop').show();
				}
				else
				{
					$('.scrollTop').hide();
				}
			}
			$('.scrollTop').on('click',function(){
				$('html,body').animate({'scrollTop':0},2000);
			});
		</script>
		
		<!-- SCRIPT -->
		
		<script src="<?php echo '/elections-2018/assets/calender/jquery-1.10.2.js'; ?>"></script>
		<script src="<?php echo '/elections-2018/assets/calender/jquery-ui.js'; ?>"> </script>
		
		<script>
			var title = '';
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function()
		{ (i[r].q=i[r].q||[]).push(arguments)}
		,i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-3942776-1', 'auto');
		if (title)
		{
			ga('send', {
			  hitType: 'pageview',
			  page: location.pathname,
			  title: title
			});
		}
		else
			ga('send', 'pageview');
		</script>
		<!-- Start Alexa Certify Javascript -->
		<script type="text/javascript">
		_atrk_opts =
		{ atrk_acct:"aTL1o1QolK104B", domain:"sakshi.com",dynamic: true}
		;
		(function()
		{ var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); }
		)();
		</script>
		<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=aTL1o1QolK104B" style="display:none" height="1" width="1" alt="" /></noscript>
		<!-- End Alexa Certify Javascript --> 
		
			 
		<script>
		/*	document.onkeydown = function(e) {
				var key;
				if (window.event) {
					key = event.keyCode
				}
				else {
					var unicode = e.keyCode ? e.keyCode : e.charCode
					key = unicode
				}

				switch (key) {
					//event.keyCode
					case 116: //F5 button
					event.returnValue = false;
					key = 0; //event.keyCode = 0;
					return false;
					case 82: //R button
					if (event.ctrlKey) {
						event.returnValue = false;
						key = 0; //event.keyCode = 0;
						return false;
					}
					case 91: // ctrl + R Button
					event.returnValue= false;
					key=0;
					return false;
				}
			}*/
		</script>
		<script>
			$('#miniCube_open').on('click',function(){
				$('#miniCube').show();
				$('#miniCube_close').show();
				$('#miniCube_open').hide();
			});
			$('#miniCube_close').on('click',function(){
				$('#miniCube').hide();
				$('#miniCube_close').hide();
				$('#miniCube_open').show();
			});

		</script>
		
		<!-- SCRIPT -->
		<?php echo '<!-- Page generated :- '.date('Y-m-d H:i:s').' -->';?>
	</body>
</html>