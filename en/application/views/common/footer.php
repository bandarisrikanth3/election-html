	
</div>
			<br>
				<footer >
					<div class="row text-center" >
						<img src="<?php echo base_url().'assets/images/footer.png';?>" width="100%">
					</div>
				</footer>
		<!-- Main Body End -->
			</div>

		</div>
		
		
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
		
		<!-- SCRIPT -->
		<?php echo '<!-- Page generated :- '.date('Y-m-d H:i:s').' -->';?>
	</body>
</html>