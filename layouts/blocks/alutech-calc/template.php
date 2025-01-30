<section class="alutech-calc">
	<div class="container">
		<?php get_template_part( '/layouts/partials/title', null, array(
			'class' => 'alutech-calc__title',
			'title' => get_sub_field( 'title' )
		) ); ?>

		<div class="alutech-calc__holder" id="alutech-calc"></div>
	</div>
</section>

<script>
	!function(){var s="",h="",m=window.location.protocol+"//"+window.location.host+window.location.pathname;function g(t,e){e||(e=window.location.href),t=t.replace(/[\[\]]/g,"\\$&");var a=new RegExp("[?&]"+t+"(=([^&#]*)|&|#|$)").exec(e);return a?a[2]?decodeURIComponent(a[2].replace(/\+/g," ")):"":null}document.addEventListener("DOMContentLoaded",function(){s=g("alutcalc")||s;var t=g("alutsize")||"",a=g("alutpanels")||"",o=g("alutseries")||"",l=g("alutmount")||"",n=g("alutbox")||"",c=g("alutcolor")||"",i=g("alutcontrol")||"",u=g("alutoptions")||"";if(h=g("alutregion")||h,null!==(e=document.getElementById("alutech-calc"))){var r=document.createElement("iframe"),d="alutech-iframe";r.name="alutech_iframe";r.src="//calc.alute.ch/#"+s+"?alutsize="+t+"&email=&url="+m+"&css=&calc_metrika=&lang=ru&type=&sap=&calc=[]&alutpanels="+a+"&alutseries="+o+"&alutmount="+l+"&alutbox="+n+"&alutcolor="+c+"&alutcontrol="+i+"&alutoptions="+u+"&alutregion="+h,r.width="100%",r.height=0,r.id=d,r.scrolling="no",r.frameBorder=0,e.appendChild(r),window.addEventListener("message",function(e){e.data.height&&"number"==typeof e.data.height&&document.getElementById(d)&&(document.getElementById(d).height=e.data.height),e.data.run&&"string"==typeof e.data.run&&document.getElementById(d)&&new Function(e.data.run)()})}})}();
</script>
